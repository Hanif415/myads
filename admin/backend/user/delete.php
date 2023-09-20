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
$sql = "DELETE FROM users
        WHERE id = $id";

// SQL QUERY for getting image
$query = "SELECT name FROM `users` WHERE id = $id;";
// FETCHING DATA FROM DATABASE
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$image = $row["profile_photo"];
$filePath = "../../../assets/images/banner/$image";
// delete the file if the data deleted
if (file_exists($filePath)) {
    unlink($filePath);
}

if (mysqli_query($link, $sql)) {
    // Initialize the session
    session_start();

    if ($_SESSION["id"] == $id) {
        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session.
        session_destroy();

        // Redirect to login page
        header("location: ../../layouts/authentication/login.php");

        exit;
    } else {
        $_SESSION['blog_posted_message'] = 'Users berhasil dihapus';
        // Redirect to login page
        header("location: ../../layouts/users/users.php");
    }
} else {
    $exec_err = mysqli_error($link);

    // Close connection
    mysqli_close($link);
}
