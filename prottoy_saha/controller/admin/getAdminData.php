<?php
require_once('../../model/AdminModel.php');

if (isset($_GET['id'])) {
    $adminModel = new AdminModel();
    $admin = $adminModel->getAdminById($_GET['id']);
    
}
?>