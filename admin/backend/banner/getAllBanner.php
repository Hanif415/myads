<?php

$queryAllBanner = "SELECT * FROM banner ORDER BY status DESC";
$banners = "";
// FETCHING DATA FROM DATABASE
$resultAllBanner = mysqli_query($link, $queryAllBanner);
