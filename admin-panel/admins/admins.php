<?php
session_start();
require_once "../../config/config.php"; // Pastikan path ke config.php benar
require_once "../layouts/header.php";

// Autentikasi khusus admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: " . url . "/auth/login.php");
    exit();
}

// Query: Ambil semua user dengan role admin
$query = "SELECT id, username, email FROM users WHERE role = 'admin'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Daftar Admin</h5>
          <a href="create-admins.php" class="btn btn-primary mb-4 float-end">+ Tambah Admin</a>
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center">Belum ada admin terdaftar.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
