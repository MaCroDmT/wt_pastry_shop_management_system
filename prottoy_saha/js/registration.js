document.addEventListener("DOMContentLoaded", function () {
  function validateName() {
    let name = document.getElementById("a_name").value.trim();
    let nameError = document.getElementById("a_nameError");

    if (name === "") {
      nameError.textContent = "Name is required.";
      return false;
    }

    for (let i = 0; i < name.length; i++) {
      if (
        !(
          (name[i] >= "A" && name[i] <= "Z") ||
          (name[i] >= "a" && name[i] <= "z") ||
          name[i] === " "
        )
      ) {
        nameError.textContent = "Name can only contain letters and spaces.";
        return false;
      }
    }

    nameError.textContent = "";
    return true;
  }

  function validatePhone() {
    let phone = document.getElementById("a_phone").value.trim();
    let phoneError = document.getElementById("a_phoneError");

    if (phone === "") {
      phoneError.textContent = "Phone number is required.";
      return false;
    }

    if (phone.length !== 11) {
      phoneError.textContent = "Phone number must be exactly 11 digits.";
      return false;
    }

    for (let i = 0; i < phone.length; i++) {
      if (!(phone[i] >= "0" && phone[i] <= "9")) {
        phoneError.textContent = "Phone number must contain only numbers.";
        return false;
      }
    }

    phoneError.textContent = "";
    return true;
  }

  function validateEmail() {
    let email = document.getElementById("a_email").value.trim();
    let emailError = document.getElementById("a_emailError");

    if (email === "") {
      emailError.textContent = "Email is required.";
      return false;
    }

    if (
      email.indexOf("@") === -1 ||
      email.indexOf(".") === -1 ||
      email.indexOf("@") > email.lastIndexOf(".")
    ) {
      emailError.textContent = "Invalid email format.";
      return false;
    }

    emailError.textContent = "";
    return true;
  }

  function validatePassword() {
    let password = document.getElementById("a_password").value.trim();
    let passwordError = document.getElementById("a_passwordError");

    if (password === "") {
      passwordError.textContent = "Password is required.";
      return false;
    }

    if (password.length < 8) {
      passwordError.textContent = "Password must be at least 8 characters.";
      return false;
    }

    passwordError.textContent = "";
    return true;
  }

  function validateBio() {
    let bio = document.getElementById("a_bio").value.trim();
    let bioError = document.getElementById("a_bioError");

    if (bio === "") {
      bioError.textContent = "Bio cannot be empty.";
      return false;
    }

    bioError.textContent = "";
    return true;
  }

  function validateReference() {
    let reference = document.getElementById("a_reference").value.trim();
    let referenceError = document.getElementById("a_referenceError");

    if (reference === "") {
      referenceError.textContent = "Reference cannot be empty.";
      return false;
    }

    referenceError.textContent = "";
    return true;
  }

  function validateForm() {
    let isValid = true;
    if (!validateName()) isValid = false;
    if (!validatePhone()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePassword()) isValid = false;
    if (!validateBio()) isValid = false;
    if (!validateReference()) isValid = false;

    return isValid;
  }

  function clearError(errorId) {
    document.getElementById(errorId).textContent = "";
  }

  document.getElementById("a_name").onblur = validateName;
  document.getElementById("a_phone").onblur = validatePhone;
  document.getElementById("a_email").onblur = validateEmail;
  document.getElementById("a_password").onblur = validatePassword;
  document.getElementById("a_bio").onblur = validateBio;
  document.getElementById("a_reference").onblur = validateReference;
});
