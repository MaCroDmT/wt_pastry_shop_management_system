document.addEventListener("DOMContentLoaded", function () {
  const roleSelect = document.getElementById("role");
  const customerForm = document.getElementById("customer-form");
  const employeeForm = document.getElementById("employee-form");
  const adminForm = document.getElementById("admin-form");

  roleSelect.addEventListener("change", toggleForm);

  function toggleForm() {
    const role = roleSelect.value;
    customerForm.style.display = role === "customer" ? "block" : "none";
    employeeForm.style.display = role === "employee" ? "block" : "none";
    adminForm.style.display = role === "admin" ? "block" : "none";

    document
      .querySelectorAll(".error-message")
      .forEach((span) => (span.textContent = ""));
  }

  document
    .getElementById("registrationForm")
    .addEventListener("submit", function (event) {
      if (!validateForm()) {
        event.preventDefault();
      }
    });

  function validateForm() {
    let isValid = true;
    const role = roleSelect.value;

    if (role === "customer") {
      if (!validateCustomerName()) isValid = false;
      if (!validateCustomerAge()) isValid = false;
      if (!validateCustomerGender()) isValid = false;
      if (!validateCustomerPermanentAddress()) isValid = false;
      if (!validateCustomerDeliveryAddress()) isValid = false;
      if (!validateCustomerPhone()) isValid = false;
      if (!validateCustomerEmail()) isValid = false;
      if (!validateCustomerPassword()) isValid = false;
    } else if (role === "employee") {
      if (!validateEmployeeName()) isValid = false;
      if (!validateEmployeePhone()) isValid = false;
      if (!validateEmployeeEmail()) isValid = false;
      if (!validateEmployeeAddress()) isValid = false;
      if (!validateEmployeeJoinDate()) isValid = false;
      if (!validateEmployeePassword()) isValid = false;
    } else if (role === "admin") {
      if (!validateAdminName()) isValid = false;
      if (!validateAdminPhone()) isValid = false;
      if (!validateAdminEmail()) isValid = false;
      if (!validateAdminPassword()) isValid = false;
      if (!validateAdminBio()) isValid = false;
      if (!validateAdminReference()) isValid = false;
    }

    return isValid;
  }

  function validateCustomerName() {
    const name = document.getElementById("c_name").value.trim();
    const nameError = document.getElementById("c_nameError");
    if (name === "") {
      nameError.textContent = "Name is required.";
      return false;
    }
    nameError.textContent = "";
    return true;
  }

  function validateCustomerAge() {
    const age = document.getElementById("c_age").value.trim();
    const ageError = document.getElementById("c_ageError");
    if (age === "") {
      ageError.textContent = "Age is required.";
      return false;
    }
    if (isNaN(age) || parseInt(age) <= 0) {
      ageError.textContent = "Please enter a valid age.";
      return false;
    }
    ageError.textContent = "";
    return true;
  }

  function validateCustomerGender() {
    const gender = document.getElementById("c_gender").value.trim();
    const genderError = document.getElementById("c_genderError");
    if (gender === "") {
      genderError.textContent = "Gender is required.";
      return false;
    }
    genderError.textContent = "";
    return true;
  }

  function validateCustomerPermanentAddress() {
    const address = document.getElementById("c_permanent_address").value.trim();
    const addressError = document.getElementById("c_permanent_addressError");
    if (address === "") {
      addressError.textContent = "Permanent Address is required.";
      return false;
    }
    addressError.textContent = "";
    return true;
  }

  function validateCustomerDeliveryAddress() {
    const address = document.getElementById("c_delivery_address").value.trim();
    const addressError = document.getElementById("c_delivery_addressError");
    if (address === "") {
      addressError.textContent = "Delivery Address is required.";
      return false;
    }
    addressError.textContent = "";
    return true;
  }

  function validateCustomerPhone() {
    const phone = document.getElementById("c_phone").value.trim();
    const phoneError = document.getElementById("c_phoneError");
    if (phone === "") {
      phoneError.textContent = "Phone number is required.";
      return false;
    }
    phoneError.textContent = "";
    return true;
  }

  function validateCustomerEmail() {
    const email = document.getElementById("c_email").value.trim();
    const emailError = document.getElementById("c_emailError");
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
  }

  function validateCustomerPassword() {
    const password = document.getElementById("c_password").value.trim();
    const passwordError = document.getElementById("c_passwordError");
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
  }

  function validateEmployeeName() {
    const name = document.getElementById("e_name").value.trim();
    const nameError = document.getElementById("e_nameError");
    if (name === "") {
      nameError.textContent = "Name is required.";
      return false;
    }
    nameError.textContent = "";
    return true;
  }

  function validateEmployeePhone() {
    const phone = document.getElementById("e_phone").value.trim();
    const phoneError = document.getElementById("e_phoneError");
    if (phone === "") {
      phoneError.textContent = "Phone number is required.";
      return false;
    }
    phoneError.textContent = "";
    return true;
  }

  function validateEmployeeEmail() {
    const email = document.getElementById("e_email").value.trim();
    const emailError = document.getElementById("e_emailError");
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
  }

  function validateEmployeeAddress() {
    const address = document.getElementById("e_address").value.trim();
    const addressError = document.getElementById("e_addressError");
    if (address === "") {
      addressError.textContent = "Address is required.";
      return false;
    }
    addressError.textContent = "";
    return true;
  }

  function validateEmployeeJoinDate() {
    const joinDate = document.getElementById("e_join_date").value.trim();
    const joinDateError = document.getElementById("e_join_dateError");
    if (joinDate === "") {
      joinDateError.textContent = "Date of Join is required.";
      return false;
    }
    joinDateError.textContent = "";
    return true;
  }

  function validateEmployeePassword() {
    const password = document.getElementById("e_password").value.trim();
    const passwordError = document.getElementById("e_passwordError");
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
  }

  function validateAdminName() {
    const name = document.getElementById("a_name").value.trim();
    const nameError = document.getElementById("a_nameError");
    if (name === "") {
      nameError.textContent = "Name is required.";
      return false;
    }
    nameError.textContent = "";
    return true;
  }

  function validateAdminPhone() {
    const phone = document.getElementById("a_phone").value.trim();
    const phoneError = document.getElementById("a_phoneError");
    if (phone === "") {
      phoneError.textContent = "Phone number is required.";
      return false;
    }
    phoneError.textContent = "";
    return true;
  }

  function validateAdminEmail() {
    const email = document.getElementById("a_email").value.trim();
    const emailError = document.getElementById("a_emailError");
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
  }

  function validateAdminPassword() {
    const password = document.getElementById("a_password").value.trim();
    const passwordError = document.getElementById("a_passwordError");
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
  }

  function validateAdminBio() {
    const bio = document.getElementById("a_bio").value.trim();
    const bioError = document.getElementById("a_bioError");
    if (bio === "") {
      bioError.textContent = "Bio is required.";
      return false;
    }
    bioError.textContent = "";
    return true;
  }

  function validateAdminReference() {
    const reference = document.getElementById("a_reference").value.trim();
    const referenceError = document.getElementById("a_referenceError");
    if (reference === "") {
      referenceError.textContent = "Reference is required.";
      return false;
    }
    referenceError.textContent = "";
    return true;
  }

  window.clearError = function (errorId) {
    document.getElementById(errorId).textContent = "";
  };
});
