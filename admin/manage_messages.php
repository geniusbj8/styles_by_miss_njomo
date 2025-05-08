<?php
session_start();
require_once __DIR__ . '/../config/config.php';
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

$sql = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Messages - Admin Dashboard | Styles by Miss Njomo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="static/css/admin.css" />
  <link rel="stylesheet" href="static/css/manage_messages.css" />

</head>

<body>

  <aside class="sidebar">
    <!-- Sidebar header -->
    <header class="sidebar-header">
      <a href="manage_messages.php" class="header-logo">
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
      <h1>Contact Messages</h1>
      <p class="welcome-section">View all customer inquiries submitted through the contact form.</p>
    </section>

    <section class="messages-section">
      <div class="messages-table-wrapper">
        <table class="messages-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Submitted At</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "<td>" . date('M d, Y H:i', strtotime($row['submitted_at'])) . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No messages found.</td></tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>



  <script src="static/js/admin.js"></script>
</body>

</html>