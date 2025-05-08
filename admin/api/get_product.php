<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid product ID"]);
    exit;
}

require_once __DIR__ . '/../../config/config.php';

$productId = intval($_GET['id']);

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Product not found"]);
}

$stmt->close();
$conn->close();
?>
