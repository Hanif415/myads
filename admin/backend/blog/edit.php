<?php

if (isset($_GET['id'])) {
    // The 'id' parameter is set, so you can safely use it
    $blog_id = $_GET['id'];

    // SQL QUERY
    $query = "SELECT * FROM `blogs` WHERE id = $blog_id;";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);

    // get all the data first to show it on text field
    $blog_id = $row["id"];
    $blog_category_id = $row["category_id"];
    $blog_title = $row["title"];
    $blog_image = $row["image"];
    $blog_body = $row["body"];
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $id = $_POST['id'];
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $blog_id = $id;
    $blog_category_id =  $category_id;
    $blog_title = $title;
    $blog_image = $_POST["blog_image"];
    $blog_body = $body;

    $category_id_err = $title_err = $body_err =  $exec_err = "";

    if (empty(trim($_POST["category_id"]))) {
        $category_id_err = "category tidak boleh kosong";
    } else {
        $category_id = trim($_POST["category_id"]);;
    }

    if (empty(trim($_POST["title"]))) {
        $title_err = "Judul tidak boleh kosong";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["body"]))) {
        $body_err = "Body tidak boleh kosong";
    } else {
        $body = trim($_POST["body"]);
    }

    // Check input errors before inserting in database
    if (empty($category_id_err) && empty($title_err) && empty($body_err) && $uploadOk == 1) {
        $user_id = $_SESSION["id"];
        $slug = sanitize($title);
        $image = $_FILES["image"]["name"];
        if ($image == null) {
            $image = $_POST["blog_image"];
        }
        // make an excerpt
        $excerpt = "";
        if (strlen($body) < 30) {
            $excerpt = strip_tags($body);
        } else {
            $new = wordwrap($body, 200);
            $new = explode("\n", $new);
            $new = $new[0] . '...';
            $excerpt = strip_tags($new);
        }

        // Prepare an update statement
        $sql = "UPDATE blogs SET 
        category_id = $category_id, 
        title = '$title', 
        slug = '$slug', 
        image = '$image', 
        excerpt = '$excerpt',
        body = '$body'
        WHERE id = $id";

        if (mysqli_query($link, $sql)) {
            // set session
            session_start();
            $_SESSION['blog_posted_message'] = 'Blog berhasil di update';
            // Redirect to login page
            header("location: ../../layouts/blog/blog.php");
        } else {
            $exec_err = mysqli_error($link);

            // Close connection
            mysqli_close($link);
        }
    }
}
