document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("updateProductForm");

  form.addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });

  function validateForm() {
    let valid = true;
    if (!validateName()) valid = false;
    if (!validateCategory()) valid = false;
    if (!validatePrice()) valid = false;
    if (!validateProductionDate()) valid = false;
    if (!validateExpireDate()) valid = false;
    return valid;
  }

  window.validateName = function () {
    const name = document.getElementById("name").value.trim();
    const nameError = document.getElementById("nameError");
    if (name === "") {
      nameError.textContent = "Product Name is required.";
      return false;
    }
    for (let i = 0; i < name.length; i++) {
      if (isSpecialCharacter(name[i])) {
        nameError.textContent =
          "Product Name should not contain special characters.";
        return false;
      }
    }
    nameError.textContent = "";
    return true;
  };

  window.validateCategory = function () {
    const category = document.getElementById("category").value.trim();
    const categoryError = document.getElementById("categoryError");
    if (category === "") {
      categoryError.textContent = "Category is required.";
      return false;
    }
    for (let i = 0; i < category.length; i++) {
      if (isSpecialCharacter(category[i])) {
        categoryError.textContent =
          "Category should not contain special characters.";
        return false;
      }
    }
    categoryError.textContent = "";
    return true;
  };

  window.validatePrice = function () {
    const price = document.getElementById("price").value.trim();
    const priceError = document.getElementById("priceError");
    if (price === "") {
      priceError.textContent = "Price is required.";
      return false;
    }
    if (isNaN(price) || parseFloat(price) <= 0) {
      priceError.textContent = "Please enter a valid price.";
      return false;
    }
    priceError.textContent = "";
    return true;
  };

  window.validateProductionDate = function () {
    const productionDate = document.getElementById("production").value.trim();
    const productionError = document.getElementById("productionError");
    const expireDate = document.getElementById("expire").value.trim();
    if (productionDate === "") {
      productionError.textContent = "Production Date is required.";
      return false;
    }
    if (productionDate === expireDate) {
      productionError.textContent =
        "Production Date and Expire Date cannot be the same.";
      return false;
    }
    productionError.textContent = "";
    return true;
  };

  window.validateExpireDate = function () {
    const expireDate = document.getElementById("expire").value.trim();
    const expireError = document.getElementById("expireError");
    const productionDate = document.getElementById("production").value.trim();
    if (expireDate === "") {
      expireError.textContent = "Expire Date is required.";
      return false;
    }
    if (new Date(expireDate) <= new Date(productionDate)) {
      expireError.textContent = "Expire Date must be after Production Date.";
      return false;
    }
    expireError.textContent = "";
    return true;
  };

  window.clearError = function (errorId) {
    document.getElementById(errorId).textContent = "";
  };

  function isSpecialCharacter(char) {
    const specialChars = ["@", "#", "$", "%", "&", "*", "!", "(", ")"];
    return specialChars.includes(char);
  }
});
