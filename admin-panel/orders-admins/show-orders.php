<?php require_once "../layouts/header.php"; ?>

<?php
// Cek apakah admin sudah login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: " . url . "/index.php");
    exit;
}

// Ambil semua data order
$order_query = "SELECT * FROM orders";
$query_result = mysqli_query($conn, $order_query) or die("Query Unsuccessful");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">All Orders</h5>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Order ID</th>
                                <th class="text-center">QR Code</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query_result) > 0): ?>
                                <?php while ($order = mysqli_fetch_assoc($query_result)): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $order["id"]; ?></td>
                                        <td class="text-center">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($order['order_code']); ?>&amp;size=100x100" alt="QR Code">
                                            <div><small><?php echo $order['order_code']; ?></small></div>
                                        </td>
                                        <td class="text-center"><?php echo $order["user_id"]; ?></td>
                                        <td class="text-center">Rp <?php echo $order["total_price"]; ?></td>
                                        <td class="text-center">
                                            <span class="badge badge-<?php
                                                switch ($order['status']) {
                                                    case 'pending': echo 'warning'; break;
                                                    case 'processing': echo 'info'; break;
                                                    case 'completed': echo 'success'; break;
                                                    case 'cancelled': echo 'danger'; break;
                                                    default: echo 'secondary'; break;
                                                }
                                            ?>">
                                                <?php echo ucfirst($order["status"]); ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="update-status.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-warning">Update</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="delete-orders.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">No orders found.</td>
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
