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

// Admin Name from session
$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Profile - Admin Dashboard | Styles by Miss Njomo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="static/css/admin.css" />
  <link rel="stylesheet" href="static/css/profile.css" />

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



  <!-- Main Content -->
  <div class="main-content">
    <div class="profile-container">
      <div class="profile-card">
        <i class="fa-solid fa-user"></i>
        <h2><?php echo htmlspecialchars($admin_name); ?></h2>
      </div>

      <div class="change-password-form">
        <h3>Change Password</h3>
        <form action="api/update_password.php" method="POST" onsubmit="return confirmChangePassword()">
          <div class="form-group">
            <label for="old-password">Old Password</label>
            <input type="password" id="old-password" name="old_password" required>
          </div>
          <div class="form-group">
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new_password" required>
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm New Password</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
          </div>
          <div class="visibility">
            <input type="checkbox" id="toggle-password" onclick="togglePasswordVisibility()"> Show Password
          </div>
          <button type="submit" class="primary-btn">Update Password</button>
        </form>
      </div>
    </div>
  </div>



  <script src="static/js/admin.js"></script>
  <script src="static/js/profile.js"></script>
</body>

</html>