<?php require_once "../layouts/header.php"; ?>

<?php
// Cegah akses jika admin belum login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: " . url . "/index.php");
  exit;
}


// Ambil data booking dari database
$booking_query = "SELECT * FROM bookings ORDER BY date DESC, time DESC";
$query_result = mysqli_query($conn, $booking_query);
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Bookings</h5>
          <?php if (mysqli_num_rows($query_result) > 0): ?>
            <table class="table table-bordered table-hover table-responsive">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>Booking ID</th>
                  <th>Username</th>
                  <th>Customer ID</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($booking = mysqli_fetch_assoc($query_result)): ?>
                  <tr class="text-center align-middle">
                    <td><?= htmlspecialchars($booking["id"]) ?></td>
                    <td><?= htmlspecialchars($booking["username"]) ?></td>
                    <td><?= htmlspecialchars($booking["user_id"]) ?></td>
                    <td><?= htmlspecialchars($booking["date"]) ?></td>
                    <td><?= htmlspecialchars($booking["time"]) ?></td>
                    <td><?= htmlspecialchars($booking["phone"]) ?></td>
                    <td><?= nl2br(htmlspecialchars($booking["message"])) ?></td>
                    <td><span class="badge bg-<?= $booking['status'] == 'confirmed' ? 'success' : ($booking['status'] == 'pending' ? 'warning' : 'secondary') ?>">
                      <?= ucfirst(htmlspecialchars($booking["status"])) ?>
                    </span></td>
                    <td><a href="update-status.php?id=<?= urlencode($booking['id']) ?>" class="btn btn-warning btn-sm">Update</a></td>
                    <td>
                    <button class="btn btn-danger btn-sm delete-booking" data-id="<?= $booking['id']; ?>">Delete</button>
                  </td>

                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-info text-center">No bookings found.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.querySelectorAll('.delete-booking').forEach(button => {
    button.addEventListener('click', function () {
      const bookingId = this.getAttribute('data-id');

      Swal.fire({
        title: 'Hapus Booking?',
        text: "Data ini akan terhapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `delete-bookings.php?id=${bookingId}`;
        }
      });
    });
  });
</script>

</body>
</html>
