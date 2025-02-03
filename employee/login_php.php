<?php
session_start();
$DBHostname = "localhost";
$DBusername = "root";
$DBPassword = "";
$DBname = "abid";

// Create a connection to the database
$db = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

// Check if the connection is successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['u_name'];
    $password = $_POST['pass'];

    // Prepare and bind the query
    if ($stmt = $db->prepare("SELECT * FROM `employee_registration` WHERE user_name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Login successful, redirect to dashboard or home page
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_id'] = $user['emp_id'];
                echo "Login successful!";
                // Redirect or show success message here
                header("Location: dashboard.php"); // Or any page you want
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "MySQL prepare error: " . $db->error;
    }
}

// Close the database connection
$db->close();
?>
