<?php
require_once("../../model/employeeModel.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $doj = $_POST['doj'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        
        $employeeModel = new EmployeeModel();
        $result = $employeeModel->insertEmployee($name, $phone, $email, $address, $doj, $password);

        if ($result) {
            header("location: ../../view/login.php");
        } else {
            echo "Registration Failed";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>