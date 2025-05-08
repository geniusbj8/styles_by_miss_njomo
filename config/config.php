<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');         // Change this if you're using a different DB user
define('DB_PASS', '');             // Set your DB password here
define('DB_NAME', 'styles_by_miss_njomo');

// Base URL (adjust to your local setup or domain)
define('BASE_URL', 'http://localhost/styles_by_miss_njomo/');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
