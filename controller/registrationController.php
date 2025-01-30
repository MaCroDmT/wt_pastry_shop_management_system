<?php
require_once('../model/AdminModel.php');
require_once('../model/CustomerModel.php');
require_once('../model/EmployeeModel.php');

session_start();

if (isset($_POST['submit'])) {
    $formType = $_POST['role']; 

    $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];

    switch ($formType) {
        case 'admin':
            $adminName = trim($_POST['a_name']);
            $adminPhone = trim($_POST['a_phone']);
            $adminEmail = trim($_POST['a_email']);
            $adminPassword = trim($_POST['a_password']);
            $adminBio = trim($_POST['a_bio']);
            $adminReference = trim($_POST['a_reference']);

          
            if (empty($adminName) || empty($adminPhone) || empty($adminEmail) || empty($adminPassword) || empty($adminBio) || empty($adminReference)) {
                $_SESSION['error'] = 'All fields are required.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            
            for ($i = 0; $i < strlen($adminName); $i++) {
                if (in_array($adminName[$i], $specialChars)) {
                    $_SESSION['error'] = 'Name should not contain special characters.';
                    header("Location: ../view/registration.php");
                    exit();
                }
            }

          
            if (strlen($adminPassword) <= 8) {
                $_SESSION['error'] = 'Password must be more than 8 characters.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            $adminModel = new AdminModel();
            $result = $adminModel->insertAdmin($adminName, $adminPhone, $adminEmail, $adminPassword, $adminBio, $adminReference);

            if ($result) {
                $_SESSION['success'] = 'Admin registered successfully.';
                header("Location: ../view/login.php");
                exit();
            } else {
                $_SESSION['error'] = 'Failed to register admin.';
                header("Location: ../view/registration.php");
                exit();
            }

        case 'employee':
            $employeeName = trim($_POST['e_name']);
            $employeePhone = trim($_POST['e_phone']);
            $employeeEmail = trim($_POST['e_email']);
            $employeeAddress = trim($_POST['e_address']);
            $employeeJoinDate = trim($_POST['e_join_date']);
            $employeePassword = trim($_POST['e_password']);

            
            if (empty($employeeName) || empty($employeePhone) || empty($employeeEmail) || empty($employeeAddress) || empty($employeeJoinDate) || empty($employeePassword)) {
                $_SESSION['error'] = 'All fields are required.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            for ($i = 0; $i < strlen($employeeName); $i++) {
                if (in_array($employeeName[$i], $specialChars)) {
                    $_SESSION['error'] = 'Name should not contain special characters.';
                    header("Location: ../view/registration.php");
                    exit();
                }
            }

            
            if (strlen($employeePassword) <= 8) {
                $_SESSION['error'] = 'Password must be more than 8 characters.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            $employeeModel = new EmployeeModel();
            $result = $employeeModel->insertEmployee($employeeName, $employeePhone, $employeeEmail, $employeeAddress, $employeeJoinDate, $employeePassword);

            if ($result) {
                $_SESSION['success'] = 'Employee registered successfully.';
                header("Location: ../view/login.php");
                
                exit();
            } else {
                $_SESSION['error'] = 'Failed to register employee.';
                header("Location: ../view/registration.php");
                exit();
            }

        case 'customer':
            $customerName = trim($_POST['c_name']);
            $customerAge = trim($_POST['c_age']);
            $customerGender = trim($_POST['c_gender']);
            $customerPermanentAddress = trim($_POST['c_permanent_address']);
            $customerDeliveryAddress = trim($_POST['c_delivery_address']);
            $customerPhone = trim($_POST['c_phone']);
            $customerEmail = trim($_POST['c_email']);
            $customerPassword = trim($_POST['c_password']);

            
            if (empty($customerName) || empty($customerAge) || empty($customerGender) || empty($customerPermanentAddress) || empty($customerDeliveryAddress) || empty($customerPhone) || empty($customerEmail) || empty($customerPassword)) {
                $_SESSION['error'] = 'All fields are required.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            for ($i = 0; $i < strlen($customerName); $i++) {
                if (in_array($customerName[$i], $specialChars)) {
                    $_SESSION['error'] = 'Name should not contain special characters.';
                    header("Location: ../view/registration.php");
                    exit();
                }
            }

            
            if (strlen($customerPassword) <= 8) {
                $_SESSION['error'] = 'Password must be more than 8 characters.';
                header("Location: ../view/registration.php");
                exit();
            }

            
            $customerModel = new CustomerModel();
            $result = $customerModel->insertCustomer($customerName, $customerAge, $customerGender, $customerPermanentAddress, $customerDeliveryAddress, $customerPhone, $customerEmail, $customerPassword);

            if ($result) {
                $_SESSION['success'] = 'Customer registered successfully.';
                header("Location: ../view/login.php");
                exit();
            } else {
                $_SESSION['error'] = 'Failed to register customer.';
                header("Location: ../view/registration.php");
                exit();
            }

        default:
            $_SESSION['error'] = 'Invalid form type.';
            header("Location: ../view/registration.php");
            exit();
    }
} else {
    header("Location: ../view/registration.php");
    exit();
}
?>
