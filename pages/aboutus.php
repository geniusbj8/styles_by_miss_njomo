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
  <title>About Us | Styles By Miss Njomo</title>

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


    <!-- About Us Section-->
    <section class="about-us" id="about">
      <div class="container about-flex">

        <!-- Left Column: About Us Text -->
        <div class="about-text">
          <h2>Welcome to <span>Styles by Miss Njomo</span></h2>
          <p>
            At <strong>Styles by Miss Njomo</strong>, fashion isn't just about clothing — it's about confidence, individuality, and empowerment. We’re more than just an online store; we’re your personal style partner, dedicated to helping you express your best self through carefully curated collections.
          </p>
          <p>
            From luxurious dresses and standout shoes to thoughtful gifts and stylish home accents, every item we offer is handpicked to inspire elegance, joy, and purpose.
          </p>
          <p>
            With every click, cart, and delivery, we’re here to help you shine — because when you feel good, you do good. Whether you're refreshing your wardrobe or finding that perfect gift, <strong>Styles by Miss Njomo</strong> is where elegance meets purpose.
          </p>
          <a href="shop.html" class="btn">Start Your Style Journey</a>
        </div>

        <!-- Right Column: Why Us -->
        <div class="why-us">
          <h3>Why Shop With Us?</h3>
          <ul>
            <li><i class="fas fa-shipping-fast"></i> Fast Delivery Across Regions</li>
            <li><i class="fas fa-star"></i> Premium Quality Products</li>
            <li><i class="fas fa-shield-alt"></i> Service You Can Trust</li>
            <li><i class="fas fa-gem"></i> Unique & Stylish Finds</li>
            <li><i class="fas fa-headset"></i> Personalized Support Anytime</li>
          </ul>
        </div>

      </div>
    </section>

    <!----CEO Message section-->

    <section class="ceo-message-section">
      <div class="ceo-container">
        <div class="ceo-image">
          <img src="static/images/ceo.png" alt="CEO - Miss Njomo" />
        </div>
        <div class="ceo-text">
          <h2>A Message from The CEO</h2>
          <p>
            Hello! I'm Miss Njomo, the heart behind Styles by Miss Njomo. Our journey began with a passion for making people feel confident and celebrated through fashion and thoughtful gifts. Every product is chosen with care, style, and you in mind.
            <br /><br />
            Thank you for supporting local, for choosing style, and for being part of our story. We’re here to make your gifting and shopping experience magical!
          </p>
          <p class="ceo-signature">— Miss Njomo, Founder & CEO</p>
        </div>
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