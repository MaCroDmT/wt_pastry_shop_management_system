function validateForm() {
    let errors = false;

    
    document.querySelectorAll('.error').forEach(function(span) {
        span.textContent = ""; 
        span.style.display = 'none'; 
    });

    
    let username = document.querySelector('input[name="c_name"]').value;
    if (username === "") {
        let errorSpan = document.getElementById("usernameError");
        errorSpan.textContent = "Username is required.";
        errorSpan.style.display = 'inline'; 
        errors = true;
    } else if (!/[A-Z]/.test(username)) {
        let errorSpan = document.getElementById("usernameError");
        errorSpan.textContent = "Username must contain at least one uppercase letter.";
        errorSpan.style.display = 'inline';
        errors = true;
    } else if (!/^[A-Za-z]+$/.test(username)) {
        let errorSpan = document.getElementById("usernameError");
        errorSpan.textContent = "Username must contain only alphabets.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

   
    let password = document.querySelector('input[name="c_pass"]').value;
    if (password === "") {
        let errorSpan = document.getElementById("passwordError");
        errorSpan.textContent = "Password is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    } else if (!/\d/.test(password)) {
        let errorSpan = document.getElementById("passwordError");
        errorSpan.textContent = "Password must contain at least one numeric character.";
        errorSpan.style.display = 'inline';
        errors = true;
    }


    let confirmPassword = document.querySelector('input[name="c_c_pass"]').value;
    if (password !== confirmPassword) {
        let errorSpan = document.getElementById("confirmPasswordError");
        errorSpan.textContent = "Passwords do not match.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

   
    let email = document.querySelector('input[name="c_mail"]').value;
    if (email === "") {
        let errorSpan = document.getElementById("emailError");
        errorSpan.textContent = "Email is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    } else if (!email.includes("@")) {
        let errorSpan = document.getElementById("emailError");
        errorSpan.textContent = "Email must have '@'.";
        errorSpan.style.display = 'inline';
        errors = true;
    } else if (!email.endsWith(".com")) {
        let errorSpan = document.getElementById("emailError");
        errorSpan.textContent = "Email must end with .com domain.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

    
    let phoneNumber = document.querySelector('input[name="c_ph_num"]').value;
    if (phoneNumber === "") {
        let errorSpan = document.getElementById("phoneError");
        errorSpan.textContent = "Phone number is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    } else if (!/^\d{11}$/.test(phoneNumber)) {
        let errorSpan = document.getElementById("phoneError");
        errorSpan.textContent = "Phone number must be exactly 11 digits.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

   
    let contactMethod = document.querySelector('select[name="c_contact_method"]').value;
    if (contactMethod === "none") {
        let errorSpan = document.getElementById("contactMethodError");
        errorSpan.textContent = "Please select a preferred contact method.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

   
    let gender = document.querySelector('select[name="c_gender"]').value;
    if (gender === "none") {
        let errorSpan = document.getElementById("genderError");
        errorSpan.textContent = "Please select your gender.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

    
    let dob = document.querySelector('input[name="c_date"]').value;
    if (dob === "") {
        let errorSpan = document.getElementById("dobError");
        errorSpan.textContent = "Date of birth is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

   
    let deliveryAddress = document.querySelector('textarea[name="c_Delivery_address"]').value;
    if (deliveryAddress === "") {
        let errorSpan = document.getElementById("deliveryAddressError");
        errorSpan.textContent = "Delivery address is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    }


    let permanentAddress = document.querySelector('textarea[name="c_Parmanent_address"]').value;
    if (permanentAddress === "") {
        let errorSpan = document.getElementById("permanentAddressError");
        errorSpan.textContent = "Permanent address is required.";
        errorSpan.style.display = 'inline';
        errors = true;
    }

    if (errors) {
        return false; 
    }

    return true; 
}
