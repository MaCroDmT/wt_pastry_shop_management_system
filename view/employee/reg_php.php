<?php
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Collect form data
    $u_name = $_POST['u_name'];
    if (empty($u_name) || !preg_match('/^[a-zA-Z ]+$/', $u_name)) {
        $errors[] = "Invalid User Name.";
    }

    $password = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];
    if (empty($password) || !preg_match('/[@#$&]/', $password) || strlen($password) < 6) {
        $errors[] = "Invalid Password. Must contain at least one special character (@, #, $, &) and be at least 6 characters long.";
    } elseif ($password !== $confirm_pass) {
        $errors[] = "Passwords do not match.";
    } else {
        // Hash the password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    }

    // Validate email
    $email = $_POST['mail'];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email.";
    }

    // Validate phone number
    $phone_number = $_POST['pho_num'];
    if (empty($phone_number) || !preg_match('/^\d{10,}$/', str_replace(['-', ' '], '', $phone_number))) {
        $errors[] = "Invalid Phone Number. Must contain at least 10 digits.";
    }

    // Validate other fields
    $emp_id = $_POST['emp_id'];
    if (empty($emp_id)) {
        $errors[] = "Employee ID is required.";
    }

    $emp_address = $_POST['emp_address'];
    if (empty($emp_address)) {
        $errors[] = "Employee Address is required.";
    }

    $permanent_address = $_POST['permanent_address'];
    if (empty($permanent_address)) {
        $errors[] = "Permanent Address is required.";
    }

    $department = $_POST['department'];
    if (empty($department)) {
        $errors[] = "Department is required.";
    }

    $dob = $_POST['dob'];
    if (empty($dob) || !strtotime($dob) || strtotime($dob) > time()) {
        $errors[] = "Invalid Date of Birth.";
    }

    $position = $_POST['pos'];
    if (empty($position)) {
        $errors[] = "Position is required.";
    }

    
    if (empty($errors)) {
        $customer = new Customer();
        $customer->insertData(
            "employee_registration",
            $u_name,
            $email,
            $password_hashed,
            $phone_number,
            $dob,
            $emp_address,
            $permanent_address
        );

        echo "<h3>Registration successful!</h3>";
        echo '<a href="employee_registration.html">Register Another Employee</a>';
    } else {
        echo "<h3>Validation Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul><a href='employee_registration.html'>Go Back</a>";
    }
}
?>
