<?php

$batas = 10;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($link, "select * from blogs");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

// $data_pegawai = mysqli_query($koneksi, "select * from pegawai limit $halaman_awal, $batas");
// $nomor = $halaman_awal + 1;

$queryAllBlog = "SELECT * FROM blogs ORDER BY published_at DESC limit $halaman_awal, $batas";
$blogs = "";
// FETCHING DATA FROM DATABASE
$resultAllBlog = mysqli_query($link, $queryAllBlog);
// if (mysqli_num_rows($result) > 0) {
//     $blogs = mysqli_fetch_assoc($result);
// }
