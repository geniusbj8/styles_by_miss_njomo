// manage_products.js

document.addEventListener("DOMContentLoaded", () => {
  const addProductBtn = document.getElementById("addProductBtn");
  const productModal = document.getElementById("productModal");
  const closeModalBtn = document.querySelector(".close-modal");
  const productForm = document.getElementById("productForm");
  const modalTitle = document.getElementById("modalTitle");
  const productIdInput = document.getElementById("productId");

  // Open modal for adding a product
  addProductBtn.addEventListener("click", () => {
    openModal("Add Product");
  });

  // Close modal
  closeModalBtn.addEventListener("click", () => {
    closeModal();
  });

  // Close modal if clicking outside content
  window.addEventListener("click", (e) => {
    if (e.target === productModal) {
      closeModal();
    }
  });

  // Handle form submit (Save Product)
  productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(productForm);

    try {
      // Example: Send form data to save_product.php
      const response = await fetch("api/save_product.php", {
        method: "POST",
        body: formData,
      });

      const result = await response.json();

      if (result.success) {
        Swal.fire("Success!", result.message, "success");
        closeModal();
        // Optionally reload product list
        loadProducts();
      } else {
        Swal.fire("Error!", result.message, "error");
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire("Error!", "Something went wrong.", "error");
    }
  });

  // Load Products (basic setup)
  async function loadProducts() {
    try {
      const response = await fetch("api/fetch_products.php");
      const products = await response.json();
      const tableBody = document.getElementById("productTableBody");
      tableBody.innerHTML = "";

      products.forEach((product, index) => {
        const row = document.createElement("tr");

        // In manage_products.js
        row.innerHTML = `
          <td>${index + 1}</td>
          <td><img src="../uploads/${product.image}" alt="${product.name}"></td>
          <td>${product.name}</td>
          <td>${product.price}</td>
          <td>${product.category}</td>
          <td>
            <button class="edit-btn" data-id="${
              product.id
            }"><i class="fas fa-edit"></i></button>
            <button class="delete-btn" data-id="${
              product.id
            }"><i class="fas fa-trash"></i></button>
          </td>
          `;

        tableBody.appendChild(row);
      });

      attachActionButtons(); // Attach listeners after loading products
    } catch (error) {
      console.error("Failed to load products:", error);
    }
  }

  // Attach Edit and Delete button listeners
  function attachActionButtons() {
    document.querySelectorAll(".edit-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("data-id");
        editProduct(id);
      });
    });

    document.querySelectorAll(".delete-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("data-id");
        deleteProduct(id);
      });
    });
  }

  // Open modal to edit product
  async function editProduct(id) {
    try {
      const response = await fetch(`api/get_product.php?id=${id}`);
      const product = await response.json();

      console.log("Fetched Product:", product); // Add this line for debugging

      modalTitle.textContent = "Edit Product";
      productIdInput.value = product.id;
      document.getElementById("productName").value = product.name;
      document.getElementById("productPrice").value = product.price;
      document.getElementById("productCategory").value = product.category;
      document.getElementById("productDescription").value = product.description;

      // Set current product image preview
      const imagePreview = document.getElementById("imagePreview");
      if (product.image) {
        imagePreview.src = `../uploads/${product.image}`;
        imagePreview.style.display = "block";
      } else {
        imagePreview.style.display = "none";
      }

      openModal("Edit Product");
    } catch (error) {
      console.error("Error fetching product:", error);
      Swal.fire("Error!", "Could not load product details.", "error");
    }
  }

  // Delete a product
  function deleteProduct(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "This product will be permanently deleted!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#8E6CA9",
      confirmButtonText: "Yes, delete it!",
    }).then(async (result) => {
      if (result.isConfirmed) {
        try {
          const response = await fetch(`api/delete_product.php?id=${id}`, {
            method: "DELETE",
          });
          const result = await response.json();

          if (result.success) {
            Swal.fire("Deleted!", result.message, "success");
            loadProducts();
          } else {
            Swal.fire("Error!", result.message, "error");
          }
        } catch (error) {
          console.error("Error deleting product:", error);
          Swal.fire("Error!", "Failed to delete product.", "error");
        }
      }
    });
  }

  // Open Modal Helper
  function openModal(title) {
    modalTitle.textContent = title;
    productForm.reset();
    productIdInput.value = ""; // Clear hidden input
    productModal.style.display = "block";
  }

  // Close Modal Helper
  function closeModal() {
    productModal.style.display = "none";
    productForm.reset();
    productIdInput.value = "";
  }

  // Initial Load
  loadProducts();
});
