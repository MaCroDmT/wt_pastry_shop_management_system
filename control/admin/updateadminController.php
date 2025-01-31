<?php
require_once('../../model/adminModel.php');

session_start();

if (isset($_POST['submit'])) {
    $id = trim($_POST['id']);
    $adminname = trim($_POST['name']);
    $adminphone = trim($_POST['phone']);
    $adminemail = trim($_POST['email']);
    $adminbio = trim($_POST['bio']);
    $adminreference = trim($_POST['ref']);
    $adminpassword = trim($_POST['password']);

    
    if (empty($adminname) || empty($adminphone) || empty($adminemail) || empty($adminbio) || empty($adminreference)) {
        $_SESSION['error'] = 'All fields are required.';
        header("Location: ../../view/admin/updateadmin.php?id=$id&name=$adminname&phone=$adminphone&email=$adminemail&bio=$adminbio&ref=$adminreference");
        exit();
    }

    
    for ($i = 0; $i < strlen($adminname); $i++) {
        if (is_numeric($adminname[$i])) {
            $_SESSION['error'] = 'Name should not contain numbers.';
            header("Location: ../../view/admin/updateadmin.php?id=$id&name=$adminname&phone=$adminphone&email=$adminemail&bio=$adminbio&ref=$adminreference");
            exit();
        }
    }

    
    $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];
    for ($i = 0; $i < strlen($adminname); $i++) {
        if (in_array($adminname[$i], $specialChars)) {
            $_SESSION['error'] = 'Name should not contain special characters.';
            header("Location: ../../view/admin/updateadmin.php?id=$id&name=$adminname&phone=$adminphone&email=$adminemail&bio=$adminbio&ref=$adminreference");
            exit();
        }
    }

    
    $adminModel = new AdminModel();
    $result = $adminModel->updateAdmin($id, $adminname, $adminphone, $adminemail, $adminpassword, $adminbio, $adminreference);

    if ($result) {
        $_SESSION['success'] = 'Admin updated successfully.';
        header("Location: ../../view/admin/updateadmin.php");
        exit();
    } else {
        $_SESSION['error'] = 'Failed to update admin.';
        header("Location: ../../view/admin/updateadmin.php?id=$id&name=$adminname&phone=$adminphone&email=$adminemail&bio=$adminbio&ref=$adminreference");
        exit();
    }
} else {
    header("Location: ../../view/admin/updateadmin.php");
    exit();
}
?>