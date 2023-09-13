<?php

function categoryName($category_id)
{
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
// echo categoryName(1);