<?php
class Customer
{
    private $connectionObject;

    public function __construct()
    {
        // Connect to the database
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "abid";

        // Use positional arguments for mysqli constructor
        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        // Check for connection errors
        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $u_name, $mail, $pass, $ph_num, $dob, $delivery_address, $permanent_address)
    {
        // Ensure the 'dob' value is in the correct format (YYYY-MM-DD)
        $dob = date('Y-m-d', strtotime($dob));

        // Prepare the SQL query
        $sql = "INSERT INTO `$table` 
                (user_name, email, password, phone_number, dob, delivery_address, permanent_address) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connectionObject->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("sssssss", $u_name, $mail, $pass, $ph_num, $dob, $delivery_address, $permanent_address);

            // Execute the statement and check for errors
            if ($stmt->execute()) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $this->connectionObject->error;
        }
    }

    // Close the connection when done
    public function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>
