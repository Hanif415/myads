<?php

function getCategory()
{
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // SQL QUERY
    $query = "SELECT * FROM `categories`";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($link, $query);
    $category = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        return $category;
        $link->close();
    } else {
        return "Category tidak ditemukan";
    }
}

// $categories = getCategory();
// while ($row = $categories) {
//     echo $row["name"];
// }