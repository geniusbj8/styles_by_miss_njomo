<?php
session_start();
require_once __DIR__ . '/../../config/config.php';

if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: ../admin_login.php");
  exit;
}

header('Content-Type: application/json');  // Ensure this header is set 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
  $name = trim($_POST['name'] ?? '');
  $location = trim($_POST['location'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if (empty($name) || empty($location) || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
  }

  if ($id > 0) {
    // Update existing testimonial
    $stmt = $conn->prepare("UPDATE testimonials SET name = ?, location = ?, message = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $location, $message, $id);
  } else {
    // Insert new testimonial
    $stmt = $conn->prepare("INSERT INTO testimonials (name, location, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $location, $message);
  }

  if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
  }

  $stmt->close();
  $conn->close();
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
