<?php
require_once "admin/backend/config.php";

require_once "utils/changeDateFormat.php";

include('backend/getNewBlog.php');
include('backend/getFewBlog.php');
include('backend/getBanner.php');
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">

  <style>
    .main-banner:before {
      content: '';
      <?php
      echo "background-image: url(assets/images/banner/$banner[name])";
      ?>
    }
  </style>
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/myads.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Projects</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li>
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
                    <h6>MY ADS</h6>
                    <h2>Tumbuhkan Bisnis Anda bersama <span>MY ADS!</span> Melalui Inovasi dalam
                      Advertising &
                      Kreativitas!
                    </h2>
                    <!-- <p>Kami dengan bangga mempersembahkan My Ads, sebuah perusahaan inovatif yang berfokus pada solusi
                      digital advertising dan kreatif. Dengan dedikasi untuk memberikan layanan berkualitas tinggi
                      kepada klien kami, kami berusaha untuk mengubah cara dunia berinteraksi dengan iklan dan konten
                      kreatif.</p> -->
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section mt-5">
                      <a href="#about">Tumbuhkan Bisnismu</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <!-- <img src="assets/images/banner.jpg" alt=""> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/Consulting-bro.png" alt="">
              </div>
            </div>
            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h6>About Us</h6>
                  <h4>Who is <em>MY ADS</em></h4>
                  <div class="line-dec"></div>
                </div>
                <p>Visi kami adalah menjadi pionir dalam industri digital advertising dengan memberikan
                  pendekatan yang
                  cerdas, kreatif, dan berdaya saing. Melalui tim berbakat kami, yang terdiri dari
                  para ahli digital
                  marketing, desainer kreatif, dan analis data yang berpengalaman, kami menghadirkan
                  solusi yang unik
                  dan efektif untuk memenuhi kebutuhan khusus setiap klien.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h4>What we working on, anyway</h4>
                  <div class="line-dec"></div>
                </div>
                <div class="row mt-5">
                  <div class="col-12">
                    <div class="card">
                      <div class="row text-sm-start text-center">
                        <div class="col-sm-5 col-md-3 col-12">
                          <img class="card-img-top" style="width: 15rem;" src=" assets/images/work1.png" alt="Card image cap">
                        </div>
                        <div class="col-sm-7 col-md-9 col-12">
                          <div class="card-body">
                            <h5 class="card-title">Customizable Digital Advertising
                              Strategies</h5>
                            <p class="card-text">Kami menyadari bahwa setiap klien memiliki
                              tujuan unik. Oleh karena
                              itu, kami menghadirkan strategi digital advertising yang
                              dapat disesuaikan untuk mencapai
                              hasil yang optimal sesuai dengan kebutuhan dan anggaran
                              masing-masing klien.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="row text-sm-start text-center">
                        <div class="col-sm-5 col-md-3 col-12">
                          <img class="card-img-top" style="width: 15rem;" src="assets/images/work2.jpg" alt="Card image cap">
                        </div>
                        <div class="col-sm-7 col-md-9 col-12">
                          <div class="card-body">
                            <h5 class="card-title">Limitless Creativity</h5>
                            <p class="card-text">Tim desainer kreatif kami memiliki keahlian
                              untuk menciptakan konten
                              visual
                              yang menarik dan efektif, mulai dari logo hingga kampanye
                              iklan digital, untuk memberikan
                              dampak maksimal bagi merek klien.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="row text-sm-start text-center">
                        <div class="col-sm-5 col-md-3 col-12">
                          <img class="card-img-top" style="width: 15rem;" src="assets/images/work3.jpg" alt="Card image cap">
                        </div>
                        <div class="col-sm-7 col-md-9 col-12">
                          <div class="card-body">
                            <h5 class="card-title">In-depth Data Analysis</h5>
                            <p class="card-text">Di My Ads, kami mengintegrasikan analisis
                              data mendalam dalam
                              pendekatan
                              kami. Kami menggali data untuk mengoptimalkan kampanye klien
                              dan memastikan investasi
                              klien
                              kami memberikan hasil yang terukur.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Our Services</h6>
            <h4>What Our Agency <em>Provides</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class=" naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/marketing.png" alt=""></span>
                        Marketing
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/content.png" alt=""></span>
                        Content
                      </div>
                    </div>
                    <div>
                      <div class=" thumb">
                        <span class="icon"><img src="assets/images/bundling.png" alt=""></span>
                        Bundling
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/add-on.png" alt="" width="10px"></span>
                        Add On
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Digital Marketing Optimization</h4>
                                <p>
                                  Digital Marketing Optimization dari My Ads adalah
                                  layanan khusus yang dirancang
                                  untuk
                                  meningkatkan efektivitas dan hasil dari kampanye
                                  pemasaran digital Anda. Tim ahli di
                                  My Ads akan bekerja sama dengan Anda untuk
                                  mengoptimalkan strategi pemasaran digital
                                  yang sedang berjalan dan menghadirkan rekomendasi
                                  serta taktik yang disesuaikan
                                  dengan
                                  tujuan bisnis Anda.</p>
                                <p>Scope of work:</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Keyword research
                                    and
                                    optimization</span>
                                  <span><i class="fa fa-check"></i> Bidding PPC
                                    Marketplace</span> <span><i class="fa fa-check"></i>
                                    Forecast Inventory</span>
                                  <span><i class="fa fa-check"></i> Forecast
                                    sales</span> <span><i class="fa fa-check"></i>
                                    Maintenance Meta Ads</span> <span><i class="fa fa-check"></i> Visit
                                    1x/Month</span><span><i class="fa fa-check"></i>
                                    Monthly Report</span><span>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/marketing-service.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Creative Content Optimization</h4>
                                <p>
                                  Creative Content Optimization dari My Ads adalah
                                  layanan khusus yang ditujukan untuk
                                  meningkatkan kualitas dan daya tarik dari konten
                                  kreatif dalam kampanye pemasaran
                                  Anda. Tim ahli di My Ads akan bekerja sama dengan
                                  Anda untuk mengoptimalkan dan
                                  menghadirkan konten kreatif yang menarik, relevan,
                                  dan berdampak positif bagi
                                  audiens
                                  Anda.</p>
                                <p>Scope of work:</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Social Media
                                    Maintenance</span>
                                  <span><i class="fa fa-check"></i> Admin (post
                                    only)</span> <span><i class="fa fa-check"></i>
                                    Ads Content</span>
                                  <span><i class="fa fa-check"></i> Editorial Plan: 10
                                    Feeds + 30/31 Stories +
                                    Caption</span> <span><i class="fa fa-check"></i>
                                    Timeline Scheduling</span> <span><i class="fa fa-check"></i> Visit
                                    1x/Month</span><span><i class="fa fa-check"></i>
                                    Monthly Report</span><span><i class="fa fa-check"></i> Content
                                    Planning</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/content-service.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12 align-self-center">
                              <div class="left-text">
                                <h4>Bundling Digital Marketing + Creative Content</h4>
                                <p>Dengan layanan bundling kami, Anda mendapatkan solusi
                                  yang lengkap untuk strategi pemasaran yang cerdas
                                  dan
                                  konten yang penuh daya tarik.</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Keyword research
                                    and
                                    optimization</span>
                                  <span><i class="fa fa-check"></i> Bidding PPC
                                    Marketplace</span> <span><i class="fa fa-check"></i>
                                    Forecast Inventory</span>
                                  <span><i class="fa fa-check"></i> Forecast
                                    sales</span> <span><i class="fa fa-check"></i>
                                    Maintenance Meta Ads</span><span><i class="fa fa-check"></i> Monthly
                                    Report</span><span><span><i class="fa fa-check"></i> Social Media
                                      Maintenance</span>
                                    <span><i class="fa fa-check"></i> Admin (post
                                      only)</span> <span><i class="fa fa-check"></i>
                                      Ads Content</span>
                                    <span><i class="fa fa-check"></i> Editorial
                                      Plan: 10 Feeds + 30/31 Stories +
                                      Caption</span> <span><i class="fa fa-check"></i>
                                      Timeline Scheduling</span> <span><i class="fa fa-check"></i> Visit
                                      1x/Month</span><span><i class="fa fa-check"></i> Monthly
                                      Report</span><span><i class="fa fa-check"></i> Content
                                      Planning</span>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image-03.jpg" alt="">
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12 align-self-center">
                              <div class="left-text">
                                <h4>Add On</h4>
                                <p>Dengan layanan add-on ini, kami memberikan solusi
                                  yang komprehensif untuk
                                  memperkuat
                                  dan mengembangkan merek Anda. Setiap elemen ini
                                  dirancang untuk menambah daya tarik
                                  dan efektivitas dalam upaya pemasaran dan branding
                                  Anda.</p>
                                <h4>Sessional Look Book: </h4>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i>
                                    Photographer</span>
                                  <span><i class="fa fa-check"></i> Talent</span>
                                  <span><i class="fa fa-check"></i> Concept by
                                    request</span>
                                  <span><i class="fa fa-check"></i> Editing photo 60
                                    output</span>
                                  <span><i class="fa fa-check"></i> Tools on
                                    availablity</span>
                                </div>
                                <h4>Video Campaign: </h4>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i>
                                    Videographer</span>
                                  <span><i class="fa fa-check"></i> Talent</span>
                                  <span><i class="fa fa-check"></i> Concept by
                                    request</span>
                                  <span><i class="fa fa-check"></i> 1min video
                                    master</span>
                                  <span><i class="fa fa-check"></i> Reels and
                                    etc</span>
                                </div>
                                <h4>Special Package: </h4>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i> Photographer &
                                    Videographer</span>
                                  <span><i class="fa fa-check"></i> Talent</span>
                                  <span><i class="fa fa-check"></i> Concept by
                                    request</span>
                                  <span><i class="fa fa-check"></i> Editing photo 60
                                    output</span>
                                  <span><i class="fa fa-check"></i> 1min video</span>
                                </div>
                                <h4>Catalogue: </h4>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Photographer</span>
                                  <span><i class="fa fa-check"></i> Concept by
                                    request</span>
                                  <span><i class="fa fa-check"></i> Output by
                                    request</span>
                                  <span><i class="fa fa-check"></i> 3 edited
                                    files/product</span>
                                  <span><i class="fa fa-check"></i> Imin video</span>
                                </div>
                                <h4>Brand In Guidelines: </h4>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Brand
                                    Identity</span>
                                  <span><i class="fa fa-check"></i> Tone of
                                    Voice</span>
                                  <span><i class="fa fa-check"></i> Logo Clear Space
                                    and Size</span>
                                  <span><i class="fa fa-check"></i> Usage on Different
                                    Platforms</span>
                                  <span><i class="fa fa-check"></i> Brand
                                    Applicationss</span>
                                  <span><i class="fa fa-check"></i> Iconography and
                                    Graphic Elements</span>
                                  <span><i class="fa fa-check"></i> Social Media
                                    Guidelines</span>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image-04.jpg" alt="">
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Our Portofolio</h6>
            <h4>See Our Recent <em>Projects</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/indiech.jpg" alt="">
                  </div>
                  <div class="down-content">
                    <h4>Indiech</h4>
                  </div>
                </div>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/indiech2.jpg" alt="">
                  </div>
                  <div class="down-content">
                    <h4>Indiech</h4>
                  </div>
                </div>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/SBA.jpg" alt="">
                  </div>
                  <div class="down-content">
                    <h4>SBA Medical</h4>
                  </div>
                </div>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/SBA2.jpg" alt="">
                  </div>
                  <div class="down-content">
                    <h4>SBA Medical</h4>
                  </div>
                </div>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/ragambentala.png" alt="">
                  </div>
                  <div class="down-content">
                    <h4>Ragambentala</h4>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="blog" class="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="section-heading">
            <h6>Recent News</h6>
            <h4>Check Our Blog <em>Posts</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="blog-post">
            <div class="thumb">
              <a href="/myads/layouts/blogs/blog_detail/?id=<?php echo $newBlog["id"]; ?>"><img src="admin/images/<?php echo $newBlog["image"]; ?>" alt=""></a>
            </div>
            <div class="down-content">
              <span class="category"><?php echo categoryName($newBlog["category_id"]); ?></span>
              <span class="date"><?php changeDateFormat($newBlog["published_at"]); ?></span>
              <a href="/myads/blogs/blog_detail/?id=<?php echo $newBlog["id"]; ?>">
                <h4><?php echo $newBlog["title"]; ?></h4>
              </a>
              <p><?php echo $newBlog["excerpt"]; ?></p>
              <div class="row">
                <div class="col-sm col-12">
                  <span class="author"><img src="<?php echo $user["profile_photo"] ?>" alt="" style="max-height: 54px;">
                    By: <?php echo $user["name"] ?>
                  </span>
                </div>
                <div class="col-sm col-12">
                  <div class="border-first-button"><a href="/myads/layouts/blogs">Discover More</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="blog-posts">
            <div class="row">
              <?php
              if (mysqli_num_rows($resultFewBlogs) > 0) {
                $skipCount = 1;
                while ($blogs = mysqli_fetch_assoc($resultFewBlogs)) {
                  // skip 1 item
                  if ($skipCount == 1) {
                    // Skip one item
                    $skipCount++;
                    continue;
                  }
              ?>
                  <div class="col-lg-12 mb-4">
                    <div class="post-item">
                      <div class="thumb">
                        <a href="/myads/layouts/blogs/blog_detail/?id=<?php echo $newBlog["id"]; ?>"><img src="admin/images/<?php echo $blogs["image"]; ?>" alt=""></a>
                      </div>
                      <div class="right-content">
                        <span class="category"><?php echo categoryName($blogs["category_id"]) ?></span>
                        <span class="date"><?php changeDateFormat($blogs["published_at"]); ?></span>
                        <a href="/myads/layouts/blogs/blog_detail/?id=<?php echo $newBlog["id"]; ?>">
                          <h4><?php echo $blogs["title"]; ?></h4>
                        </a>
                        <p><?php echo $blogs["excerpt"]; ?></p>
                      </div>
                    </div>
                  </div>
              <?php
                }
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="partner" class="partner section wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.25s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row text-center justify-content-center">
            <div class="col-md-8 p-5 text-partner mt-lg-5">
              <div class="text">
                <h1> Partner</h1>
                <h1> <span>MY ADS</span></h1>
                <p> Dengan dukungan dari mitra-mitra terpercaya, kami terus berkembang dan memperkuat
                  posisi kami di
                  dunia digital marketing. Bersama-sama, kami mencapai hasil yang luar biasa.</p>
              </div>
            </div>
            <div class="col-lg-12 mt-lg-5">
              <img src="assets/images/partner2.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row justify-content-center foot-item">
        <div class="col-lg-2 col-6">
          <p>MY ADS</p>
          <ul>
            <li>About Us</li>
            <li>Check Our Blog</li>
          </ul>
        </div>
        <div class="col-lg-3 col-6">
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
                    <li><a href="#"><i class="fa fa-phone"></i> 010-020-0340</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> digimedia@company.com</a></li>
                  </ul>
                </div>
                <div class="col-4">
                  <p>Follow Us</p>
                  <ul class="social-media">
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>