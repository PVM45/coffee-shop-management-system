<?php require_once "includes/header.php"; ?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Contact Us</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="index.php">Home</a></span>
            <span>Contact</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container mt-5">
    <div class="row block-9">
      <div class="col-md-4 contact-info ftco-animate">
        <div class="row">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="col-md-12 mb-3">
            <p>
              <span>Address:</span> Jl. Deposito No.39, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242
            </p>
          </div>
          <div class="col-md-12 mb-3">
            <p>
              <span>Phone:</span>
              <a href="tel://1234567920">0812 3412 3412</a>
            </p>
          </div>
          <div class="col-md-12 mb-3">
            <p>
              <span>Email:</span>
              <a href="mailto:info@yoursite.com">Taruhco@gmail.com</a>
            </p>
          </div>
          <div class="col-md-12 mb-3">
            <p><span>Website:</span> <a href="#">taruhco.com</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 ftco-animate">
        <form action="feedback.php" method="post" class="contact-form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" required pattern="^[A-Za-z\s]{3,50}$" placeholder="Your Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Your Email" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" required minlength="3" maxlength="100" class="form-control" placeholder="Subject" />
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5" />
          </div>
        </form>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Email berhasil dikirim!',
        confirmButtonText: 'Oke'
      });
    </script>
  <?php elseif (isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: 'Email gagal dikirim!',
        confirmButtonText: 'Coba Lagi'
      });
    </script>
  <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php require_once "includes/footer.php"; ?>
