<?php

$name = "";
$name_err =  $exec_err = "";
$category_id = "";

if (isset($_GET['id'])) {
    // The 'id' parameter is set, so you can safely use it
    $category_id = $_GET['id'];

    // SQL QUERY
    $query = "SELECT * FROM `categories` WHERE id = $category_id;";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);

    // get all the data first to show it on text field
    $category_name = $row["name"];
    $category_id = $row["id"];
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validasi title
    if (empty(trim($_POST["name"]))) {
        $name_err = "Nama kategori tidak boleh kosong";
    } else {
        $name = trim($_POST["name"]);
    }

    $id = $_POST["id"];
    $category_id = $id;
    $exec_err = $id;
    $category_name = $name;
    // variable untuk dibagian layout
    $slug = sanitize($name);

    // Prepare an update statement
    $sql = "UPDATE categories SET 
        name = '$name', 
        slug = '$slug'  
        WHERE id = $id";

    if (mysqli_query($link, $sql)) {

        // set session
        session_start();
        $_SESSION['blog_posted_message'] = 'Kategori berhasil di update';
        // Redirect to login page
        header("location: ../../layouts/categories/categories.php");
    } else {


        // Close connection
        mysqli_close($link);
    }
}
