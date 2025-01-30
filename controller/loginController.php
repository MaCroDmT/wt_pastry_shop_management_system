<?php
session_start();
require_once("../model/dbconn.php");
require_once("../model/customerModel.php");
require_once("../model/employeeModel.php");
require_once("../model/adminModel.php");

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == "customer") {
    $customerModel = new CustomerModel();
    $result = $customerModel->loginCustomer($email, $password);
    if ($result) {
        foreach ($result as $key => $value) {
            $_SESSION[$key] = $value;
        }
        $_SESSION["role"] = $role;
        header("location: ../view/customer/Home.php");
    } else {
        echo "Login Failed";
    }
} elseif ($role == "employee") {
    $employeeModel = new EmployeeModel();
    $result = $employeeModel->loginEmployee($email, $password);
    if ($result) {
        foreach ($result as $key => $value) {
            $_SESSION[$key] = $value;
        }
        $_SESSION["role"] = $role;
        header("location: ../view/employee/Home.php");
    } else {
        echo "Login Failed";
    }
} elseif ($role == "admin") {
    $adminModel = new AdminModel();
    $result = $adminModel->loginAdmin($email, $password);
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