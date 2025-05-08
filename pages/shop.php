<?php
session_start();
require_once(__DIR__ . '/../config/config.php');

$searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Filter query only by search term
$sql = "SELECT * FROM products WHERE 1";
if ($searchTerm) {
  $sql .= " AND (name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%')";
}

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Shop | Styles By Miss Njomo</title>
  <meta name="description" content="Shop stylish clothes, shoes, bags, gifts, and household items from Styles By Miss Njomo. Fashionable and affordable for every woman." />
  <meta name="keywords" content="Styles By Miss Njomo, fashion, clothes, shoes, gifts, bags, household items, Kenya fashion, women’s fashion, ecommerce" />
  <meta name="author" content="Miss Njomo" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="index, follow" />
  <meta name="google" content="notranslate" />
  <link rel="icon" type="image/png" href="static/images/Styles by Miss Njomo icon.png" />
  <link rel="stylesheet" href="static/css/style.css" />
  <link rel="stylesheet" href="static/css/responsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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

  <main>
    <section class="shop-controls">
      <form action="shop.php" method="get">
        <div class="search-container">
          <input type="text" class="search-bar" id="searchBar" name="search" placeholder="Search for products..." value="<?php echo $searchTerm; ?>">
          <button class="search-icon" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </form>
      <div class="categories">
        <h3>Categories</h3>
        <ul id="categoryList">
          <li class="category-item" data-category="All">All</li>
          <li class="category-item" data-category="clothes">Clothes</li>
          <li class="category-item" data-category="shoes">Shoes</li>
          <li class="category-item" data-category="gifts">Gifts</li>
          <li class="category-item" data-category="bags">Bags</li>
          <li class="category-item" data-category="household">Household</li>
        </ul>

      </div>
    </section>

    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
      <section class="shop-section" id="shop">
        <h2 class="section-title">Our Products</h2>
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

  <script src="static/js/script.js"></script>
</body>

</html>