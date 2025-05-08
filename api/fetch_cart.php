<?php
require_once("../config/config.php");

function getProductById($id) {
  global $conn;
  $id = intval($id);
  
  // Use prepared statement
  $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  
  $result = $stmt->get_result();
  return $result->fetch_assoc() ?? []; // Return empty array if not found
}