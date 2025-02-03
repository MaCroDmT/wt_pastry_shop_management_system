document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    const username = document.querySelector("[name='u_name']");
    const password = document.querySelector("[name='pass']");
    const confirmPassword = document.querySelector("[name='confirm_pass']");
    const email = document.querySelector("[name='mail']");
    const phone = document.querySelector("[name='pho_num']");
    const empId = document.querySelector("[name='emp_id']");
    const empAddress = document.querySelector("[name='emp_address']");
    const permanentAddress = document.querySelector("[name='permanent_address']");
    const department = document.querySelector("[name='department']");
    const dob = document.querySelector("[name='dob']");
    const position = document.querySelector("[name='pos']");
    
    // Error message function
    function showError(input, message) {
        let errorElement = input.nextElementSibling;
        if (!errorElement || !errorElement.classList.contains("error")) {
            errorElement = document.createElement("span");
            errorElement.classList.add("error");
            errorElement.style.color = "red";
            errorElement.style.fontSize = "0.9em";
            input.parentNode.appendChild(errorElement);
        }
        errorElement.innerText = message;
    }

    function clearError(input) {
        let errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains("error")) {
            errorElement.remove();
        }
    }

    // Validation Functions
    function validateUsername() {
        if (username.value.trim() === "" || !/^[a-zA-Z ]+$/.test(username.value)) {
            showError(username, "Invalid username. Only letters and spaces allowed.");
            return false;
        }
        clearError(username);
        return true;
    }

    function validatePassword() {
        if (password.value.length < 6 || !/[@#$&]/.test(password.value)) {
            showError(password, "Password must be 6+ characters and contain @, #, $, &.");
            return false;
        }
        clearError(password);
        return true;
    }

    function validateConfirmPassword() {
        if (password.value !== confirmPassword.value) {
            showError(confirmPassword, "Passwords do not match.");
            return false;
        }
        clearError(confirmPassword);
        return true;
    }

    function validateEmail() {
        if (!email.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
            showError(email, "Invalid email address.");
            return false;
        }
        clearError(email);
        return true;
    }

    function validatePhone() {
        if (!phone.value.match(/^\d{10,}$/)) {
            showError(phone, "Invalid phone number. Must be 10+ digits.");
            return false;
        }
        clearError(phone);
        return true;
    }

    function validateRequiredField(field, message) {
        if (field.value.trim() === "") {
            showError(field, message);
            return false;
        }
        clearError(field);
        return true;
    }

    function validateDOB() {
        const inputDate = new Date(dob.value);
        const today = new Date();
        if (!dob.value || inputDate >= today) {
            showError(dob, "Invalid Date of Birth.");
            return false;
        }
        clearError(dob);
        return true;
    }

    // Real-time validation
    username.addEventListener("input", validateUsername);
    password.addEventListener("input", validatePassword);
    confirmPassword.addEventListener("input", validateConfirmPassword);
    email.addEventListener("input", validateEmail);
    phone.addEventListener("input", validatePhone);
    dob.addEventListener("input", validateDOB);
    empId.addEventListener("input", () => validateRequiredField(empId, "Employee ID is required."));
    empAddress.addEventListener("input", () => validateRequiredField(empAddress, "Employee Address is required."));
    permanentAddress.addEventListener("input", () => validateRequiredField(permanentAddress, "Permanent Address is required."));
    department.addEventListener("input", () => validateRequiredField(department, "Department is required."));
    position.addEventListener("input", () => validateRequiredField(position, "Position is required."));

    // Form Submission with AJAX
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        if (
            validateUsername() &&
            validatePassword() &&
            validateConfirmPassword() &&
            validateEmail() &&
            validatePhone() &&
            validateDOB() &&
            validateRequiredField(empId, "Employee ID is required.") &&
            validateRequiredField(empAddress, "Employee Address is required.") &&
            validateRequiredField(permanentAddress, "Permanent Address is required.") &&
            validateRequiredField(department, "Department is required.") &&
            validateRequiredField(position, "Position is required.")
        ) {
            // AJAX Request
            const formData = new FormData(form);
            fetch("reg_php.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                document.body.innerHTML += `<div style="background:#28a745;color:white;padding:10px;border-radius:5px;margin-top:10px;">${data}</div>`;
            })
            .catch(error => {
                console.error("Error:", error);
            });
        } else {
            console.log("Form validation failed");
        }
    });
});
