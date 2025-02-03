document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("updateAdminForm");

  form.addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });

  function validateForm() {
    let valid = true;
    if (!validateName()) valid = false;
    if (!validatePhone()) valid = false;
    if (!validateEmail()) valid = false;
    if (!validateBio()) valid = false;
    if (!validateReference()) valid = false;

    return valid;
  }

  window.validateName = function () {
    const name = document.getElementById("name").value.trim();
    const nameError = document.getElementById("nameError");
    if (name === "") {
      nameError.textContent = "Name is required.";
      return false;
    }
    for (let i = 0; i < name.length; i++) {
      if (isNumeric(name[i])) {
        nameError.textContent = "Name should not contain numbers.";
        return false;
      }
      if (isSpecialCharacter(name[i])) {
        nameError.textContent = "Name should not contain special characters.";
        return false;
      }
    }
    nameError.textContent = "";
    return true;
  };

  window.validatePhone = function () {
    const phone = document.getElementById("phone").value.trim();
    const phoneError = document.getElementById("phoneError");
    if (phone === "") {
      phoneError.textContent = "Phone number is required.";
      return false;
    }
    phoneError.textContent = "";
    return true;
  };

  window.validateEmail = function () {
    const email = document.getElementById("email").value.trim();
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

  window.validateBio = function () {
    const bio = document.getElementById("bio").value.trim();
    const bioError = document.getElementById("bioError");
    if (bio === "") {
      bioError.textContent = "Bio is required.";
      return false;
    }
    bioError.textContent = "";
    return true;
  };

  window.validateReference = function () {
    const reference = document.getElementById("ref").value.trim();
    const refError = document.getElementById("refError");
    if (reference === "") {
      refError.textContent = "Reference is required.";
      return false;
    }
    refError.textContent = "";
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
