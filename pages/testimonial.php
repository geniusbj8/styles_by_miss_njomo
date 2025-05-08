<?php
// Start session
session_start();

// Include the configuration file
require_once(__DIR__ . '/../config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Testimonials | Styles By Miss Njomo</title>

  <!-- SEO Meta Description -->
  <meta name="description" content="Shop stylish clothes, shoes, bags, gifts, and household items from Styles By Miss Njomo. Fashionable and affordable for every woman." />

  <!-- Keywords for SEO -->
  <meta name="keywords" content="Styles By Miss Njomo, fashion, clothes, shoes, gifts, bags, household items, Kenya fashion, women’s fashion, ecommerce" />

  <meta name="author" content="Miss Njomo" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="index, follow" />
  <meta name="google" content="notranslate" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="static/css/style.css" />
  <link rel="stylesheet" href="static/css/responsive.css" />

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

  <header>
    <div class="logo">
      <a href="#">
        <img src="static/images/Styles by Miss Njomo logo.png" alt="Styles By Miss Njomo Logo" />
      </a>
    </div>

    <nav>
      <div class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
      </div>
      <ul id="navMenu">
        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="aboutus.php"><i class="fas fa-info-circle"></i> About Us</a></li>
        <li><a href="shop.php"><i class="fas fa-store"></i> Shop</a></li>
        <li><a href="testimonial.php"><i class="fas fa-comment-dots"></i> Testimonials</a></li>
        <li><a href="contact.php"><i class="fas fa-phone-alt"></i> Contact Us</a></li>
        <li>
          <a href="cart.php" class="cart-nav">
            <i class="fas fa-shopping-cart"></i> Cart
            (<span id="cart-count">0</span>)
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <main>


    <!---Testimonial Section--->

    <section class="testimonial-section">
      <h2 class="section-title">What Our Clients Say</h2>
      <div class="testimonial-carousel">

        <?php
        $sql = "SELECT * FROM testimonials";
        $result = $conn->query($sql);
        $isActive = true;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $location = $row['location'];
            $message = $row['message'];
            $activeClass = $isActive ? 'active' : '';
            echo "
            <div class='testimonial $activeClass'>
              <i class='fas fa-quote-left quote-icon'></i>
              <p class='testimonial-text'>\"$message\"</p>
              <div class='client-info'>
                <h4>$name</h4>
                <small>$location</small>
              </div>
            </div>
            ";
            $isActive = false;
          }
        } else {
          echo "<p>No testimonials yet.</p>";
        }

        $conn->close();
        ?>
      </div>

      <div class="testimonial-nav">
        <button class="prev-btn">&#10094;</button>
        <button class="next-btn">&#10095;</button>
      </div>
    </section>


  </main>

  <footer class="footer">
    <div class="footer-container">
      <!-- About Section -->
      <div class="footer-section about">
        <h3>About Us</h3>
        <p>
          We are committed to delivering the best products and services to our
          customers. Follow us on social media to stay updated.
        </p>
        <div class="social-icons">
          <a href="https://chat.whatsapp.com/IxK37er18GbC7jQDC9uWSD" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
          <a href="mailto:njomotiffany@gmail.com" aria-label="Email" target="_blank"><i class="fas fa-envelope"></i></a>
          <a href="https://www.instagram.com/_stylesbymissnjomo_?igsh=MWF2Nm92ZW5xMDlqNA==&utm_source=ig_contact_invite" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.tiktok.com/@styles.by.miss.nj?_t=ZM-8vbLZnbQVWf&_r=1" aria-label="TikTok" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>

      <!-- Quick Links Section -->
      <div class="footer-section links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
          <li><a href="aboutus.php"><i class="fas fa-angle-right"></i> About Us</a></li>
          <li><a href="shop.php"><i class="fas fa-angle-right"></i> Shop</a></li>
          <li><a href="testimonial.php"><i class="fas fa-angle-right"></i> Testimonials</a></li>
          <li><a href="contact.php"><i class="fas fa-angle-right"></i> Contact Us</a></li>
          <li><a href="privacypolicy.php"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
        </ul>
      </div>

      <div class="footer-section links">
        <h3>Get in Touch</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i> Nairobi, Kenya</li>
          <li><i class="fas fa-phone"></i> +254 116 682 077</li>
          <li><i class="fas fa-envelope"></i> njomotiffany@gmail.com</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>
        &copy; <span id="displayYear"></span> Styles By Miss Njomo. All Rights Reserved.
      </p>
    </div>

    <div class="footer-bottom">
      <p>
        Web Design, Development and SEO by
        <a href="https://www.linkedin.com/in/benjamin-justin/" target="_blank">B-TECH TECHNOLOGIES</a>
      </p>
    </div>
  </footer>

  <script src="static/js/script.js"></script>


</body>

</html>