<?php require_once "../includes/header.php"; ?>
<?php
//if user logged in 
//he should not able to access login page
if (isset($_SESSION['username'])) {
  echo "<script>window.location.href = '" . url . "/index.php';</script>";
  exit();
}

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
     echo "
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Form Kosong!',
        text: 'Email dan Password wajib diisi.',
        confirmButtonText: 'Oke'
      });
    </script>
    ";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // sql query
    // verifying the user email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful !!");

    // if email is correct
    if (mysqli_num_rows($result) > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        // verifying the user password
        if ($password === $row['password']) {
          // password_verify($password,$row['password']) for hashed password;
          // session start
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['role'] = $row['role'];
          // redirect to index page
           if ($row['role'] == 'admin') {
          echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Login Admin Berhasil!',
              text: 'Selamat datang, {$row['username']}',
            }).then(() => {
              window.location.href = '" . url . "/admin-panel/index.php';
            });
          </script>";
        } else {
          $_SESSION['login_success'] = "Kamu berhasil login. Selamat datang, {$row['username']}!";
          echo "<script>window.location.href = '" . url . "/index.php';</script>";
        }
        exit();

        } else {
          echo "
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Password Salah!',
        text: 'Silakan periksa kembali password kamu.',
        confirmButtonText: 'Ulangi'
      });
    </script>
    ";
        }
      }
    } else {
      echo "
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Email Tidak Ditemukan!',
        text: 'Silakan periksa kembali email kamu.',
        confirmButtonText: 'Oke'
      });
    </script>
    ";
    }
  }
}
?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(../images/bg_1.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Login</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="../index.php">Home</a></span>
            <span>Login</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="login.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">Login</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="email">Email</label>
                <!-- <input name="email" id="email" type="text" class="form-control" placeholder="Email" /> -->
                <input name="email" id="email" type="email" class="form-control" placeholder="Email"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                  title="Masukkan format email yang valid, misalnya: kamu@email.com" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="password">Password</label>
                <!-- <input name="password" id="password" type="password" class="form-control" placeholder="Password" /> -->
                <input name="password" id="password" type="password" class="form-control" placeholder="Password"
                  pattern=".{6,}" title="Minimal 6 karakter" required />
              </div>
            </div>
            <div class="col-md-12">
              <a href="forgot-password.php" class="">Forgot Password |</a>
              <a href="register.php" class="">Don't have an Account</a>
            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button name="submit" class="btn btn-primary py-3 px-4">Login</button>
                </div>
              </div>
            </div>
          </div>
      

        </form>
        <!-- END -->
         <?php
if (isset($_SESSION['register_success'])) {
  echo "
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Registrasi Berhasil!',
        text: '{$_SESSION['register_success']}',
        confirmButtonText: 'Okay 👍'
      });
    </script>
  ";
  unset($_SESSION['register_success']); // Hapus session setelah ditampilkan
}
?>

      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
<!-- .section -->

<?php require_once "../includes/footer.php"; ?>