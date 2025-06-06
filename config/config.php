<?php
// Check if running on a local development environment
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // Local database settings (for XAMPP/MAMP)
    $server_name = "localhost";
    $user_name = "root";  // Default XAMPP user
    $password = "";       // Default XAMPP password (empty)
    $db_name = "ns_coffee"; // Your local database name

    // Define the base URL for the local environment
    define("url", "http://localhost/workspace/coffee-shop-management-system");
    define("ADMINURL", "http://localhost/workspace/coffee-shop-management-system/admin-panel");
} else {
    // Live database settings
    $env_file = $_SERVER['DOCUMENT_ROOT'] . '/.env';

    // Check if the .env file exists
    if (file_exists($env_file)) {
        $env = parse_ini_file($env_file);
    } else {
        die("❌ Error: .env file is missing! Please upload it to your server.");
    }

    // Load database credentials from .env
    $server_name = $env['DB_HOST'] ?? '';
    $user_name = $env['DB_USER'] ?? '';
    $password = $env['DB_PASS'] ?? '';
    $db_name = $env['DB_NAME'] ?? '';

    // Define the base URL for the live environment
    define("url", "http://" . $_SERVER['HTTP_HOST']);
    define("ADMINURL", "http://" . $_SERVER['HTTP_HOST'] . "/admin-panel");
}

// Create a connection to the MySQL database
$host = "127.0.0.1";
$user = "root";           // Default user XAMPP
$pass = "";               // Default password (kosong)
$db   = "ns_coffee";  // Ganti dengan nama database kamu

$koneksi = mysqli_connect($host, $user, $pass, $db);
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// Check if the connection was successful
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}


$current_page = basename($_SERVER['PHP_SELF']);
?>
