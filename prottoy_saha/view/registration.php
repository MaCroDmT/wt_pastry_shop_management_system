<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/registration.css" />
    <script src="../js/registration.js" defer></script>
</head>
<body>
    <div class="welcome">
        <h1 class="wave-text">Welcome To Pastry Shop</h1>
        <h2>Register Yourself Here!</h2> 
        <h3>Already Have an Account? <a href="login.php" style="text-decoration: none; color: Orange;">Login</a></h3>    
    </div>
    <div class="background-slideshow"></div>

    <div class="form-container">
        <?php if (isset($_SESSION['error'])): ?>
        <p class="error-text"><?= $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
        <p class="success-text"><?= $_SESSION['success']; ?></p>
        <?php unset($_SESSION['success']); endif; ?>

        <div id="admin-form" class="form-content">
            <form method="post" action="../controller/registrationController.php" onsubmit="return validateForm()">
                <h2>Admin Registration</h2>
                <label>Name: <input type="text" name="a_name" id="a_name" onfocus="clearError('a_nameError')" onblur="validateName()" /></label>
                <span id="a_nameError" class="error-text"></span><br />

                <label>Phone: <input type="text" name="a_phone" id="a_phone" onfocus="clearError('a_phoneError')" onblur="validatePhone()" /></label>
                <span id="a_phoneError" class="error-text"></span><br />

                <label>Email: <input type="email" name="a_email" id="a_email" onfocus="clearError('a_emailError')" onblur="validateEmail()" /></label>
                <span id="a_emailError" class="error-text"></span><br />

                <label>Password: <input type="password" name="a_password" id="a_password" onfocus="clearError('a_passwordError')" onblur="validatePassword()" /></label>
                <span id="a_passwordError" class="error-text"></span><br />

                <label>Bio: <textarea name="a_bio" id="a_bio" onfocus="clearError('a_bioError')" onblur="validateBio()"></textarea></label>
                <span id="a_bioError" class="error-text"></span><br />

                <label>Reference: <input type="text" name="a_reference" id="a_reference" onfocus="clearError('a_referenceError')" onblur="validateReference()" /></label>
                <span id="a_referenceError" class="error-text"></span><br />

                <input type="hidden" name="role" value="admin" />
                <button type="submit" name="submit" id="regis">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
