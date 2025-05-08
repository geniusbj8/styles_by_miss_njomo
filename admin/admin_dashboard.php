<?php
session_start();
$timeout_duration = 900;

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    echo "<script>localStorage.setItem('adminLogout', '1'); window.location.href='admin_login.php';</script>";
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time();

// Include DB config
require_once '../config/config.php';

// Fetch stats
$product_count = 0;
$message_count = 0;
$visitor_count = 0; // Optional if you track visitors

try {
    // Fetch total products
    $result = $conn->query("SELECT COUNT(*) AS count FROM products");
    if ($row = $result->fetch_assoc()) {
        $product_count = (int) $row['count'];
    }

    // Fetch total messages
    $result = $conn->query("SELECT COUNT(*) AS count FROM contact_messages");
    if ($row = $result->fetch_assoc()) {
        $message_count = (int) $row['count'];
    }

    // Fetch total testimonials
    $result = $conn->query("SELECT COUNT(*) AS count FROM testimonials");
    if ($row = $result->fetch_assoc()) {
        $testimonial_count = (int) $row['count'];
    }
} catch (Exception $e) {
    error_log("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | Styles by Miss Njomo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="static/css/admin.css" />
</head>

<body>

<aside class="sidebar">
  <!-- Sidebar header -->
  <header class="sidebar-header">
    <a href="admin_dashboard.php" class="header-logo">
      <img src="static/images/Styles by Miss Njomo icon.png" alt="Styles By Miss Njomo">
    </a>
    <button class="toggler sidebar-toggler">
      <span class="fa-solid fa-chevron-left"></span>
    </button>
    <button class="toggler menu-toggler">
      <span class="fas fa-bars"></span>
    </button>
  </header>

  <!-- Sidebar content -->
  <nav class="sidebar-nav">
    <!-- Primary top nav -->
    <ul class="nav-list primary-nav">
      <li class="nav-item">
        <a href="admin_dashboard.php" class="nav-link">
          <span class="nav-icon fa-solid fa-gauge-high"></span>
          <span class="nav-label">Admin Dashboard</span>
        </a>
        <span class="nav-tooltip">Admin Dashboard</span>
      </li>
      <li class="nav-item">
        <a href="manage_products.php" class="nav-link">
          <span class="nav-icon fa-solid fa-boxes-stacked"></span>
          <span class="nav-label">Manage Products</span>
        </a>
        <span class="nav-tooltip">Manage Products</span>
      </li>
      <li class="nav-item">
        <a href="manage_testimonials.php" class="nav-link">
          <span class="nav-icon fa-solid fa-comment-dots"></span>
          <span class="nav-label">Manage Testimonials</span>
        </a>
        <span class="nav-tooltip">Manage Testimonials</span>
      </li>
      <li class="nav-item">
        <a href="manage_messages.php" class="nav-link">
          <span class="nav-icon fa-solid fa-envelope-open-text"></span>
          <span class="nav-label">Messages</span>
        </a>
        <span class="nav-tooltip">Messages</span>
      </li>
    </ul>

    <!-- Secondary bottom nav -->
    <ul class="nav-list secondary-nav">
      <li class="nav-item">
        <a href="profile.php" class="nav-link">
          <span class="nav-icon fa-solid fa-user"></span>
          <span class="nav-label">Profile</span>
        </a>
        <span class="nav-tooltip">Profile</span>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <span class="nav-icon fa-solid fa-right-from-bracket"></span>
          <span class="nav-label">Logout</span>
        </a>
        <span class="nav-tooltip">Logout</span>
      </li>
    </ul>
  </nav>
</aside>

<main class="main-content">
  <section class="page-heading">
    <h1>Styles by Miss Njomo Admin Dashboard</h1>
  </section>

  <section class="welcome-section">
    <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin'); ?></strong> 👋</p>
  </section>

  <section class="stats-section">
    <div class="stat-card">
      <i class="fa-solid fa-box-open"></i>
      <div>
        <h3>Products</h3>
        <p><?php echo number_format($product_count); ?></p>
      </div>
    </div>
    <div class="stat-card">
      <i class="fa-solid fa-envelope"></i>
      <div>
        <h3>Messages</h3>
        <p><?php echo number_format($message_count); ?></p>
      </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-comment-dots"></i>
        <div>
            <h3>Testimonials</h3>
            <p><?php echo number_format($testimonial_count); ?></p>
        </div>
    </div>
  </section>
</main>

<script src="static/js/admin.js"></script>
</body>
</html>
