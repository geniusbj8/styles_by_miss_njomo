document.addEventListener("DOMContentLoaded", function () {
  // ===== Mobile Menu Toggle =====
  const menuToggle = document.getElementById("menuToggle");
  const navMenu = document.getElementById("navMenu");

  if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", () => {
      navMenu.classList.toggle("show");
    });
  }

  // ===== Display Current Year =====
  const displayYear = document.getElementById("displayYear");
  if (displayYear) {
    displayYear.textContent = new Date().getFullYear();
  }

  // ===== Hero Carousel =====
  const slides = document.querySelectorAll(".carousel-slide");
  const prevBtn = document.getElementById("prevSlide");
  const nextBtn = document.getElementById("nextSlide");
  let currentSlide = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });
  }

  if (slides.length > 0) {
    showSlide(currentSlide);

    nextBtn?.addEventListener("click", () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });

    prevBtn?.addEventListener("click", () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });

    // Auto-rotate slides every 6 seconds
    setInterval(() => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }, 6000);
  }

  // ===== Product Modal View =====
  document.querySelectorAll(".view-details").forEach((btn) => {
    btn.addEventListener("click", () => {
      const modalId = btn.getAttribute("data-target");
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = "flex";
      }
    });
  });

  document.querySelectorAll(".close").forEach((closeBtn) => {
    closeBtn.addEventListener("click", () => {
      const modal = closeBtn.closest(".product-modal");
      if (modal) {
        modal.style.display = "none";
      }
    });
  });

  document.querySelectorAll(".qty-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      const inputId = btn.getAttribute("data-target");
      const input = document.getElementById(inputId);
      if (!input) return;

      let value = parseInt(input.value);
      if (btn.classList.contains("plus")) {
        input.value = value + 1;
      } else if (btn.classList.contains("minus") && value > 1) {
        input.value = value - 1;
      }
    });
  });

  // ===== Testimonials Carousel =====
  let currentTestimonial = 0;
  const testimonials = document.querySelectorAll(".testimonial");
  const prevTestimonialBtn = document.querySelector(".prev-btn");
  const nextTestimonialBtn = document.querySelector(".next-btn");

  function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
      testimonial.classList.toggle("active", i === index);
    });
  }

  prevTestimonialBtn?.addEventListener("click", () => {
    currentTestimonial =
      (currentTestimonial - 1 + testimonials.length) % testimonials.length;
    showTestimonial(currentTestimonial);
  });

  nextTestimonialBtn?.addEventListener("click", () => {
    currentTestimonial = (currentTestimonial + 1) % testimonials.length;
    showTestimonial(currentTestimonial);
  });

  // Auto-rotate testimonials every 6 seconds
  setInterval(() => {
    nextTestimonialBtn?.click();
  }, 6000);

  // ===== FAQ Accordion =====
  document.querySelectorAll(".faq-item").forEach((item) => {
    const question = item.querySelector(".faq-question");
    question.addEventListener("click", () => {
      item.classList.toggle("open");
    });
  });

  // ===== Cart Functionality =====
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    document.querySelectorAll("#cart-count").forEach((element) => {
      element.textContent = totalItems;
    });
  }

  function renderCartPage() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContainer = document.getElementById("cart-items");
    let subtotal = 0;

    if (!cartContainer) return;

    if (cart.length === 0) {
      cartContainer.innerHTML =
        '<p class="empty-cart">Your cart is empty. <a href="shop.php">Continue shopping</a></p>';
      updateCartTotals(0);
      return;
    }

    cartContainer.innerHTML = cart
      .map(
        (item) => `
      <div class="cart-item" data-id="${item.id}">
        <img src="../uploads/${item.image}" alt="${item.name
          }" class="cart-item-image">
        <div class="cart-item-details">
          <h3 class="cart-item-title">${item.name}</h3>
          <p class="cart-item-price">Ksh ${item.price.toLocaleString()}</p>
          <div class="quantity-control">
            <button class="quantity-btn decrease-quantity">−</button>
            <span class="quantity">${item.quantity}</span>
            <button class="quantity-btn increase-quantity">+</button>
          </div>
          <button class="remove-item">Remove Item</button>
        </div>
      </div>
    `
      )
      .join("");

    subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    updateCartTotals(subtotal);
    attachCartEventListeners();
  }

  function updateCartTotals(subtotal) {
    document.getElementById(
      "cart-subtotal"
    ).textContent = `Ksh ${subtotal.toLocaleString()}`;
    document.getElementById(
      "cart-total"
    ).textContent = `Ksh ${subtotal.toLocaleString()}`;
  }

  function attachCartEventListeners() {
    document.querySelectorAll(".decrease-quantity").forEach((button) => {
      button.addEventListener("click", handleQuantityChange);
    });

    document.querySelectorAll(".increase-quantity").forEach((button) => {
      button.addEventListener("click", handleQuantityChange);
    });

    document.querySelectorAll(".remove-item").forEach((button) => {
      button.addEventListener("click", removeCartItem);
    });

    document
      .getElementById("checkout-btn")
      ?.addEventListener("click", handleCheckout);
  }

  function handleQuantityChange(event) {
    const itemElement = event.target.closest(".cart-item");
    const itemId = itemElement.dataset.id;
    const quantityElement = itemElement.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);

    if (event.target.classList.contains("decrease-quantity")) {
      quantity = Math.max(1, quantity - 1);
    } else {
      quantity += 1;
    }

    updateCartItem(itemId, quantity, quantityElement);
  }

  function updateCartItem(itemId, newQuantity, quantityElement) {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const itemIndex = cart.findIndex((item) => item.id === itemId);

    if (itemIndex > -1) {
      cart[itemIndex].quantity = newQuantity;
      localStorage.setItem("cart", JSON.stringify(cart));
      quantityElement.textContent = newQuantity;
      updateCartTotals(calculateSubtotal(cart));
      updateCartCount();
    }
  }

  function removeCartItem(event) {
    const itemElement = event.target.closest(".cart-item");
    const itemId = itemElement.dataset.id;
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    cart = cart.filter((item) => item.id !== itemId);
    localStorage.setItem("cart", JSON.stringify(cart));

    itemElement.remove();
    updateCartTotals(calculateSubtotal(cart));
    updateCartCount();

    if (cart.length === 0) {
      document.getElementById("cart-items").innerHTML =
        '<p class="empty-cart">Your cart is empty. <a href="shop.php">Continue shopping</a></p>';
    }
  }

  function calculateSubtotal(cart) {
    return cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  }

  function cleanCart() {
    localStorage.removeItem("cart");
  }

  // Handle checkout button click
  function handleCheckout() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
      alert("Your cart is empty.");
      return;
    }

    const whatsappNumber = "254768706146";

    let message = `*NEW ORDER FROM Styles By Miss Njomo*\n\n`;
    message += `*Customer Information*\n`;
    message += `Name: [Please provide your name]\n`;
    message += `Delivery Address: [Please provide address]\n\n`;

    message += `*Order Details*\n\n`;

    cart.forEach((item, index) => {
      message += `*${index + 1}. ${item.name}*\n`;
      message += `Quantity: ${item.quantity}\n`;
      message += `Price: Ksh ${item.price.toLocaleString()}\n`;
      message += `Total: Ksh ${(
        item.price * item.quantity
      ).toLocaleString()}\n`;
      message += `-------------------------------\n`;
    });

    const subtotal = calculateSubtotal(cart);

    message += `\n*Order Summary*\n`;
    message += `Subtotal: Ksh ${subtotal.toLocaleString()}\n`;
    message += `*Grand Total: Ksh ${subtotal.toLocaleString()}*\n\n`;
    message += `_Please confirm availability and payment details._`;

    const encodedMessage = encodeURIComponent(message);

    const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
    window.open(whatsappUrl, "_blank");

    cleanCart();
  }

  document.addEventListener("DOMContentLoaded", () => {
    const checkoutBtn = document.getElementById("checkout-btn");
    if (checkoutBtn) {
      checkoutBtn.addEventListener("click", handleCheckout);
    }
  });

  // ===== Add to Cart Functionality =====
  document.addEventListener("click", function (e) {
    if (e.target.closest(".add-cart")) {
      const button = e.target.closest(".add-cart");
      const productId = button.dataset.id;
      const productName = button.dataset.name;
      const productPrice = parseFloat(button.dataset.price);
      const productImage = button.dataset.image;
      const quantityInput = button
        .closest(".modal-details")
        ?.querySelector('input[type="number"]') || { value: 1 };
      const quantity = parseInt(quantityInput.value);

      if (productId && productName && !isNaN(productPrice)) {
        addToCart({
          id: productId,
          name: productName,
          price: productPrice,
          image: productImage,
          quantity: quantity,
        });
      }
    }
  });

  function addToCart(item) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const existingItem = cart.find((cartItem) => cartItem.id === item.id);

    if (existingItem) {
      existingItem.quantity += item.quantity;
    } else {
      cart.push(item);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartCount();
    showCartNotification(item.name, item.quantity);
  }

  function showCartNotification(itemName, quantity) {
    Swal.fire({
      position: "top-end",
      icon: "success",
      title: `${quantity}x ${itemName} added to cart!`,
      showConfirmButton: false,
      timer: 2000,
      toast: true,
    });
  }

  // Initialize cart functionality
  updateCartCount();
  if (document.getElementById("cart-items")) {
    renderCartPage();
  }

  // ===== Contact Form Submission =====
  const contactForm = document.querySelector(".contact-form");

  contactForm?.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = contactForm.querySelector('input[name="name"]').value.trim();
    const subject = contactForm.querySelector('input[name="subject"]').value.trim();
    const message = contactForm.querySelector('textarea[name="message"]').value.trim();

    if (!name || !subject || !message) {
      alert("Please fill in all fields.");
      return;
    }

    const formData = new FormData();
    formData.append("name", name);
    formData.append("subject", subject);
    formData.append("message", message);

    fetch("/api/save_contact.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        if (!res.ok) throw new Error("Failed to save message.");
        return res.json();
      })
      .then((data) => {
        if (data.success) {
          const whatsappNumber = "254768706146";
          const whatsappMessage = `*New Inquiry from Styles by Miss Njomo*\n\n*Name:* ${name}\n*Subject:* ${subject}\n*Message:* ${message}`;

          // Open WhatsApp in new tab with pre-filled message
          window.open(`https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`, "_blank");
          contactForm.reset();
        } else {
          alert(data.message || "Message could not be saved.");
        }
      })
      .catch((err) => {
        console.error("Error:", err);
        alert("Something went wrong. Please try again later.");
      });

  });



  // ===== Search Functionality =====
  document.getElementById("searchBtn")?.addEventListener("click", function () {
    const searchTerm = document.getElementById("searchBar")?.value;
    if (searchTerm) {
      window.location.href = `shop.php?search=${encodeURIComponent(
        searchTerm
      )}`;
    }
  });

  document.getElementById("searchBar")
    ?.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        const searchTerm = this.value;
        if (searchTerm) {
          window.location.href = `shop.php?search=${encodeURIComponent(
            searchTerm
          )}`;
        }
      }
    });
});

