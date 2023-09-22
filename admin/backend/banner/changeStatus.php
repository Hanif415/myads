<?php

// Initialize the session
session_start();

// Include config file
require_once "../../backend/config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// get 
$banner_id = $_GET['id'];

// set all status to 0(inactive) first
mysqli_query($link, "UPDATE banner SET 
status = 0");

// Prepare an update statement
$sql = "UPDATE banner SET 
status = 1 
WHERE id = $banner_id";

if (mysqli_query($link, $sql)) {
    // set session
    session_start();
    $_SESSION['message'] = 'Banner berhasil diganti';
    // Redirect to login page
    header("location: ../../layouts/banner/banner.php");
} else {
    $exec_err = mysqli_error($link);

    // Close connection
    mysqli_close($link);
}
