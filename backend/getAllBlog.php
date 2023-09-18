<?php
$queryAllBlog = "SELECT * FROM `blogs` ORDER BY published_at DESC";
$blogs = "";
// FETCHING DATA FROM DATABASE
$resultAllBlog = mysqli_query($link, $queryAllBlog);
// if (mysqli_num_rows($result) > 0) {
//     $blogs = mysqli_fetch_assoc($result);
// }
