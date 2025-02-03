<?php
require_once('../model/AdminModel.php');


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
            $result = $adminModel->insertAdmin($adminName, $adminEmail, $adminPhone, $adminPassword, $adminBio, $adminReference); 

            if ($result) {
                $_SESSION['success'] = 'Admin registered successfully.';
                header("Location: ../view/login.php");
                exit();
            } else {
                $_SESSION['error'] = 'Failed to register admin.';
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
