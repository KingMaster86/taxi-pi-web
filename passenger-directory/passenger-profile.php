<?php
include('../includes/connect.php');
session_start();
?>

<div class="mx-auto p-2 p-md-5">
    <div class="card mx-auto" id="driver-profile-card">
        <img src="../assets/img/admin-clipart.jpg" class="card-img-top" alt="..." />
        <div class="card-body d-md-flex gap-1 align-items-start">
            <div>
                <h5 class="card-title">Mushkir</h5>
                <p class="card-text">
                    No. 751 East Milton Drive, Kandy, Sri Lanka
                </p>
            </div>
            <div class="bg-success px-3 py-1 rounded-5 text-light mt-2 mt-md-0 text-center">
                Available
            </div>
        </div>
        <ul class="list-group list-group-flush card-height overflow-y-scroll">
            <li class="list-group-item fw-bold">
                Username:
                <span class="text-decoration-none fw-normal font-black">mushkir_96</span>
            </li>
            <li class="list-group-item d-md-flex align-items-center gap-2 pl-2 pt-0 pb-0 pe-0">
                <p class="card-text mt-3 fw-bold">Email:</p>
                <p class="card-text">bycylacoh@example.com</p>
            </li>
            <li class="list-group-item fw-bold">
                Contact No:
                <a href="tel:0000" class="text-decoration-none fw-normal font-black">0777195282</a>
            </li>

            <li class="list-group-item fw-bold">
                ID Card No:
                <span class="text-decoration-none fw-normal font-black">199631404505</span>
            </li>
        </ul>
        <div class="card-body">
            <a href="./edit-profile.html" class="card-link text-decoration-none">Edit
            </a>
        </div>
    </div>
</div>