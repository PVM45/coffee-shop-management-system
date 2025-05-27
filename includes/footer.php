<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>
            Tucked away from the city’s noise, in a quiet little corner, stands Teduh—a humble space where warmth is poured with every cup, and every guest is welcomed like an old friend returning home.
          </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate">
              <a href="#"><span class="icon-twitter"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-facebook"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-instagram"></span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(<?php echo url; ?>/images/image_1.jpg)"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the Sweetest Aroma Tells a Silent Story</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> May 26, 2025</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 2</a>
                </div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(<?php echo url; ?>/images/image_2.jpg)"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the Loudest Days Pause for a Sip Here</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> May 26, 2025</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 4</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Cooked</a></li>
            <li><a href="#" class="py-2 d-block">Deliver</a></li>
            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
            <li><a href="#" class="py-2 d-block">Mixed</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li>
                <span class="icon icon-map-marker"></span><span class="text">Jl. Deposito No.39, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</span>
              </li>
              <li>
                <a href="#"><span class="icon icon-phone"></span><span class="text">0812 3412 3412</span></a>
              </li>
              <li>
                <a href="#"><span class="icon icon-envelope"></span><span class="text">taruhco@gmail.com</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy; 2025 All rights reserved | Made with
          <i class="icon-heart" aria-hidden="true"></i> by Kelompok 9
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>

<!-- jquery & js files -->
<script src="<?php echo url; ?>/js/jquery.min.js"></script>
<script src="<?php echo url; ?>/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo url; ?>/js/popper.min.js"></script>
<script src="<?php echo url; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo url; ?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.stellar.min.js"></script>
<script src="<?php echo url; ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo url; ?>/js/aos.js"></script>
<script src="<?php echo url; ?>/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo url; ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo url; ?>/js/jquery.timepicker.min.js"></script>
<script src="<?php echo url; ?>/js/scrollax.min.js"></script>
<script src="<?php echo url; ?>/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
  $(document).ready(function() {
    var quantitiy = 0;
    $(".quantity-right-plus").click(function(e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($("#quantity").val());

      // If is not undefined

      $("#quantity").val(quantity + 1);

      // Increment
    });

    $(".quantity-left-minus").click(function(e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($("#quantity").val());

      // If is not undefined

      // Increment
      if (quantity > 0) {
        $("#quantity").val(quantity - 1);
      }
    });
  });
</script>

<!-- JS Flatpickr -->
<script>
  flatpickr("#time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i", // Format 24 jam
    minTime: "08:00",
    maxTime: "21:00",
    time_24hr: true,
    defaultHour: 8,
    defaultMinute: 0,
    onChange: function(selectedDates, dateStr, instance) {
      const time = selectedDates[0];
      const hour = time.getHours();
      if (hour < 8 || hour >= 21) {
        Swal.fire({
          icon: 'warning',
          title: 'Waktu Tidak Diperbolehkan',
          text: 'Silakan pilih waktu antara 08:00 dan 21:00 (format 24 jam).',
          confirmButtonText: 'Oke, Saya Mengerti',
          timer: 4000,
          timerProgressBar: true
        });
        instance.clear();
      }
    }
  });

   flatpickr("#date", {
    minDate: new Date().fp_incr(1), // mulai besok
    dateFormat: "Y-m-d",            // format tanggal
    disable: [
      {
        from: "1900-01-01",
        to: new Date()               // disable hari ini dan sebelumnya
      }
    ],
  });
</script>

 <script>
const textarea = document.getElementById('message');

 textarea.addEventListener('input', () => {
    const allowedPattern = /[^a-zA-Z0-9 .,?!-]/g;
    if (allowedPattern.test(textarea.value)) {
      // Remove invalid characters
      textarea.value = textarea.value.replace(allowedPattern, '');

      // SweetAlert2 popup
      Swal.fire({
        icon: 'warning',
        title: 'Oops!',
        text: '⚠️ Hanya huruf, angka, spasi, dan tanda baca dasar (. , ? ! -) yang diperbolehkan.',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true,
        background: '#fff3cd',
        color: '#856404',
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
    }
  });
</script>




</body>
</html>