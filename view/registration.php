<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/registration.css" />

    <script>
        function toggleForm() {
            const role = document.getElementById("role").value;

            document.getElementById("customer-form").style.display =
                role === "customer" ? "block" : "none";
            document.getElementById("employee-form").style.display =
                role === "employee" ? "block" : "none";
            document.getElementById("admin-form").style.display =
                role === "admin" ? "block" : "none";

            document
                .querySelectorAll(".error-message")
                .forEach((span) => (span.textContent = ""));
        }
    </script>
</head>
<body>
    <div class="welcome">
      <h1 class="wave-text">Welcome To Pastry Shop</h1>
      <h2>Register Yourself Here! </h2> 
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

        <select id="role" name="role" onchange="toggleForm()">
            <option value="">Select Your Role</option>
            <option value="customer">Customer</option>
            <option value="employee">Employee</option>
            <option value="admin">Admin</option>
        </select>

        <div id="customer-form" class="form-content" style="display: none">
            <form method="post" action="../controller/registrationController.php">
                <h2>Customer Registration</h2>
                <label>Name: <input type="text" name="c_name" id="c_name" /></label><br />
                <label>Age: <input type="number" name="c_age" id="c_age" /></label><br />
                <label>Gender:
                    <select name="c_gender" id="c_gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label><br />
                <label>Permanent Address: <input type="text" name="c_permanent_address" id="c_permanent_address" /></label><br />
                <label>Delivery Address: <input type="text" name="c_delivery_address" id="c_delivery_address" /></label><br />
                <label>Phone: <input type="text" name="c_phone" id="c_phone" /></label><br />
                <label>Email: <input type="email" name="c_email" id="c_email" /></label><br />
                <label>Password: <input type="password" name="c_password" id="c_password" /></label><br />

                <input type="hidden" name="role" value="customer" />
                <button type="submit" name="submit" id="regis">Register</button>
            </form>
        </div>

        <div id="employee-form" class="form-content" style="display: none">
            <form method="post" action="../controller/registrationController.php">
                <h2>Employee Registration</h2>
                <label>Name: <input type="text" name="e_name" id="e_name" /></label><br />
                <label>Phone: <input type="text" name="e_phone" id="e_phone" /></label><br />
                <label>Email: <input type="email" name="e_email" id="e_email" /></label><br />
                <label>Address: <input type="text" name="e_address" id="e_address" /></label><br />
                <label>Join Date: <input type="date" name="e_join_date" id="e_join_date" /></label><br />
                <label>Password: <input type="password" name="e_password" id="e_password" /></label><br />

                <input type="hidden" name="role" value="employee" />
                <button type="submit" name="submit" id="regis">Register</button>
            </form>
        </div>

        <div id="admin-form" class="form-content" style="display: none">
            <form method="post" action="../controller/registrationController.php">
                <h2>Admin Registration</h2>
                <label>Name: <input type="text" name="a_name" id="a_name" /></label><br />
                <label>Phone: <input type="text" name="a_phone" id="a_phone" /></label><br />
                <label>Email: <input type="email" name="a_email" id="a_email" /></label><br />
                <label>Password: <input type="password" name="a_password" id="a_password" /></label><br />
                <label>Bio: <textarea name="a_bio" id="a_bio"></textarea></label><br />
                <label>Reference: <input type="text" name="a_reference" id="a_reference" /></label><br />

                <input type="hidden" name="role" value="admin" />
                <button type="submit" name="submit" id="regis">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
