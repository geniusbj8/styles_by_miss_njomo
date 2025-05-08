// Function to toggle password visibility
function togglePasswordVisibility() {
  const oldPassword = document.getElementById("old-password");
  const newPassword = document.getElementById("new-password");
  const confirmPassword = document.getElementById("confirm-password");

  const fields = [oldPassword, newPassword, confirmPassword];
  fields.forEach((field) => {
    if (field.type === "password") {
      field.type = "text";
    } else {
      field.type = "password";
    }
  });
}

// Handle the form submission for password update
async function handlePasswordUpdate(event) {
  event.preventDefault(); // Prevent default form submit

  const oldPassword = document.getElementById("old-password").value.trim();
  const newPassword = document.getElementById("new-password").value.trim();
  const confirmPassword = document.getElementById("confirm-password").value.trim();

  // Check if new password and confirmation match
  if (newPassword !== confirmPassword) {
    Swal.fire({
      icon: "error",
      title: "Passwords do not match",
      text: "Please check your new password and confirmation.",
    });
    return;
  }

  // Ask confirmation using SweetAlert
  const confirmation = await Swal.fire({
    title: "Are you sure?",
    text: "You are about to change your password.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, update it!",
  });

  if (!confirmation.isConfirmed) return;

  // Prepare form data
  const formData = new FormData();
  formData.append("old_password", oldPassword);
  formData.append("new_password", newPassword);
  formData.append("confirm_password", confirmPassword);

  try {
    // Send request to update_password.php
    const response = await fetch("api/update_password.php", {
      method: "POST",
      body: formData,
    });

    const result = await response.json();

    if (result.status === "success") {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: result.message,
      }).then(() => {
        // Optionally, clear input fields after success
        document.getElementById("old-password").value = "";
        document.getElementById("new-password").value = "";
        document.getElementById("confirm-password").value = "";
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: result.message,
      });
    }
  } catch (error) {
    console.error("Error updating password:", error);
    Swal.fire({
      icon: "error",
      title: "Server Error",
      text: "An unexpected error occurred. Please try again later.",
    });
  }
}

// Attach the form submit handler
document.querySelector("form").addEventListener("submit", handlePasswordUpdate);
