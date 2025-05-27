<?php
require_once "../includes/header.php";

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: " . url . "/index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Jalankan query hanya kalau session tersedia
$query = "SELECT * FROM orders WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($order = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr class="text-center">
                                        <td>
                                            <div>
                                                <strong><?php echo $order['order_code']; ?></strong><br>
                                                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($order['order_code']); ?>&amp;size=100x100" alt="QR Code">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php
                                                switch ($order['status']) {
                                                    case 'pending':
                                                        echo 'warning';
                                                        break;
                                                    case 'processing':
                                                        echo 'info';
                                                        break;
                                                    case 'completed':
                                                        echo 'success';
                                                        break;
                                                    case 'cancelled':
                                                        echo 'danger';
                                                        break;
                                                    default:
                                                        echo 'secondary';
                                                }
                                            ?>">
                                                <?php echo ucfirst($order['status']); ?>
                                            </span>
                                        </td>
                                        <td>Rp <?php echo $order['total_price']; ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr class="text-center">
                                    <td colspan="9">
                                        <h5>You don't have any Orders!</h5>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "../includes/footer.php"; ?>