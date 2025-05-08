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
  <title>Contact Us | Styles By Miss Njomo</title>

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


    <!--- Contact Us Section -->

    <section class="contact-section" id="contact">
      <h2 class="section-title">Contact Us</h2>
      <div class="contact-container">
        <form id="contactForm" class="contact-form">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="text" name="subject" placeholder="Subject" required>
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>

        <div class="contact-info">
          <h3>Get in Touch</h3>
          <p><i class="fas fa-envelope"></i> njomotiffany@gmail.com</p>
          <p><i class="fas fa-phone-alt"></i> +254 116682077</p>
          <p><i class="fas fa-map-marker-alt"></i> Nairobi, Kenya</p>
          <div class="social-links">
            <a href="https://www.tiktok.com/@styles.by.miss.nj?_t=ZM-8vbLZnbQVWf&_r=1" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.instagram.com/_stylesbymissnjomo_?igsh=MWF2Nm92ZW5xMDlqNA==&utm_source=ig_contact_invite" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/254116682077" target="_blank"><i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ section-->

    <section class="faq-section">
      <h2 class="faq-title">Frequently Asked Questions</h2>
      <div class="faq-list">

        <div class="faq-item">
          <div class="faq-question">
            <span>How can I place an order on Styles by Miss Njomo?</span>
            <i class="faq-icon fa-solid fa-plus"></i>
          </div>
          <div class="faq-answer">
            <p>Simply browse our categories, select a product, and click 'Add to Cart' or 'Order via WhatsApp' to start your purchase.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <span>Do you offer same-day delivery?</span>
            <i class="faq-icon fa-solid fa-plus"></i>
          </div>
          <div class="faq-answer">
            <p>Yes, same-day delivery is available within Nairobi for orders placed before 2PM.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <span>What payment methods are available?</span>
            <i class="faq-icon fa-solid fa-plus"></i>
          </div>
          <div class="faq-answer">
            <p>We accept M-Pesa or Cash on Delivery.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <span>Can I get a custom money bouquet?</span>
            <i class="faq-icon fa-solid fa-plus"></i>
          </div>
          <div class="faq-answer">
            <p>Absolutely! We love custom orders. Contact us via WhatsApp to personalize your package.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <span>What makes Styles by Miss Njomo special?</span>
            <i class="faq-icon fa-solid fa-plus"></i>
          </div>
          <div class="faq-answer">
            <p>Our special designs, personalized gifting, and fast delivery make us stand out from the rest.</p>
          </div>
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