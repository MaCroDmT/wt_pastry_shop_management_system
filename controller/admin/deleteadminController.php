<?php
require_once('../../model/adminModel.php');

if (isset($_GET['id'])) {
    
    $adminId = $_GET['id'];

    $adminModel = new AdminModel();
    $result = $adminModel->deleteAdmin($adminId);

    if ($result) {
        header("Location: ../../view/admin/deleteadmin.php");
    } else {
        echo "Failed to delete admin.";
    }
}
?>