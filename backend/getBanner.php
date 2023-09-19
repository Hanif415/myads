<?php
$query = "SELECT * FROM `banner` WHERE status = 1 LIMIT 1";

// FETCHING DATA FROM DATABASE
$query = mysqli_query($link, $query);
$banner = mysqli_fetch_assoc($query);
