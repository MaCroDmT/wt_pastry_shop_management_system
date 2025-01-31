
<?php
require("../model/db.php");

if (isset($_POST['submit'])) {
    $username = $_POST['name'] ?? '';
    $password = $_POST['pass'] ?? '';

    if (!empty($username) && !empty($password)) {
        $auth = new customer();
        $auth->login($username, $password);
        header("Location: ../../view/user_panel.php"); 
            exit();
    } else {
        echo "Please fill in all fields.";
    }

    
}
?>
