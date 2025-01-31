<?php
    require_once("../../model/customerModel.php");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $paddress = $_POST['address'];
        $daddress = $_POST['DAddress'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        

        if($password == $cpassword){

            $customerModel = new CustomerModel();
            $result = $customerModel->insertCustomer($name, $age, $gender, $paddress, $daddress, $phone, $email, $password);

            if($result){
                header("location: ../../view/login.php");
            }
            else{
                echo "Failed to register customer.";
            }
        } else {
            echo "Passwords do not match.";
        }
    }

?>
