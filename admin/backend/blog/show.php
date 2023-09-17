<?php
$blog_id = $blog_category_id = $blog_title = $blog_image = $blog_body = "";

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
