<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Sale</h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li>Sale
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
        <p>Welcome to our SALE program. </p>
        <p>It will last in view moment, so please fill the form to get our SPECIAL OFFER just for you!</p>
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" required>
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


          <div class="text-center"><button type="submit">I want it now</button></div>
          <br>
          <p>Please text or call us at +62 812 2805 4565 for further queries. If you prefer contacting us by e-mail, please address it to cs@lumasa.biz. You can also follow our social media channel to get updates.</p>
        </form>
        

      </div>

    </div>




  </div>
</section><!-- End About Us Section -->
</main>
