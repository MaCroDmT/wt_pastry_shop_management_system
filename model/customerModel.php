<?php
require_once("dbconn.php");

class CustomerModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    private function getConnection() {
        $conn = getConnection();
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    public function insertCustomer($name, $age, $gender, $paddress, $daddress, $phone, $email, $password) {
        $query = "INSERT INTO customer (name, age, gender, paddress, daddress, phone, email, pass) VALUES ('$name', '$age', '$gender', '$paddress', '$daddress', '$phone', '$email', '$password')";
        $data = mysqli_query($this->conn, $query);

        if ($data) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function getAllCustomers() {
        $query = "SELECT * FROM customer";
        $result = mysqli_query($this->conn, $query);

        $customers = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $customers[] = $row;
            }
        } else {
            echo "No customers found.";
        }

        return $customers;
    }

    public function loginCustomer($email, $password) {
        $query = "SELECT * FROM customer WHERE email = '$email' AND pass = '$password'";
        $result = mysqli_query($this->conn, $query);

        $customer = null;
        if (mysqli_num_rows($result) > 0) {
            $customer = mysqli_fetch_assoc($result);
        } else {
            echo "No customer found with the provided email and password.";
        }

        return $customer;
    }

    public function deleteCustomer($customerId) {
        $query = "DELETE FROM customer WHERE id = '$customerId'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function updateCustomer($customerId, $name, $age, $gender, $paddress, $daddress, $phone, $email, $password) {
        $query = "UPDATE customer SET name = '$name', age = '$age', gender = '$gender', paddress = '$paddress', daddress = '$daddress', phone = '$phone', email = '$email', pass = '$password' WHERE id = '$customerId'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}
?>