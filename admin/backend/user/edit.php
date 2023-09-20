<?php

// Define variables and initialize with empty values
$name = $username = $photo = $password = $confirm_password = $profile_photo = "";
$name_err = $username_err = $photo_err = $password_err = $confirm_password_err = $image_err =  "";
$user_id = "";

// for image upload
$target_file = "";
$uploadOk = 1;
$image_err = "";

if (isset($_GET['id'])) {
    // The 'id' parameter is set, so you can safely use it
    $user_id = $_GET['id'];

    // SQL QUERY
    $query = "SELECT * FROM `users` WHERE id = $user_id;";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);

    // get all the data first to show it on text field
    $name = $row["name"];
    $username = $row["username"];
    $profile_photo = $row["profile_photo"];
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validate name 
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name";
    } elseif (!preg_match('/^[a-zA-Z0-9_ ]+$/', trim($_POST["name"]))) {
        $name_err = "Name can only contain letters, numbers, and underscores.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, underscores dan pastikan tidak ada spasi.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // validasi image
    if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {

        $profile_photo = $_FILES["image"]["name"];
        $target_dir = "../../images/profile/";
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
    } else {
        $profile_photo = $_POST["profile_photo"];
    }

    $user_id = trim($_POST["id"]);
    $sql = "";
    if (!empty(trim($_POST["password"]))) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET 
        name = '$name',
        username = '$username',
        password = '$password_hash',
        profile_photo = '$profile_photo'
        WHERE id = $user_id";
    } else {
        $sql = "UPDATE users SET 
        name = '$name',
        username = '$username',
        profile_photo = '$profile_photo'
        WHERE id = $user_id";
    }


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
        $_SESSION['blog_posted_message'] = 'User berhasil di update';
        // Redirect to login page
        header("location: ../../layouts/users/users.php");
    } else {
        $exec_err = $user_id;

        // Close connection
        mysqli_close($link);
    }
}
