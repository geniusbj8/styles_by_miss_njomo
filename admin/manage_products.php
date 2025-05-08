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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Manage Products - Admin Dashboard | Styles by Miss Njomo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="static/css/admin.css" />
  <link rel="stylesheet" href="static/css/manage_products.css">

</head>

<body>

  <aside class="sidebar">
    <!-- Sidebar header -->
    <header class="sidebar-header">
      <a href="manage_products.php" class="header-logo">
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
    <section class="add-product-section">
      <button id="addProductBtn" class="btn-add-product">
        <i class="fas fa-plus"></i> Add Product
      </button>
    </section>

    <section class="product-list-section">
      <h2>Product List</h2>
      <table class="product-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price (Ksh)</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="productTableBody">
          <!-- Dynamic PHP rows go here -->
        </tbody>
      </table>
    </section>

    <!-- Add/Edit Product Modal -->
    <div class="modal" id="productModal">
      <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h3 id="modalTitle">Add Product</h3>
        <form id="productForm">
          <input type="hidden" id="productId" name="productId">
          <label>Name</label>
          <input type="text" id="productName" name="name" required>
          <label>Price (Ksh)</label>
          <input type="number" id="productPrice" name="price" required>
          <label>Category</label>
          <select id="productCategory" name="category" required>
            <option value="">Select Category</option>
            <option value="Clothes">Clothes</option>
            <option value="Shoes">Shoes</option>
            <option value="Bags">Bags</option>
            <option value="Gifts">Gifts</option>
            <option value="Household Items">Household Items</option>
            <option value="Others">Others</option>
          </select>
          <label>Description</label>
          <textarea id="productDescription" name="description" rows="4" required></textarea>

          <label>Image</label>
          <input type="file" id="productImage" name="image">

          <!-- 🛠 ADD THIS IMAGE PREVIEW BELOW -->
          <img id="imagePreview" src="" alt="Image Preview" style="display:none; width:100px; margin-top:10px;">

          <button type="submit" class="btn-submit">Save Product</button>
        </form>

      </div>
    </div>
  </main>


  <script src="static/js/manage_products.js"></script>
  <script src="static/js/admin.js"></script>
</body>

</html>