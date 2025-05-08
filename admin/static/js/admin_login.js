// Get the eye icon and password input field
const togglePassword = document.getElementById("toggle-password");
const passwordField = document.getElementById("password");

// Add event listener to toggle password visibility
togglePassword.addEventListener("click", function () {
  // Toggle the type between 'password' and 'text'
  const type = passwordField.type === "password" ? "text" : "password";
  passwordField.type = type;

  // Toggle the icon between eye and eye-slash
  this.classList.toggle("fa-eye");
  this.classList.toggle("fa-eye-slash");
});


document.addEventListener("DOMContentLoaded", function () {
  const showAlert = (type, message) => {
    Swal.fire({
      icon: type,
      title: message,
      toast: true,
      position: "top-start",
      showConfirmButton: false,
      timer: 3000,
    });
  };

  if (localStorage.getItem("adminLoginError")) {
    showAlert("error", "Invalid username or password.");
    localStorage.removeItem("adminLoginError");
  }

  if (localStorage.getItem("adminLoginSuccess")) {
    showAlert("success", "Login successful!");
    localStorage.removeItem("adminLoginSuccess");
  }

  if (localStorage.getItem("adminLogout")) {
    showAlert("info", "You have been logged out.");
    localStorage.removeItem("adminLogout");
  }
});