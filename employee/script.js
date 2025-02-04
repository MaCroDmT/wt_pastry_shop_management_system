document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const inputs = form.querySelectorAll("input");
  
  // প্রতিটি ইনপুট ফিল্ডে ক্লিক করলেই ভ্যালিডেশন চালু হবে
  inputs.forEach((input) => {
    input.addEventListener("click", function () {
      validateField(input);
    });
    input.addEventListener("input", function () {
      validateField(input);
    });
  });

  form.addEventListener("submit", function (event) {
    let isValid = true;
    inputs.forEach((input) => {
      if (!validateField(input)) {
        isValid = false;
      }
    });
    if (!isValid) {
      event.preventDefault();
    }
  });

  function validateField(input) {
    const errorElement = document.getElementById(input.name + "Error");
    let errorMessage = "";

    if (input.name === "u_name") {
      if (!input.value.trim()) {
        errorMessage = "User Name is required.";
      } else if (!/^[a-zA-Z ]+$/.test(input.value.trim())) {
        errorMessage = "Invalid User Name.";
      }
    } else if (input.name === "pass") {
      if (input.value.length < 6 || !/[#@$&]/.test(input.value)) {
        errorMessage = "Password must be at least 6 characters and contain @, #, $, &.";
      }
    } else if (input.name === "confirm_pass") {
      const password = document.querySelector("input[name='pass']").value;
      if (input.value !== password) {
        errorMessage = "Passwords do not match.";
      }
    } else if (input.name === "mail") {
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
        errorMessage = "Invalid email format.";
      }
    } else if (input.name === "pho_num") {
      if (!/^\d{10,}$/.test(input.value.replace(/[- ]/g, ""))) {
        errorMessage = "Phone number must contain at least 10 digits.";
      }
    } else if (input.name === "dob") {
      const dob = new Date(input.value);
      if (!input.value || dob > new Date()) {
        errorMessage = "Invalid Date of Birth.";
      }
    } else if (["emp_id", "emp_address", "permanent_address", "department", "pos"].includes(input.name)) {
      if (!input.value.trim()) {
        errorMessage = `${input.name.replace("_", " ")} is required.`;
      }
    }

    if (errorElement) {
      errorElement.textContent = errorMessage;
    }
    return errorMessage === "";
  }
});
