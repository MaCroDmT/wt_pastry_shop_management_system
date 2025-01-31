function validateForm() {
    let errors = [];

    let name = document.querySelector('[name="c_name"]');
    let email = document.querySelector('[name="c_mail"]');
    let password = document.querySelector('[name="c_pass"]');
    let confirmPassword = document.querySelector('[name="c_c_pass"]');
    let phoneNumber = document.querySelector('[name="c_ph_num"]');
    let contactMethod = document.querySelector('[name="c_contact_method"]');
    let gender = document.querySelector('[name="c_gender"]');
    let dob = document.querySelector('[name="c_date"]');
    let deliveryAddress = document.querySelector('[name="c_Delivery_address"]');
    let permanentAddress = document.querySelector('[name="c_Parmanent_address"]');

    document.querySelectorAll('.error').forEach(error => error.style.display = 'none');

    if (name.value === "") {
        displayError(name, "Username is required.");
    } else if (!/[A-Z]/.test(name.value)) {
        displayError(name, "Username must contain at least one uppercase letter.");
    } else if (!/^[A-Za-z]+$/.test(name.value)) {
        displayError(name, "Username must contain only alphabets.");
    }

    if (password.value === "") {
        displayError(password, "Password is required.");
    } else if (!/\d/.test(password.value)) {
        displayError(password, "Password must contain at least one numeric character.");
    }

    if (password.value !== confirmPassword.value) {
        displayError(confirmPassword, "Passwords do not match.");
    }

    if (email.value === "") {
        displayError(email, "Email is required.");
    } else if (!/@/.test(email.value)) {
        displayError(email, "Email must have '@'.");
    } else if (!email.value.endsWith('.com')) {
        displayError(email, "Email must end with .com domain.");
    }

    if (phoneNumber.value === "") {
        displayError(phoneNumber, "Phone number is required.");
    } else if (phoneNumber.value.length !== 11 || !/^\d+$/.test(phoneNumber.value)) {
        displayError(phoneNumber, "Phone number must be exactly 11 digits and contain only numbers.");
    }

    if (contactMethod.value === 'none') {
        displayError(contactMethod, "Please select a preferred contact method.");
    }

    if (gender.value === 'none') {
        displayError(gender, "Please select your gender.");
    }

    if (dob.value === "") {
        displayError(dob, "Date of birth is required.");
    }

    if (deliveryAddress.value === "") {
        displayError(deliveryAddress, "Delivery address is required.");
    }

    if (permanentAddress.value === "") {
        displayError(permanentAddress, "Permanent address is required.");
    }

    if (document.querySelectorAll('.error').length > 0) {
        return false;
    }




    
    return true;
}

function displayError(inputElement, errorMessage) {
    let errorElement = inputElement.nextElementSibling;

    if (!errorElement || !errorElement.classList.contains('error')) {
        errorElement = document.createElement('div');
        errorElement.classList.add('error');
        inputElement.insertAdjacentElement('afterend', errorElement);
    }

    errorElement.textContent = errorMessage;
    errorElement.style.display = 'block';
}
