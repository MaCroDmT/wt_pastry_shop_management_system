<?php
require_once('../../model/adminModel.php');

$adminModel = new AdminModel();
$admins = $adminModel->getAllAdmins();
echo json_encode($admins);
?>