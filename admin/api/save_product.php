<?php
require_once __DIR__ . '/../../config/config.php';

$id = intval($_POST['id'] ?? 0);
$name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
$price = floatval($_POST['price'] ?? 0);
$category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
$description = mysqli_real_escape_string($conn, $_POST['description'] ?? '');

$imageName = '';
$oldImage = '';

if ($id > 0) {
    $result = mysqli_query($conn, "SELECT image FROM products WHERE id = $id");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $oldImage = $row['image'];
    }
}

if (!empty($_FILES['image']['name'])) {
    $targetDir = __DIR__ . '/../../uploads/';
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $imageName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
        exit;
    }

    if (!empty($oldImage) && file_exists($targetDir . $oldImage)) {
        unlink($targetDir . $oldImage);
    }
}

if ($id > 0) {
    if ($imageName !== '') {
        $sql = "UPDATE products SET name='$name', price=$price, category='$category', description='$description', image='$imageName' WHERE id=$id";
    } else {
        $sql = "UPDATE products SET name='$name', price=$price, category='$category', description='$description' WHERE id=$id";
    }
    $message = "Product updated successfully!";
} else {
    $sql = "INSERT INTO products (name, price, category, description, image) VALUES ('$name', $price, '$category', '$description', '$imageName')";
    $message = "Product added successfully!";
}

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true, 'message' => $message]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
}
?>
