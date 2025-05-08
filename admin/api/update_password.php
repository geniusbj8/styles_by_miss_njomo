<?php
// Start session
session_start();

// Include DB config
require_once __DIR__ . '/../../config/config.php';


// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    echo json_encode(['status' => 'error', 'message' => 'You are not logged in.']);
    exit;
}

// Get the admin's username from session
$username = $_SESSION['admin_user'];

// Check if the POST request contains necessary data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate input
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'New password and confirmation do not match.']);
        exit;
    }

    // Fetch the admin's current password from the database
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Check if the old password matches the stored password
    if ($admin && hash('sha256', $old_password) === $admin['password']) {
        // Hash the new password
        $hashed_new_password = hash('sha256', $new_password);

        // Update the password in the database
        $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_new_password, $username);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating the password.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Old password is incorrect.']);
    }
}
?>
