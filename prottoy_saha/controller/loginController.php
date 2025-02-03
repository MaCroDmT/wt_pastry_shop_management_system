<?php
session_start();
require_once("../model/dbconn.php");
require_once("../model/adminModel.php");

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == "admin") {
    $adminModel = new AdminModel();
    $result = $adminModel->loginAdmin($email, $password); //fetching 
    if ($result) {
        foreach ($result as $key => $value) { 
            $_SESSION[$key] = $value;
        }
        $_SESSION["role"] = $role;
        header("location: ../view/admin/Home.php");
    } else {
        echo "Login Failed";
    }
} else {
    echo "Invalid role selected.";
}
?>
