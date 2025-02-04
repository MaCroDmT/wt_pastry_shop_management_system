<?php
session_start();
$DBHostname = "localhost";
$DBusername = "root";
$DBPassword = "";
$DBname = "abid";


$db = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['u_name'];
    $password = $_POST['pass'];

    if ($stmt = $db->prepare("SELECT * FROM `employee_registration` WHERE user_name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

         
            if (password_verify($password, $user['password'])) {

                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_id'] = $user['emp_id'];
                echo "Login successful!";
            
                header("Location: dashboard.php"); 
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }


        $stmt->close();
    } else {
        echo "MySQL prepare error: " . $db->error;
    }
}


$db->close();
?>
