<?php
session_start();
require_once(__DIR__ . '/../config/config.php');
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

// Fetch testimonials
$testimonials_query = "SELECT * FROM testimonials ORDER BY id DESC";
$testimonials_result = mysqli_query($conn, $testimonials_query);

if (!$testimonials_result) {
  die('Error fetching testimonials: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Manage Testimonials - Admin Dashboard | Styles by Miss Njomo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="static/css/admin.css" />
  <link rel="stylesheet" href="static/css/manage_testimonials.css" />
</head>

<body>

  <aside class="sidebar">
    <header class="sidebar-header">
      <a href="manage_testimonials.php" class="header-logo">
        <img src="static/images/Styles by Miss Njomo icon.png" alt="Styles By Miss Njomo">
      </a>
      <button class="toggler sidebar-toggler">
        <span class="fa-solid fa-chevron-left"></span>
      </button>
      <button class="toggler menu-toggler">
        <span class="fas fa-bars"></span>
      </button>
    </header>

    <nav class="sidebar-nav">
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
          <a href="manage_testimonials.php" class="nav-link active">
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
    <div class="testimonial-header">
      <h1>Manage Testimonials</h1>
      <button id="addTestimonialBtn" class="btn primary-btn">
        <i class="fas fa-plus"></i> Add Testimonial
      </button>
    </div>

    <div class="testimonial-table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Message</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($testimonials_result)) { ?>
            <tr data-id="<?= $row['id']; ?>" data-name="<?= htmlspecialchars($row['name']); ?>" data-location="<?= htmlspecialchars($row['location']); ?>" data-message="<?= htmlspecialchars($row['message']); ?>">
              <td><?= $row['id']; ?></td>
              <td><?= htmlspecialchars($row['name']); ?></td>
              <td><?= htmlspecialchars($row['location']); ?></td>
              <td><?= htmlspecialchars($row['message']); ?></td>
              <td>
                <button class="btn edit-btn"><i class="fas fa-edit"></i></button>
                <button class="btn delete-btn"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Modal -->
  <div id="testimonialModal" class="modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h2 id="modalTitle">Add Testimonial</h2>
      <form id="testimonialForm">
        <input type="hidden" id="testimonialId" name="id">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="text" id="location" name="location" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn primary-btn" id="saveTestimonialBtn">Save</button>
      </form>
    </div>
  </div>

  <script src="static/js/admin.js"></script>
  <script src="static/js/manage_testimonials.js"></script>
</body>

</html>
