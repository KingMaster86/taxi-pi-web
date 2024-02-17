<?php
include('../../includes/connect.php');
include('../../includes/function.php');

// ! Stripe Dependencies
require_once 'stripe-php-13.10.0/init.php';
require_once 'config.php';

if (isset($_GET['reservation_id'])) {
    $parsedReservationId = $_GET['reservation_id'];
    $distanceInKM = $_GET['distance'];
    $amount = $_GET['amount'];

    $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

    $lineItems = [
        [
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => "Your payment for " . $distanceInKM . " KM trip",
                ],
                'unit_amount' => $amount * 100,
            ],
            'quantity' => 1
        ]
    ];

    // !<---------------------------------- Database Code -------------------------------------->
    $status = "paid";

    $savePaymentDetail = mysqli_query($con, "INSERT INTO `table_payment` (date_and_time, time, distance, amount, status, reservation_id) VALUES (CURRENT_DATE, CURRENT_TIMESTAMP, $distanceInKM, $amount, '$status', $parsedReservationId)");
    if ($savePaymentDetail) {

        // Todo: After the Payment process, need to change the status from ON PROCESS to COMPLETE.
        $query = "SELECT tr.*,
        tp.id,
        tp.passenger_name,
        td.driver_id,
        td.driver_name,
        td.driver_phone_no
        FROM `table_payment` AS tpay
        LEFT JOIN `table_reservation` AS tr ON tpay.reservation_id = tr.reservation_id
        LEFT JOIN `table_passenger` AS tp ON tr.passenger_id = tp.id
        LEFT JOIN `table_driver` AS td ON tr.driver_id = td.driver_id
        WHERE tpay.reservation_id = $parsedReservationId
        ";

        $getAllDataOfReservation = mysqli_query($con, $query);
        $isDataExist = mysqli_num_rows($getAllDataOfReservation);

        if ($isDataExist) {
            $arrayOfReservationData = mysqli_fetch_assoc($getAllDataOfReservation);
            $reservation_status = $arrayOfReservationData['reservation_status'];
            $passengerId = $arrayOfReservationData['passenger_id'];
            $driverName =  $arrayOfReservationData['driver_name'];
            $driverPhoneNum = $arrayOfReservationData['driver_phone_no'];
            echo $driverName . " " . $driverPhoneNum;

            if ($reservation_status == "on process") {
                $updateStatus = mysqli_query(
                    $con,
                    "UPDATE 
                    `table_reservation` 
                    SET 
                    reservation_status = 'completed'
                    WHERE 
                    passenger_id = $passengerId"
                );
            } else {
                $reservation_status = $reservation_status;
            }

            if ($updateStatus) {

                sendSMSForPaymentSuccess($driverPhoneNum, $driverName, $parsedReservationId);
            } else {

                echo "Error!";
            }
        }
    }


    // !<---------------------------------- End of Database Code -------------------------------------->


    $checkoutSession = $stripe->checkout->sessions->create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => "http://localhost/cityTaxi/passenger-directory/passenger-feedback/feedback.php?reservation_id={$parsedReservationId}",
        'cancel_url' => "http://localhost/cityTaxi/passenger-directory/payment/payment.php?reservation_id={$parsedReservationId}"
    ]);




    header('Content-Type: application/json');
    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkoutSession->url);
    exit;
}

// ! Demo Card numbers for testing purpose (https://docs.stripe.com/testing#cards):
// ! 1. 4000056655665556 (Visa (Debit))
// ! 2. 4242424242424242 (Visa)
// ! 3. 5555555555554444 (Mastercard)
// ! 4. 5200828282828210 (Mastercard (Debit))
// ! 5. 5105105105105100 (Mastercard (Prepaid))
