function validateForm() {
    let errors = [];

    let name = document.querySelector('[name="name"]');
    let password = document.querySelector('[name="pass"]');


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
