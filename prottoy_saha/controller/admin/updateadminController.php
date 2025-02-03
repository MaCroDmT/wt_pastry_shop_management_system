<?php
require_once('../../model/adminModel.php');

session_start();

$response = ['success' => false, 'error' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);
    $adminname = trim($_POST['name']);
    $adminphone = trim($_POST['phone']);
    $adminemail = trim($_POST['email']);
    $adminbio = trim($_POST['bio']);
    $adminreference = trim($_POST['ref']);
    $adminpassword = trim($_POST['password']);

    
    if (empty($adminname) || empty($adminphone) || empty($adminemail) || empty($adminbio) || empty($adminreference)) {
        $response['error'] = 'All fields are required.';
    } else {
        
        for ($i = 0; $i < strlen($adminname); $i++) {
            if (is_numeric($adminname[$i])) {
                $response['error'] = 'Name should not contain numbers.';
                break;
            }
        }

        
        if (empty($response['error'])) {
            $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];
            for ($i = 0; $i < strlen($adminname); $i++) {
                if (in_array($adminname[$i], $specialChars)) {
                    $response['error'] = 'Name should not contain special characters.';
                    break;
                }
            }
        }

        
        if (empty($response['error'])) {
            $adminModel = new AdminModel();
            $result = $adminModel->updateAdmin($id, $adminname, $adminphone, $adminemail, $adminpassword, $adminbio, $adminreference);

            if ($result) {
                $response['success'] = true;
            } else {
                $response['error'] = 'Failed to update admin.';
            }
        }
    }

    
    echo json_encode($response);
    exit();
}
?>
