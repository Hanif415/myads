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
$blog_id = $_GET['id'];

// Prepare an update statement
$sql = "DELETE FROM blogs
        WHERE id = $blog_id";

$deleted = 1;
$filePath = "../../images/"
if (file_exists($filePath)) {
    unlink($filePath);

} else {
    echo "File does not exists";
}

if (mysqli_query($link, $sql)) {
    // set session
    session_start();
    $_SESSION['blog_posted_message'] = 'Blog berhasil dihapus';
    // Redirect to login page
    header("location: ../../layouts/blog/blog.php");
} else {
    $exec_err = mysqli_error($link);

    // Close connection
    mysqli_close($link);
}