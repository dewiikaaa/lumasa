<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Catalogue</h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li>Catalogue
          </li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
<!-- ======= About Us Section ======= -->
<section id="contact" class="contact">
  <div class="container">


    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-10">
        <p>Dear visitors,</p>
        <p>Thank you for your interest in our products and services. </p>
        <p>Please fill up the form to download the catalogue!</p>
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="address" rows="5" placeholder="Address" required></textarea>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="zip_state" id="zip_state" placeholder="Zip & State" required>
          </div>


          <div class="text-center"><button type="submit">Activate</button></div>
        </form>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <button class="col-lg-4 btn btn-outline-danger btn-outline mb-2">Twig Furniture</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Teak Root Furniture</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Recycled Wood Furniture</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Rattan Furniture </button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Outdoor Furniture</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Indoor Furniture</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Decorative Items</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Handicrafts</button>
          <button class="col-lg-4 btn btn-outline-danger mb-2">Customize Product</button>
        </div>

      </div>

    </div>




  </div>
</section><!-- End About Us Section -->
</main>
