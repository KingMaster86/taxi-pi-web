<?php
include('connect.php');

// ! SMS Gateway dependencies.
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

// Delete Function
function deleteRecord($con, $query)
{
    $executeDeleteQuery = mysqli_query($con, $query);
    if ($executeDeleteQuery) {
        echo "<script>alert('Dear Admin, the record has been deleted successfully.')</script>";
    }
}



// * Get the user IP
function get_IP_address()
{
    foreach (array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ) as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
                $IPaddress = trim($IPaddress); // Just to be safe

                if (
                    filter_var(
                        $IPaddress,
                        FILTER_VALIDATE_IP,
                        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                    )
                    !== false
                ) {

                    return $IPaddress;
                }
            }
        }
    }
}


// * Function for find the distance between Pickup Location and Drop Location.
function getDistance($pickupLocation, $dropLocation)
{
    $API_URL = "https://maps.googleapis.com/maps/api/distancematrix/json?departure_time=now"; // * Google Geo Matrix API URL
    $API_KEY = "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8";   // * API Key

    $requestURL = $API_URL . "&destinations=" . urlencode($dropLocation) . "&origins=" . urlencode($pickupLocation) . "&key="
        . $API_KEY;

    $response = file_get_contents($requestURL);    // * Send the request to Google Distance Matrix (Geo Matrix) API

    if ($response === false) {
        echo "<script>alert('Unable to get the data.')</script>";
    } else {
        $distanceObj = json_decode($response);  // * Converting JSON Object into PHP Object.‹

        if ($distanceObj->status == "OK") {
            $tripDistanceInMeter = $distanceObj->rows[0]->elements[0]->distance->value;
            $tripDistanceInKM = $tripDistanceInMeter / 1000;
            return $tripDistanceInKM;
        }
    }
}


// * Function for find Latitude of a Location.
function getLocationLatitude($locationName)
{
    $API_URL = "https://maps.googleapis.com/maps/api/geocode/json?address=";
    $apiKey = "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8";


    $APIRequest = $API_URL . $locationName . "&key=" . $apiKey;
    $responseOfAPI = file_get_contents($APIRequest);    // * Send the request to Google Geo Code API
    $locationObj = json_decode($responseOfAPI);     // * Converting JSON Object into PHP Object.

    $locationLatitude = $locationObj->results[0]->geometry->location->lat;

    return $locationLatitude;
}




// * Function for find Longitude of a Location
function getLocationLongitude($locationName)
{
    $API_URL = "https://maps.googleapis.com/maps/api/geocode/json?address=";
    $apiKey = "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8";

    $APIRequest = $API_URL . $locationName . "&key=" . $apiKey;
    $responseOfAPI = file_get_contents($APIRequest);        // * Send the request to Google Geo Code API
    $locationObj = json_decode($responseOfAPI);         // * Converting JSON Object into PHP Object.

    $locationLongitude = $locationObj->results[0]->geometry->location->lng;

    return $locationLongitude;
}


// * Function to Sending SMS to Passenger when the reservation confirmed.
function sendSMS($phoneNumber, $passengerName, $driverName, $taxiNumber, $driverPhoneNumber)
{
    require __DIR__ . "../../vendor/autoload.php";

    $base_url = "j3ve2v.api.infobip.com";
    $api_key = "254dff597abe47e6a0559acc94ac1c9a-73c0fb51-7efc-41fa-ad68-079100c19e66";

    $msg = "Dear " . $passengerName . "! Your reservation has been confirmed successfully. The Driver's Name is " . $driverName . ", the taxi number is  " . $taxiNumber . ". You can get connect with driver using " . $driverPhoneNumber . ".";
    // $msg = "Dear {$passengerName}! Your reservation has been confirmed successfully. The Driver's Name is {$driverName}, the taxi number is {$taxiNumber}. You can get connect with driver using {$driverPhoneNumber}.";

    $configuration = new Configuration(host: $base_url, apiKey: $api_key);

    $api = new SmsApi(config: $configuration);

    $destination = new SmsDestination(to: $phoneNumber);

    $message = new SmsTextualMessage(
        destinations: [$destination],
        text: $msg
    );

    $request = new SmsAdvancedTextualRequest(messages: [$message]);

    $response = $api->sendSmsMessage($request);

    echo var_dump($response);
}


// * Function to Sending SMS to Driver when Payment process completed.
function sendSMSForPaymentSuccess($phoneNumber, $driverName, $reservationId)
{
    require __DIR__ . "../../vendor/autoload.php";

    $base_url = "j3ve2v.api.infobip.com";
    $api_key = "254dff597abe47e6a0559acc94ac1c9a-73c0fb51-7efc-41fa-ad68-079100c19e66";

    $msg = "Dear " . $driverName . "! The payment received for the Reservation ID: " . $reservationId . " successfully!";

    $configuration = new Configuration(host: $base_url, apiKey: $api_key);

    $api = new SmsApi(config: $configuration);

    $destination = new SmsDestination(to: $phoneNumber);

    $message = new SmsTextualMessage(
        destinations: [$destination],
        text: $msg
    );

    $request = new SmsAdvancedTextualRequest(messages: [$message]);

    $response = $api->sendSmsMessage($request);

    echo var_dump($response);
}

// * Function for convert String value into Integer
function convertStringIntoInt($stringValue)
{
    $intValue = intval($stringValue);
    $readableValue = "";

    if ($intValue <= 9) {
        $readableValue = "0" . $intValue;
    } else {
        $readableValue = $intValue;
    }

    return $readableValue;
}
