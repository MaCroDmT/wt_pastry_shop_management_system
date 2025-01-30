<?php
require_once('../../model/adminModel.php');

session_start();

if (isset($_POST['submit'])) {
    $adminname = trim($_POST['a_name']);
    $adminphone = trim($_POST['a_ph_num']);
    $adminemail = trim($_POST['a_mail']);
    $adminpassword = trim($_POST['a_pass']);
    $adminbio = trim($_POST['a_bio']);
    $adminreference = trim($_POST['a_reference']);


    if (empty($adminname) || empty($adminphone) || empty($adminemail) || empty($adminpassword) || empty($adminbio) || empty($adminreference)) {
        $_SESSION['error'] = 'All fields are required.';
        header("Location: ../../view/admin/addadmin.php");
        exit();
    }

    
    for ($i = 0; $i < strlen($adminname); $i++) {
        if (is_numeric($adminname[$i])) {
            $_SESSION['error'] = 'Admin Name should not contain numbers.';
            header("Location: ../../view/admin/addadmin.php");
            exit();
        }
    }

   
    $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];
    for ($i = 0; $i < strlen($adminname); $i++) {
        if (in_array($adminname[$i], $specialChars)) {
            $_SESSION['error'] = 'Admin Name should not contain special characters.';
            header("Location: ../../view/admin/addadmin.php");
            exit();
        }
    }

  
    if (strlen($adminpassword) <= 8) {
        $_SESSION['error'] = 'Password must be more than 8 characters.';
        header("Location: ../../view/admin/addadmin.php");
        exit();
    }

    
    $adminModel = new AdminModel();
    $result = $adminModel->insertAdmin($adminname, $adminemail, $adminphone, $adminpassword, $adminbio, $adminreference);

    if ($result) {
        $_SESSION['success'] = 'Admin added successfully.';
        header("Location: ../../view/admin/viewadmin.php");
        exit();
    } else {
        $_SESSION['error'] = 'Failed to add admin.';
        header("Location: ../../view/admin/addadmin.php");
        exit();
    }
} else {
    header("Location: ../../view/admin/addadmin.php");
    exit();
}
?>
