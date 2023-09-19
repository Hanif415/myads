<?php
// Define variables and initialize with empty values
$image = "";

// for image upload
$target_file = "";
$uploadOk = 1;
$image_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_FILES["image"]["name"]))) {
        $image_err = "gambar tidak boleh kosong";
    } else {
        $image = trim($_FILES["image"]["name"]);;
    }

    // validasi image
    if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {

        $target_dir = "../../../assets/images/banner/";
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

        // Check if file contains space
        if (strpos(basename($_FILES["image"]["name"]), ' ') !== false) {
            $image_err = "Nama file tidak boleh mengandung spasi.";
            $uploadOk = 0;
        } else {
            $uploadOk = 1;
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
    if (empty($image_err) && $uploadOk == 1) {

        // set all status to 0(inactive) first
        mysqli_query($link, "UPDATE banner SET status = 0");
        // Prepare an insert statement
        $sql = "INSERT INTO banner (name, status) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_image, $param_status);

            // Set parameters
            $param_image = $image;
            $param_status = 1;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {

                // Upload image to image folder
                if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        // $image_err = "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
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
                $_SESSION['blog_posted_message'] = 'Banner berhasil diinput';
                // Redirect to login page
                header("location: ../../layouts/banner/banner.php");
            } else {
                $exec_err = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    } else {
        return;
    }

    // Close connection
    mysqli_close($link);
}
