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
  <title>Styles By Miss Njomo | Elegant Fashion for Every Occasion - Shop Clothes, Shoes, Gifts & More</title>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


  <!-- main section-->
  <main>
    <!--Hero Section-->

    <section class="hero-carousel">
      <div class="carousel-slide active">
        <div class="hero-content">
          <div class="hero-text">
            <h1>Welcome to Styles by Miss Njomo</h1>
            <p>Discover trendy outfits, bags, shoes, gifts, and more!</p>
            <a href="shop.html" class="btn-shop">Shop Now</a>
          </div>
          <div class="hero-image">
            <img src="static/images/hero1.png" alt="Hero 1" />
          </div>
        </div>
      </div>

      <div class="carousel-slide">
        <div class="hero-content">
          <div class="hero-text">
            <h1>Elegant & Affordable Fashion</h1>
            <p>Curated collections made with love, for every occasion.</p>
            <a href="shop.html" class="btn-shop">Explore Collection</a>
          </div>
          <div class="hero-image">
            <img src="static/images/hero2.png" alt="Hero 2" />
          </div>
        </div>
      </div>

      <div class="carousel-slide">
        <div class="hero-content">
          <div class="hero-text">
            <h1>Household Essentials & Gifts</h1>
            <p>Beautiful pieces to brighten your home and loved ones’ hearts.</p>
            <a href="shop.html" class="btn-shop">See More</a>
          </div>
          <div class="hero-image">
            <img src="static/images/hero3.png" alt="Hero 3" />
          </div>
        </div>
      </div>

      <!-- Navigation Arrows -->
      <div class="carousel-nav">
        <i class="fas fa-chevron-left" id="prevSlide"></i>
        <i class="fas fa-chevron-right" id="nextSlide"></i>
      </div>
    </section>

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


    <!--- Shop Section --->

    <?php
    $sql = "SELECT * FROM products LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
      <section class="shop-section" id="shop">
        <h2 class="section-title">Featured Products</h2>
        <div class="product-grid">

          <?php $count = 1;
          while ($row = $result->fetch_assoc()):
            $productName = htmlspecialchars($row['name']);
            $productPriceRaw = $row['price']; // use raw price
            $productPrice = number_format($productPriceRaw);
            $productImage = htmlspecialchars($row['image']);
            $productDesc = htmlspecialchars($row['description']);
            $productCategory = htmlspecialchars($row['category']);
            $productId = $row['id'];
          ?>

            <div class="product-card">
              <div class="product-image">
                <img src="../uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" />
              </div>
              <h3><?php echo $productName; ?></h3>
              <p class="price"><i class="fas fa-tag"></i> Ksh <?php echo $productPrice; ?></p>
              <div class="card-buttons">
                <div class="cbtns">
                  <button class="add-cart"
                    data-id="<?php echo $productId; ?>"
                    data-name="<?php echo $productName; ?>"
                    data-price="<?php echo $productPriceRaw; ?>"
                    data-image="<?php echo $productImage; ?>">
                    <i class="fas fa-cart-plus"></i> Add to Cart
                  </button>
                  <button class="view-details" data-target="modal<?php echo $count; ?>"><i class="fas fa-eye"></i> View Details</button>
                </div>
                <div class="wbtn">
                  <a href="#"
                    class="whatsapp-link"
                    data-name="<?php echo $productName; ?>"
                    data-price="<?php echo $productPriceRaw; ?>"
                    data-qty-input="quantity<?php echo $count; ?>">
                    <i class="fab fa-whatsapp"></i> Order on WhatsApp
                  </a>
                </div>
              </div>
            </div>

            <div class="product-modal" id="modal<?php echo $count; ?>">
              <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-image">
                  <img src="../uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" />
                </div>
                <div class="modal-details">
                  <h3><?php echo $productName; ?></h3>
                  <p class="category">Category: <?php echo $productCategory; ?></p>
                  <p class="price"><i class="fas fa-tag"></i> Price: Ksh <?php echo $productPrice; ?></p>
                  <p class="description"><?php echo $productDesc; ?></p>
                  <label for="quantity<?php echo $count; ?>">Quantity:</label>
                  <div class="quantity-wrapper">
                    <button type="button" class="qty-btn minus" data-target="quantity<?php echo $count; ?>">−</button>
                    <input type="number" id="quantity<?php echo $count; ?>" min="1" value="1" />
                    <button type="button" class="qty-btn plus" data-target="quantity<?php echo $count; ?>">+</button>
                  </div>

                  <div class="modal-buttons">
                    <button class="add-cart"
                      data-id="<?php echo $productId; ?>"
                      data-name="<?php echo $productName; ?>"
                      data-price="<?php echo $productPriceRaw; ?>"
                      data-image="<?php echo $productImage; ?>">
                      <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                    <button href="#"
                      class="whatsapp-link"
                      data-name="<?php echo $productName; ?>"
                      data-price="<?php echo $productPriceRaw; ?>"
                      data-qty-input="quantity<?php echo $count; ?>">
                      <i class="fab fa-whatsapp"></i> Order on WhatsApp
                    </button>
                  </div>
                </div>
              </div>
            </div>

          <?php $count++;
          endwhile; ?>

        </div>
        <div class="shop-view-more">
          <a href="shop.php" class="btn">View More <i class="fas fa-arrow-right"></i></a>
        </div>
      </section>
    <?php endif; ?>



    <!---Testimonial Section--->

    <section class="testimonial-section">
      <h2 class="section-title">What Our Clients Say</h2>
      <div class="testimonial-carousel">

        <?php
        // Database connection

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




  <!-- Footer Section -->
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


  <button id="backToTop" title="Back to Top"><i class="fas fa-arrow-up"></i></button>


  <script src="static/js/script.js"></script>
</body>

</html>