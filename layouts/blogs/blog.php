<?php
require_once "../../admin/backend/config.php";

require_once "../../utils/changeDateFormat.php";

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
    <link rel="stylesheet" href="../../assets/css/blogs.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/css/animated.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">

    <style>
        /* .main-banner:before {
            content: '';
            <?php
            echo "background-image: url(../../assets/images/banner/$banner[name])";
            ?>
        } */
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
                        <a href="/myads" class="logo">
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
                                        <!-- <h2> Blog<span> MY ADS </span> </h2>
                                        <p>Perluas wawasan tentang dunia digital dan teknologi dengan mengikuti perkembangan terbaru di blog MY ADS.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // $blog_id = $blog_category_id = $blog_title = $blog_image = 
    $slug = "";

    if (isset($_GET['slug'])) {
        // The 'id' parameter is set, so you can safely use it
        $slug = $_GET['slug'];

        // SQL QUERY
        $query = "SELECT * FROM `blogs` WHERE slug = '$slug';";
        echo mysqli_error($link);
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        $user = getUser($row["user_id"]);
    ?>
        <div class="blogs" style="margin-top: -200px;">
            <div class="container">
                <main class="m-sm-auto col-lg-10 px-md-4">
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-lg-12">
                                <h1 class="mb-3 title"><?php echo $row["title"] ?></h1>

                                <?php if ($row["image"] != "") { ?>
                                    <div class="blog-image">
                                        <img src="../../admin/images/<?php echo $row["image"] ?>" class="img-fluid mt-3">
                                    </div>
                                <?php } ?>
                                <p class="mt-3 fs-6">
                                    <span class="badge badge-pill bg-success"><?php echo $user["name"]; ?> </span>
                                    <a href="../blogs/blogs.php?category=<?php echo categorySlug($row["category_id"]) ?>">
                                        <span class="badge badge-pill bg-success"><?php echo categoryName($row["category_id"]) ?></span>
                                    </a>
                                    <span class="badge badge-pill bg-success"><?php echo changeDateFormat($row["published_at"]); ?></span>
                                </p>

                                <article class="body my-3 fs-5">
                                    <?php echo $row["body"] ?>
                                </article>
                                <br>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <?php } ?>
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