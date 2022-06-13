<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lumasa | Furniture and Deco - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=$theme_url?>/img/favicon.png" rel="icon">
  <link href="<?=$theme_url?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=$theme_url?>/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=$theme_url?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=$theme_url?>/css/style.css" rel="stylesheet">
  	<?php \Arifrh\Themes\Themes::renderCSS(); ?>
    <script>
      var site_url = '<?=site_url()?>';
      var base_url = '<?=base_url()?>';
      var theme_url = '<?=$theme_url?>';
    </script>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:cs@lumasa.biz">cs@lumasa.biz</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 812 2805 4565</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html">Lumasa</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?=$theme_url?>/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php
        $uri = current_url();

        $homeUrl          = site_url('home');
        $aboutUrl         = site_url('about');
        $servicesUrl      = site_url('services');
        $catalogueUrl     = site_url('catalogue');
        $faqUrl           = site_url('faq');
        $updatesUrl       = site_url('updates');
        $contactUrl       = site_url('contact');
      ?>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="<?=activeClass($uri, $homeUrl)?>" href="<?= base_url() ?>">Home</a></li>
          <li><a class="<?=activeClass($uri, $aboutUrl)?>" href="<?= base_url('about') ?>">About Us</a></li>
          <li><a class="<?=activeClass($uri, $servicesUrl)?>" href="<?= base_url('services') ?>">Services</a></li>
          <li><a class="<?=activeClass($uri, $catalogueUrl)?>" href="<?= base_url('catalogue') ?>">Catalogue</a></li>
          <li><a class="<?=activeClass($uri, $faqUrl)?>" href="<?= base_url('faq') ?>">FAQ</a></li>

          <li class="dropdown <?=activeClass($uri, $updatesUrl)?>"><a href="<?= base_url('updates') ?>"><span>Updates</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('updates/gallery') ?>">Gallery</a></li>
              <li><a href="<?= base_url('updates/tips') ?>">Tips</a></li>
              <li><a href="<?= base_url('updates/blogs') ?>">Blogs</a></li>
              <li><a href="<?= base_url('updates/events') ?>">Events</a></li>
              <li><a href="<?= base_url('updates/sale') ?>">Sale</a></li>
            </ul>
          </li>
          <li><a class="<?=activeClass($uri, $contactUrl)?>" href="<?= base_url('contact')?>">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <?php  echo  $content; ?>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Sourcing</h3>
            <p>
              Access the core supply with us.
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Quality</h3>
            <p>
              Win the qualified product professional QC.
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PACKAGING</h3>
            <p>
              Secure the goods with firm packaging.
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SHIPPING</h3>
            <p>
              Deliver cargo safely and ease.
            </p>
          </div>


        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Lumasa</span></strong>. All Rights Reserved
        </div>

      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=$theme_url?>vendor/aos/aos.js"></script>
  <script src="<?=$theme_url?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=$theme_url?>vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=$theme_url?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=$theme_url?>vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=$theme_url?>vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?=$theme_url?>vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=$theme_url?>js/main.js"></script>

  </body>

  </html>
