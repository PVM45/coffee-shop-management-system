<?php require_once "../includes/header.php"; ?>

<?php

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Ambil user ID dari session
$userId = $_SESSION['user_id'];

// Ambil nama lengkap dari kolom 'username'
$getUserQuery = mysqli_query($conn, "SELECT username FROM users WHERE id = '$userId'");
if (!$getUserQuery || mysqli_num_rows($getUserQuery) === 0) {
    die("User tidak ditemukan.");
}
$userData = mysqli_fetch_assoc($getUserQuery);
$username = $userData['username']; // ← nama lengkap dari kolom 'username'

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the posted values
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $userId = $_SESSION['user_id'];

    // Validate the date
    $bookingDate = strtotime($date);
    $currentDate = strtotime(date("Y-m-d"));
    
    if ($bookingDate > $currentDate) {

        // Prepare the SQL query with parameterized values
        $sql = "INSERT INTO bookings (username, date, time, phone, message, user_id) VALUES ('{$username}','{$date}','{$time}','{$phone}','{$message}','{$userId}')";
        mysqli_query($conn, $sql) or die("Query Unsuccessful");

        // echo "<script>alert('You have booked your Table Successfully !!')</script>";
     

        // // Redirect to previous page
        // echo "<script>window.history.back()</script>";

        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Booking Berhasil!',
            text: 'Meja kamu sudah dipesan.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Kembali'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../index.php'; // atau halaman booking form
            }
        });
    });
</script>";

    } else {
        // echo "<script>alert('Please enter a valid date.')</script>";
        // echo "<script>window.history.back()</script>";

        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Tanggal tidak valid!',
            text: 'Silakan pilih tanggal setelah hari ini.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Coba Lagi'
        }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
        });
    });
</script>";

    }
}


?>
