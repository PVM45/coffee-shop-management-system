<?php
require_once(__DIR__ . '/../../config/config.php');

// Cegah akses langsung tanpa HTTP_REFERER
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . ADMINURL);
    exit;
}

// Validasi ID dari parameter
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid booking ID!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '" . ADMINURL . "/bookings-admins/show-bookings.php';
            });
        };
    </script>";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    exit;
}

$booking_id = intval($_GET['id']);

// Eksekusi query delete
$delete_query = "DELETE FROM bookings WHERE id = $booking_id";
$result = mysqli_query($conn, $delete_query);

// Hasilkan respon dengan SweetAlert2
if ($result) {
    $icon = 'success';
    $message = 'Booking deleted successfully!';
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
            window.location.href = '" . ADMINURL . "/bookings-admins/show-bookings.php';
        });
    };
</script>";
exit;
