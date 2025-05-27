<?php require_once "../../config/config.php"; ?>
<?php

// Cegah akses langsung tanpa HTTP_REFERER (misalnya lewat URL copy-paste)
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . ADMINURL);
    exit;
}


// Cek login dan role admin (opsional tambahan keamanan)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Access Denied! Admin only.'); window.location.href='" . url . "/index.php';</script>";
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Order ID!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '" . ADMINURL . "/bookings-admins/show-orders.php';
            });
        };
    </script>";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    exit;
}


$order_id = intval($_GET['id']);

// Eksekusi query penghapusan
$delete_query = "DELETE FROM orders WHERE id = {$order_id}";
$delete_result = mysqli_query($conn, $delete_query);


// Hasilkan respon dengan SweetAlert2
if ($delete_resultresult) {
    $icon = 'success';
    $message = 'Order deleted successfully!';
} else {
    $icon = 'error';
    $message = 'Gagal menghapus booking. Silakan coba lagi.';
}

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    window.onload = function() {
        Swal.fire({
            icon: '$icon',
            title: 'Notifikasi',
            text: '$message',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = '" . ADMINURL . "/bookings-admins/show-orders.php';
        });
    };
</script>";
exit;
// Cek hasil
if ($delete_result) {
    echo "<script>Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'Order has been successfully deleted.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '<?php echo url; ?>/admin-panel/orders-admins/show-orders.php';
            });</script>";
} else {
    echo "<script>alert('Failed to delete order.'); window.location.href='" . url . "/admin-panel/orders-admins/show-orders.php';</script>";
}
?>
