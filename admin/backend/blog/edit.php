<?php

$blog_id = $blog_category_id = $blog_title = $blog_image = $blog_body = "";

// for image upload
$target_file = "";
$uploadOk = 1;
$image_err = "";

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

    // variable untuk dibagian layout
    $blog_id = $id;
    $blog_category_id =  $category_id;
    $blog_title = $title;
    $blog_image = $_POST["blog_image"];
    $blog_body = $body;

    $category_id_err = $title_err = $body_err =  $exec_err = "";

    // validasi category
    if (empty(trim($_POST["category_id"]))) {
        $category_id_err = "category tidak boleh kosong";
    } else {
        $category_id = trim($_POST["category_id"]);;
    }

    // validasi title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Judul tidak boleh kosong";
    } else {
        $title = trim($_POST["title"]);
    }

    // validasi body
    if (empty(trim($_POST["body"]))) {
        $body_err = "Body tidak boleh kosong";
    } else {
        $body = trim($_POST["body"]);
    }

    // validasi image
    if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {

        $target_dir = "../../images/";
        $imageFileType = "";

        // Check if image file is a actual image or fake image
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $image_err = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $image_err = "Sorry, file name already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            $image_err = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $image_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
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

        $user_id = $_SESSION["id"];
        // Prepare an update statement
        $sql = "UPDATE blogs SET 
        user_id = $user_id,
        category_id = $category_id, 
        title = '$title', 
        slug = '$slug', 
        image = '$image', 
        excerpt = '$excerpt',
        body = '$body'
        WHERE id = $id";

        if (mysqli_query($link, $sql)) {

            // Upload image to image folder
            if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // $image_err = "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    $image = $_POST["blog_image"];;
                    $filePath = "../../images/$image";
                    // delete the file if the image change
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                    } else {
                        $image_err = "Sorry, there was an error uploading your file.";
                    }
                }
            }
            // End upload image to image folder

            // set session
            session_start();
            $_SESSION['message'] = 'Blog berhasil di update';
            // Redirect to login page
            header("location: ../../layouts/blog/blog.php");
        } else {
            $exec_err = mysqli_error($link);

            // Close connection
            mysqli_close($link);
        }
    }
}
