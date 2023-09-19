<?php

$limit = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$first_page = ($page > 1) ? ($page * $limit) - $limit : 0;

$previous = $page - 1;
$next = $page + 1;

$data = mysqli_query($link, "SELECT * FROM blogs");
$total_data = mysqli_num_rows($data);
$total_page = ceil($total_data / $limit);

$queryAllBlog = "SELECT * FROM blogs ORDER BY published_at DESC limit $first_page, $limit";
$blogs = "";
// FETCHING DATA FROM DATABASE
$resultAllBlog = mysqli_query($link, $queryAllBlog);
