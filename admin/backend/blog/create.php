<?php
// Define variables and initialize with empty values
$category_id = $title = $body = "";
$category_id_err = $title_err = $body_err =  $exec_err = "";

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
                // set session
                session_start();
                $_SESSION['blog_posted_message'] = 'Blog berhasil di post';
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