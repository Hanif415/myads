<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Root123!@@');
define('DB_NAME', 'myads');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get category name
function categoryName($category_id)
{
    if ($category_id) {
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);;

        // SQL QUERY
        $query = "SELECT name FROM `categories` WHERE id = $category_id";
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($link, $query);
        $category = mysqli_fetch_assoc($result);
        $category_name = "";
        if (mysqli_num_rows($result) > 0) {
            $category_name = $category["name"];
        } else {
            $category_name = "Category tidak ditemukan";
        }

        return $category_name;
        $link->close();
    }
}

// get category slug
function categorySlug($category_id)
{
    if ($category_id) {
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);;

        // SQL QUERY
        $query = "SELECT slug FROM `categories` WHERE id = $category_id";
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($link, $query);
        $category = mysqli_fetch_assoc($result);
        $category_name = "";
        if (mysqli_num_rows($result) > 0) {
            $category_name = $category["slug"];
        } else {
            $category_name = "Category tidak ditemukan";
        }

        return $category_name;
        $link->close();
    }
}

// get user
function getUser($id)
{
    if ($id) {
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);;

        // SQL QUERY
        $query = "SELECT * FROM `users` WHERE id = $id";
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($link, $query);
        $row = "";
        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_assoc($result);;
        } else {
            $row = "User tidak ditemukan";
        }

        return $row;
        $link->close();
    }
}

// get user by username
function getUserByUsername($username)
{
    if ($username) {
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);;

        // SQL QUERY
        $query = "SELECT * FROM `users` WHERE username = '$username'";
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($link, $query);
        $row = "";
        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_assoc($result);;
        } else {
            $row = "User tidak ditemukan";
        }

        return $row;
        $link->close();
    }
}
