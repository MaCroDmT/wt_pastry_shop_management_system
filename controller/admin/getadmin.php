<?php
require_once('../../model/adminModel.php');

$admin = null;
if (isset($_GET['id'])) {

    $adminId = $_GET['id'];
    
    $adminModel = new AdminModel();
    $admin = $adminModel->getAdminById($adminId);
}
?>