<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Include the configuration file to get the database connection
require_once(__DIR__ . '/../config/config.php');

// Check if the user is already logged in
if (isset($_SESSION['admin_logged_in'])) {
  header("Location: admin_dashboard.php");
  exit;
}


// Handle the form submission when the form is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $remember = isset($_POST['remember']);

  // Prepare and execute the query to fetch the admin from the database
  $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
  $stmt->bind_param("s", $username);  // Bind the username parameter
  $stmt->execute();
  $result = $stmt->get_result();
  $admin = $result->fetch_assoc(); // Fetch the result as an associative array

  // Check if the admin exists and if the password matches
  if ($admin && hash('sha256', $password) === $admin['password']) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_user'] = $username;
    $_SESSION['admin_name'] = $admin['username']; // Or use full_name if available

    // Handle "Remember Me" functionality
    if ($remember) {
      setcookie("remember_admin", $username, time() + (86400 * 30), "/"); // Cookie expires in 30 days
    } else {
      setcookie("remember_admin", "", time() - 3600, "/"); // Remove cookie if not checked
    }

    echo "<script>localStorage.setItem('adminLoginSuccess', '1'); window.location.href='admin_dashboard.php';</script>";
    exit;
  } else {
    echo "<script>localStorage.setItem('adminLoginError', '1'); window.location.href='admin_login.php';</script>";
    exit;
  }
}

// Check if the user has a remembered username
$remembered = $_COOKIE['remember_admin'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Styles by Miss Njomo</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link rel="stylesheet" href="static/css/admin-login.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

  <div class="login-container">
    <h2>Login</h2>
    <form id="login-form" method="POST">
      <!-- Username input field with icon -->
      <div class="input-group">
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($remembered) ?>" placeholder="Username" required>
        <i class="fas fa-user"></i>
      </div>

      <!-- Password input field with icon -->
      <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fas fa-eye" id="toggle-password"></i> <!-- Eye icon for toggling password visibility -->
      </div>

      <!-- Remember me checkbox -->
      <div class="remember-me-container">
        <input type="checkbox" id="remember-me" name="remember" <?= $remembered ? 'checked' : '' ?>>
        <label for="remember-me">Remember Me</label>
      </div>

      <!-- Login button -->
      <button type="submit">Login</button>
    </form>
  </div>

  <script src="static/js/admin_login.js"></script>
</body>

</html>