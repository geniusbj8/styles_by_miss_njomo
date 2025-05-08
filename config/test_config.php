<?php
// Include your config file
require_once('config.php');

// Database connection test
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful!<br>";
    // Test server info
    echo "Server info: " . $conn->server_info . "<br>";
    // Test ping
    if ($conn->ping()) {
        echo "Successfully connected to MySQL!<br>";
    } else {
        echo "Ping failed: " . $conn->error . "<br>";
    }
}

// Session test
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "Session is active!<br>";
    // Test session variables
    $_SESSION['test'] = 'This is a test session variable';
    if (isset($_SESSION['test'])) {
        echo "Session variable set: " . $_SESSION['test'] . "<br>";
    }
} else {
    echo "Session is not active.<br>";
}

// Display base URL
echo "Base URL: " . BASE_URL;
?>