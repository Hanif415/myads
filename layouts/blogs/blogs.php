<?php
require_once "../../admin/backend/config.php";

require_once "../../utils/changeDateFormat.php";

include('../../backend/getAllBlog.php');
include('../../backend/getBanner.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>MY ADS</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/css/blogs.css">
    <link rel="stylesheet" href="../../assets/css/animated.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">

    <style>
        .main-banner:before {
            content: '';
            <?php
            echo "background-image: url(../../assets/images/banner/$banner[name])";
            ?>
        }
    </style>
</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../../" class="logo">
                            <img src="../../assets/images/myads.jpg" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="../../#top">Home</a></li>
                            <li class="scroll-to-section"><a href="../../#about">About</a></li>
                            <li class="scroll-to-section"><a href="../../#services">Services</a></li>
                            <li class="scroll-to-section"><a href="../../#portfolio">Projects</a></li>
                            <li class="scroll-to-section"><a href="blogs.php" class="active">Blog</a></li>
                            <!-- <li class="scroll-to-section"><a href="#contact">Contact</a></li> -->
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if (isset($_GET["category"])) { ?>
                                            <h2> Category: <span><?php echo $category["name"] ?></span> </h2>
                                        <?php } else if (isset($_GET["search"])) { ?>
                                            <h2> Search for: <span><?php echo $_GET["search"] ?></span> </h2>
                                        <?php } else { ?>
                                            <h2> Blog<span> MY ADS </span> </h2>
                                            <p>Perluas wawasan tentang dunia digital dan teknologi dengan mengikuti perkembangan terbaru di blog MY ADS.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blogs" style="margin-top: 204px;">
        <div class="container">
            <h4 class="text-center mb-3">Baca Artikel Terbaru</h4>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <form action="blogs.php">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search..." name="search" value="<?php echo $search ?>">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if (mysqli_num_rows($resultAllBlog) > 0) { ?>

                <div class="row">

                    <?php
                    while ($blog = mysqli_fetch_assoc($resultAllBlog)) {
                    ?>
                        <div class="item col-lg-4 col-md-6 mb-5 col-12">
                            <div class="blog-item card">
                                <a href="blog.php?slug=<?php echo $blog["slug"]; ?>"><img class=" card-img-top" src="../../admin/images/<?php echo $blog["image"] ?>" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a href="?category=<?php echo categorySlug($blog["category_id"]) ?>">
                                        <span class="category mt-3"><?php echo categoryName($blog["category_id"]); ?></span>
                                    </a>
                                    <a href="blog.php?slug=<?php echo $blog["slug"]; ?>" style="text-decoration: none; color:black;">
                                        <h5 class="card-title mt-3"><?php echo $blog["title"] ?></h5>
                                    </a>
                                    <p><?php echo $blog["excerpt"]; ?></p>
                                    <a href="blog.php?slug=<?php echo $blog["slug"]; ?>" class="btn btn-success w-100 mt-3">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
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
                                                        if (isset($_GET["category"]) && !empty($_GET["category"])) {
                                                            echo "href='?category=$_GET[category]&page=$previous'";
                                                        } else if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                                            echo "href='?search=$_GET[search]&page=$previous'";
                                                        } else {
                                                            echo "href='?page=$previous'";
                                                        }
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_page; $x++) {
                        ?>
                            <li class="page-item <?php if ($page == $x) {
                                                        echo "active";
                                                    } ?>">
                                <?php if (isset($_GET["category"]) && !empty($_GET["category"])) { ?>
                                    <a class="page-link" href="?category=<?php echo $_GET["category"] ?>&page=<?php echo $x ?>">
                                        <?php echo $x; ?>
                                    </a>
                                <?php
                                } else if (isset($_GET["search"]) && !empty($_GET["search"])) { ?>
                                    <a class="page-link" href="?search=<?php echo $_GET["search"] ?>&page=<?php echo $x ?>">
                                        <?php echo $x; ?>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
                                <?php
                                } ?>

                            </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php if ($page == $total_page) {
                                                    echo "disabled";
                                                } ?>">
                            <a class="page-link" <?php if ($page < $total_page) {
                                                        if (isset($_GET["category"]) && !empty($_GET["category"])) {
                                                            echo "href='?category=$_GET[category]&page=$next'";
                                                        } else if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                                            echo "href='?search=$_GET[search]&page=$next'";
                                                        } else {
                                                            echo "href='?page=$next'";
                                                        }
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->

            <?php
            } else {
            ?>
                <h1 class="text-center">Belum ada postingan untuk hari ini.</h1>
            <?php
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row justify-content-center foot-item">
                <div class="col-lg-2 col-5">
                    <p>MY ADS</p>
                    <ul>
                        <a href="#about" style="color: white;">
                            <li>About Us</li>
                        </a>
                        <a href="blogs.php" target="_blank" style="color: white;">
                            <li>Check Our Blog</li>
                        </a>
                    </ul>
                </div>
                <div class="col-lg-3 col-7">
                    <p>Service</p>
                    <ul>
                        <li>Digital Marketing Optimization</li>
                        <li>Creative Content Optimization</li>
                    </ul>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5 col-12 office-item">
                    <p>Our Offce</p>
                    <ul>
                        <li>Jl. Taman Pramuka No.157, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114</li>
                        <li>
                            <div class="row justify-content-center contact">
                                <div class="col-8">
                                    <p>Contact Us</p>
                                    <ul>
                                        <li><a href="https://wa.me/6282126271748" target="_blank"><i class="fa fa-whatsapp"></i> 0821-2627-1748</a></li>
                                        <li><a href="#flyontech.group@gmail.com"><i class="fa fa-envelope"></i> flyontech.group@gmail.com</a></li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <p>Follow Us</p>
                                    <ul class="social-media">
                                        <li><a href="https://instagram.com/myads.id?igshid=NzZhOTFlYzFmZQ=="><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 foot-text">
                    <p>© 2023 My Ads All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/owl-carousel.js"></script>
    <script src="../../assets/js/animation.js"></script>
    <script src="../../assets/js/imagesloaded.js"></script>
    <script src="../../assets/js/custom.js"></script>

</body>

</html>