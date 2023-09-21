<?php
require_once('../../backend/config.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];

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

    $data = "<img src='../../images/profile/" . $row["profile_photo"] . "' width='100%' class='mb-3'>" . "<h6>Nama: " . $row["name"] . "</h6> <h6>Username: " . $row["username"] . "</h6> ";
    echo $data;
    $link->close();
}
