
<?php
require("../model/db.php");

if (isset($_POST['submit'])) {
    $username = $_POST['name'] ?? '';
    $password = $_POST['pass'] ?? '';

    if (!empty($username) && !empty($password)) {
        $auth = new customer();
        $loginMessage = $auth->login($username, $password);
        
        if ($loginMessage === "success") {
            header("Location: ../view/user_panel.php"); 
            exit();
        } else {
            echo $loginMessage; 
        }
    } else {
        echo "Please fill in all fields.";
    }
}

?>
