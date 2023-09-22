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
$category_id = $_GET['id'];

// Prepare an update statement
$sql = "DELETE FROM categories
        WHERE id = $category_id";

if (mysqli_query($link, $sql)) {
    // set session
    session_start();
    $_SESSION['message'] = 'Kategori berhasil dihapus';
    // Redirect to login page
    header("location: ../../layouts/categories/categories.php");
} else {
    $exec_err = mysqli_error($link);

    // Close connection
    mysqli_close($link);
}
