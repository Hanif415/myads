<?php

$limit = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$first_page = ($page > 1) ? ($page * $limit) - $limit : 0;

$previous = $page - 1;
$next = $page + 1;

$data = mysqli_query($link, "SELECT * FROM banner");
$total_data = mysqli_num_rows($data);
$total_page = ceil($total_data / $limit);

$queryAllBanner = "SELECT * FROM banner ORDER BY status DESC limit $first_page, $limit";
$banners = "";
// FETCHING DATA FROM DATABASE
$resultAllBanner = mysqli_query($link, $queryAllBanner);
