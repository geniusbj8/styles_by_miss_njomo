<?php
require_once("../config/config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if ($name && $subject && $message) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, subject, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $subject, $message);
            $stmt->execute();
            $stmt->close();

            // Send a JSON response with success
            echo json_encode(["success" => true]);
        } else {
            // Send a JSON response with error
            echo json_encode(["success" => false, "message" => "Database prepare error."]);
        }
    } else {
        // Send a JSON response with error
        echo json_encode(["success" => false, "message" => "Please fill all fields."]);
    }

    $conn->close();
}
?>
