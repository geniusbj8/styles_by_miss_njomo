<?php
require_once __DIR__ . '/../../config/config.php';

header('Content-Type: application/json'); // Ensure the response is JSON

$sql = "SELECT id, name, price, category, description, image FROM products";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
    exit;
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);
?>
