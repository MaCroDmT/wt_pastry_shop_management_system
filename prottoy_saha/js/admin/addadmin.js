document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("addAdminForm");

  form.addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });

  function validateForm() {
    let valid = true;
    if (!validateName()) valid = false;
    if (!validateEmail()) valid = false;
    if (!validatePassword()) valid = false;
    if (!validatePhone()) valid = false;
    if (!validateReference()) valid = false;
    if (!validateBio()) valid = false;
    return valid;
  }

  window.validateName = function () {
    const name = document.getElementById("a_name").value.trim();
    const nameError = document.getElementById("nameError");
    if (name === "") {
      nameError.textContent = "Admin Name is required.";
      return false;
    }
    for (let i = 0; i < name.length; i++) {
      if (isNumeric(name[i])) {
        nameError.textContent = "Admin Name should not contain numbers.";
        return false;
      }
      if (isSpecialCharacter(name[i])) {
        nameError.textContent =
          "Admin Name should not contain special characters.";
        return false;
      }
    }
    nameError.textContent = "";
    return true;
  };

  window.validateEmail = function () {
    const email = document.getElementById("a_mail").value.trim();
    const emailError = document.getElementById("emailError");
    if (email === "") {
      emailError.textContent = "Email is required.";
      return false;
    }
    if (email.indexOf("@") === -1 || email.indexOf(".") === -1) {
      emailError.textContent = "Please enter a valid email address.";
      return false;
    }
    emailError.textContent = "";
    return true;
  };

  window.validatePassword = function () {
    const password = document.getElementById("a_pass").value.trim();
    const passwordError = document.getElementById("passwordError");
    if (password === "") {
      passwordError.textContent = "Password is required.";
      return false;
    }
    if (password.length <= 8) {
      passwordError.textContent = "Password must be more than 8 characters.";
      return false;
    }
    passwordError.textContent = "";
    return true;
  };

  window.validatePhone = function () {
    const phone = document.getElementById("a_ph_num").value.trim();
    const phoneError = document.getElementById("phoneError");
    if (phone === "") {
      phoneError.textContent = "Phone Number is required.";
      return false;
    }
    phoneError.textContent = "";
    return true;
  };

  window.validateReference = function () {
    const reference = document.getElementById("a_reference").value.trim();
    const referenceError = document.getElementById("referenceError");
    if (reference === "") {
      referenceError.textContent = "Reference is required.";
      return false;
    }
    referenceError.textContent = "";
    return true;
  };

  window.validateBio = function () {
    const bio = document.getElementById("a_bio").value.trim();
    const bioError = document.getElementById("bioError");
    if (bio === "") {
      bioError.textContent = "Bio is required.";
      return false;
    }
    bioError.textContent = "";
    return true;
  };

  window.validateConfirmPassword = function () {
    const password = document.getElementById("a_password").value.trim();
    const confirmPassword = document
      .getElementById("a_confirm_password")
      .value.trim();
    const confirmPasswordError = document.getElementById(
      "confirmPasswordError"
    );
    if (confirmPassword === "") {
      confirmPasswordError.textContent = "Confirm Password is required.";
      return false;
    }
    if (password !== confirmPassword) {
      confirmPasswordError.textContent = "Passwords do not match.";
      return false;
    }
    confirmPasswordError.textContent = "";
    return true;
  };

  window.clearError = function (errorId) {
    document.getElementById(errorId).textContent = "";
  };

  function isNumeric(char) {
    return !isNaN(char);
  }

  function isSpecialCharacter(char) {
    const specialChars = ["@", "#", "$", "%", "&", "*", "!", "(", ")"];
    return specialChars.includes(char);
  }
});