document.querySelectorAll(".whatsapp-link").forEach((link) => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const name = this.dataset.name;
    const price = parseFloat(this.dataset.price);
    const qtyInputId = this.dataset.qtyInput;
    const quantity = qtyInputId
      ? document.getElementById(qtyInputId)?.value || 1
      : 1;

    const total = price * quantity;
    const formattedPrice = `Ksh ${price.toLocaleString()}`;
    const formattedTotal = `Ksh ${total.toLocaleString()}`;

    const message =
      `NEW ORDER FROM Styles By Miss Njomo\n\n` +
      `Customer Information\n` +
      `Name: [Please provide your name]\n` +
      `Delivery Address: [Please provide address]\n\n` +
      `Order Details\n` +
      `Product: ${name}\n` +
      `Quantity: ${quantity}\n` +
      `Price: ${formattedPrice}\n` +
      `Total: ${formattedTotal}\n\n` +
      `Please confirm availability and payment details.`;

    const encodedMessage = encodeURIComponent(message);
    const whatsappNumber = "254768706146";
    const url = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

    window.open(url, "_blank");
  });
});

/* Back to Top Button */

const backToTopButton = document.getElementById('backToTop');

window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    backToTopButton.style.display = 'block';
  } else {
    backToTopButton.style.display = 'none';
  }
});

backToTopButton.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});