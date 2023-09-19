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
$id = $_GET['id'];

// Prepare an update statement
$sql = "DELETE FROM banner
        WHERE id = $id";

// SQL QUERY for getting image
$query = "SELECT name FROM `banner` WHERE id = $id;";
// FETCHING DATA FROM DATABASE
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$image = $row["name"];
$filePath = "../../../assets/images/banner/$image";
// delete the file if the data deleted
if (file_exists($filePath)) {
    unlink($filePath);
}

if (mysqli_query($link, $sql)) {
    // set session
    session_start();
    $_SESSION['blog_posted_message'] = 'Banner berhasil dihapus';
    // Redirect to login page
    header("location: ../../layouts/banner/banner.php");
} else {
    $exec_err = mysqli_error($link);

    // Close connection
    mysqli_close($link);
}
