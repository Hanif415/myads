<?php
// Define variables and initialize with empty values
$name = "";
$name_err = $exec_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["name"]))) {
        $name_err = "nama kategori tidak boleh kosong";
    } else {
        $name = trim($_POST["name"]);
    }

    // Check input errors before inserting in database
    if (empty($name_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO categories (name, slug) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_slug);

            $param_name = $name;

            $slug = sanitize($name);
            $param_slug = $slug;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // set session
                session_start();
                $_SESSION['blog_posted_message'] = 'Kategori berhasil ditambahkan';
                // Redirect to login page
                header("location: ../../layouts/categories/categories.php");
            } else {
                $exec_err = mysqli_error($link);
            }
        }
    } else {
        return;
    }

    // Close connection
    mysqli_close($link);
}
