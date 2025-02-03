<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];

  // Collect form data
  $u_name = $_POST['u_name'];
  $password = $_POST['pass'];
  $confirm_pass = $_POST['confirm_pass'];
  $email = $_POST['mail'];
  $phone_number = $_POST['pho_num'];
  $emp_id = $_POST['emp_id'];
  $emp_address = $_POST['emp_address'];
  $permanent_address = $_POST['permanent_address'];
  $department = $_POST['department'];
  $dob = $_POST['dob'];
  $position = $_POST['pos'];

  // Validate form inputs
  if (empty($u_name) || !preg_match('/^[a-zA-Z ]+$/', $u_name)) {
    $errors[] = "Invalid User Name.";
  }
  if (empty($password) || strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
  } elseif ($password !== $confirm_pass) {
    $errors[] = "Passwords do not match.";
  }
  $password_hashed = password_hash($password, PASSWORD_DEFAULT);

  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email.";
  }
  if (empty($phone_number) || !preg_match('/^\d{10,}$/', $phone_number)) {
    $errors[] = "Invalid Phone Number.";
  }
  if (empty($emp_id)) {
    $errors[] = "Employee ID is required.";
  }
  if (empty($emp_address)) {
    $errors[] = "Employee Address is required.";
  }
  if (empty($permanent_address)) {
    $errors[] = "Permanent Address is required.";
  }
  if (empty($department)) {
    $errors[] = "Department is required.";
  }
  if (empty($dob)) {
    $errors[] = "Date of Birth is required.";
  }
  if (empty($position)) {
    $errors[] = "Position is required.";
  }

  if (empty($errors)) {
    // Insert data into the database
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
    echo "Registration successful! <a href='login.php'>Login here</a>";
  } else {
    echo "Validation Errors:<br><ul>";
    foreach ($errors as $error) {
      echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><a href='registration.php'>Go Back</a>";
  }
}
?>
