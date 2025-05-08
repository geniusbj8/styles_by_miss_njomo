<?php
require_once(__DIR__ . '/../../config/config.php');

header('Content-Type: application/json');

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    // Fetch the product first to get the image
    $result = mysqli_query($conn, "SELECT image FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'] ?? '';

    // Delete the product
    $delete = mysqli_query($conn, "DELETE FROM products WHERE id = $id");

    if ($delete) {
        // Delete the image file
        if (!empty($image)) {
            $imagePath = __DIR__ . '/../../uploads/' . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        echo json_encode(['success' => true, 'message' => 'Product deleted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
}
?>
