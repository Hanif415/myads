<?php
// Define variables and initialize with empty values
$category_id = $title = $body = "";
$category_id_err = $title_err = $body_err =  $exec_err = "";

// for image upload
$target_file = "";
$uploadOk = 1;
$image_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

        // Prepare an insert statement
        $sql = "INSERT INTO blogs (user_id, category_id, title, slug, image, excerpt, body) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iisssss", $param_user_id, $param_category_id, $param_title, $param_slug, $param_image, $param_excerpt, $param_body);

            // Set parameters
            session_start();
            $user_id = $_SESSION["id"];
            $slug = sanitize($title);
            $image = $_FILES["image"]["name"];
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

            $param_user_id = $user_id;
            $param_category_id = $category_id;
            $param_title = $title;
            $param_slug = $slug;
            $param_image = $image;
            $param_excerpt = $excerpt;
            $param_body = $body;

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
                $_SESSION['message'] = 'Blog berhasil di post';
                // Redirect to login page
                header("location: ../../layouts/blog/blog.php");
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
