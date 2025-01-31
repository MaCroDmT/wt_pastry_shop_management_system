<?php
//session_start();
class customer
{
    private $connectionObject;

    public function __construct()
    {
        
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "customer_db";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $c_name, $c_mail, $c_pass, $c_c_pass, $c_ph_num, $c_contact_method, $c_gender, $c_date, $c_Delivery_address, $c_Parmanent_address)
    {
        
        $sql = "INSERT INTO $table (username, email, password, confirm_password, phone_number, contact_method, gender, dob, delivery_address, permanent_address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $this->connectionObject->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $this->connectionObject->error);
}


$stmt->bind_param("ssssssssss", $c_name, $c_mail, $c_pass, $c_c_pass, $c_ph_num, $c_contact_method, $c_gender, $c_date, $c_Delivery_address, $c_Parmanent_address);


if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error inserting data: " . $stmt->error;
}

$stmt->close();


    }

    //for login

    public function login($username, $password)
    {
        $username = $this->connectionObject->real_escape_string($username);
        $password = $this->connectionObject->real_escape_string($password);

       
        $sql = "SELECT * FROM customer_tb WHERE username='$username' AND password='$password'";
        $result = $this->connectionObject->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];

        $_SESSION['username'] = $user['username'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone_number'] = $user['phone_number'];
        $_SESSION['contact_method'] = $user['contact_method'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['dob'] = $user['dob'];
        $_SESSION['delivery_address'] = $user['delivery_address'];
        $_SESSION['permanent_address'] = $user['permanent_address'];

            header("Location:../view/user_panel.php");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    }
    

    //update info
    public function updateProfile($user_id, $username, $email, $phone_number, $contact_method, $gender, $dob, $delivery_address, $permanent_address)
    {
        
        $sql = "UPDATE customer_tb SET 
                username = ?, email = ?, phone_number = ?, contact_method = ?, gender = ?, dob = ?, delivery_address = ?, permanent_address = ? 
                WHERE id = ?"; 

        $stmt = $this->connectionObject->prepare($sql);

        if (!$stmt) {
            die("Error preparing statement: " . $this->connectionObject->error);
        }

       
        $stmt->bind_param("sssssssss", $username, $email, $phone_number, $contact_method, $gender, $dob, $delivery_address, $permanent_address, $user_id);

       
        if ($stmt->execute()) {
           echo "<p class='p'> </p>";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
    }


    
    public function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>



