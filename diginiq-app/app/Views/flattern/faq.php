<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>FAQ</h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li>FAQ</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
  <div class="container">

    <div class="row no-gutters">
      <div class="col-xl-12 ps-0 ps-lg-12 pe-lg-1 d-flex align-items-stretch">
        <div class="content d-flex flex-column justify-content-center">
        <?= $faq['content']; ?>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->
</main>
