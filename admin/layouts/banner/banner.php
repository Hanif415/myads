<?php
// Initialize the session
session_start();

// Include config file
require_once "../../backend/config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../authentication/login.php");
    exit;
}

include('../../backend/banner/getAllBanner.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>MY ADS Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <!-- Custom sty les for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="../../../">MY ADS</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../backend/authentication/logout.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../blog/blog.php">
                                <span data-feather="layout" class="align-text-bottom"></span>
                                Blogs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../categories/categories.php">
                                <span data-feather="tag" class="align-text-bottom"></span>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../banner/banner.php">
                                <span data-feather="image" class="align-text-bottom"></span>
                                Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../users/users.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Banner</h1>
                </div>
                <a href="../../layouts/banner/add.php" class="btn btn-primary mb-3">Add new banner</a>
                <?php

                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }
                ?>
                <div class="row">
                    <?php
                    if (mysqli_num_rows($resultAllBanner) > 0) {
                        while ($banner = mysqli_fetch_assoc($resultAllBanner)) {
                    ?>
                            <div class="item col-lg-4 col-md-6 mb-5 col-12">
                                <div class="blog-item card">
                                    <img class=" card-img-top" src="../../../assets/images/banner/<?php echo $banner["name"] ?>" alt="<?php echo $banner["name"] ?>">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php if ($banner['status'] == 1) { ?>
                                                <a href="#" class="btn btn-success col-9 me-4">Active</a>
                                            <?php } else { ?>
                                                <a href="../../backend/banner/changeStatus.php?id=<?php echo $banner["id"] ?>" class="btn btn-warning col-9 me-4">Change Banner</a>
                                            <?php } ?>

                                            <a href="../../backend/banner/delete.php?id=<?php echo $banner["id"] ?>" class="btn btn-danger col-2" onclick="return confirm('Apa kmau yakin ingin menghapus banner ini?')"><i class="bi bi-trash"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($page == 1) {
                                                    echo "disabled";
                                                } ?>">
                            <a class="page-link" <?php if ($page > 1) {
                                                        echo "href='?page=$previous'";
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_page; $x++) {
                        ?>
                            <li class="page-item <?php if ($page == $x) {
                                                        echo "active";
                                                    } ?>">
                                <a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php if ($page == $total_page) {
                                                    echo "disabled";
                                                } ?>">
                            <a class="page-link" <?php if ($page < $total_page) {
                                                        echo "href='?page=$next'";
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->

            </main>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Data tables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <!-- Customize js -->
    <script src="../../js/dashboard.js"></script>
</body>

</html>