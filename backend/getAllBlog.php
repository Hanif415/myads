<?php

$search = "";

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $data = mysqli_query($link, "SELECT * FROM blogs WHERE title LIKE '%$search%' OR body LIKE '%$search%'");

    $limit = 30;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $first_page = ($page > 1) ? ($page * $limit) - $limit : 0;
    $total_page = "";

    $previous = $page - 1;
    $next = $page + 1;
    $total_data = mysqli_num_rows($data);

    $total_page = ceil($total_data / $limit);
    // echo mysqli_error($link);
    $queryAllBlog = "SELECT * FROM blogs WHERE title LIKE '%$search%' OR body LIKE '%$search%' ORDER BY published_at DESC limit $first_page, $limit";
    $blogs = "";
    // FETCHING DATA FROM DATABASE
    $resultAllBlog = mysqli_query($link, $queryAllBlog);
} else {
    $data = mysqli_query($link, "SELECT * FROM blogs");
    $total_data = mysqli_num_rows($data);
    $limit = 12;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $first_page = ($page > 1) ? ($page * $limit) - $limit : 0;
    $total_page = "";

    $previous = $page - 1;
    $next = $page + 1;
    $total_page = ceil($total_data / $limit);

    $queryAllBlog = "SELECT * FROM blogs ORDER BY published_at DESC limit $first_page, $limit";
    $blogs = "";
    // FETCHING DATA FROM DATABASE
    $resultAllBlog = mysqli_query($link, $queryAllBlog);
}
