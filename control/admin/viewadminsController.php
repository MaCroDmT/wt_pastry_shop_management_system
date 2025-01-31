<?php
require_once('../../model/adminModel.php');

$adminModel = new AdminModel();
$admins = $adminModel->getAllAdmins();

?>