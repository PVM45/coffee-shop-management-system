<?php
// Start session and config
session_start();
require_once __DIR__ . '/../../config/config.php';

// Unset all session variables
$_SESSION = [];

// Destroy session
session_unset();
session_destroy();

// Prevent back navigation after logout
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// Redirect to login page
header("Location: " . url . "/auth/login.php");
exit();
