<?php require_once "../layouts/header.php"; ?>
<?php
// Only allow access if user is admin
// session_start();
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//   header("Location: " . url . "/auth/login.php");
//   exit();
// }

// Admin registration logic
if (isset($_POST['submit'])) {
  $name     = trim($_POST['username']);
  $email    = trim($_POST['email']);
  $password = $_POST['password'];

  if (empty($name) || empty($email) || empty($password)) {
    echo "<script>alert('⚠️ Please fill out all fields.')</script>";
  } else {
    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      echo "<script>alert('❌ Email already registered!')</script>";
    } else {
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insert into users table with role = 'admin'
      $query = "INSERT INTO users (username, email, password, role) VALUES ('$name', '$email', '$hashed_password', 'admin')";
      $insert_result = mysqli_query($conn, $query);

      if ($insert_result) {
        echo "<script>alert('✅ Admin created successfully!')</script>";
        echo "<script>window.location.href='" . ADMINURL . "/index.php'</script>";
      } else {
        echo "<script>alert('❌ Failed to create admin.')</script>";
      }
    }
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-5">Create New Admin</h5>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-outline mb-3">
              <input type="text" name="username" class="form-control" placeholder="Name" required />
            </div>
            <div class="form-outline mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <button type="submit" name="submit" class="btn btn-success">Create Admin</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
