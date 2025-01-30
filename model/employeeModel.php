<?php
require_once("dbconn.php");

class EmployeeModel {
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

    public function insertEmployee($name, $phone, $email, $address, $doj, $password) {
        $query = "INSERT INTO employee (name, phone, email, address, doj, pass) VALUES ('$name', '$phone', '$email', '$address', '$doj', '$password')";
        $data = mysqli_query($this->conn, $query);

        if ($data) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function getAllEmployees() {
        $query = "SELECT * FROM employee";
        $result = mysqli_query($this->conn, $query);

        $employees = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $employees[] = $row;
            }
        } else {
            echo "No employees found.";
        }

        return $employees;
    }

    public function loginEmployee($email, $password) {
        $query = "SELECT * FROM employee WHERE email = '$email' AND pass = '$password'";
        $result = mysqli_query($this->conn, $query);

        $employee = null;
        if (mysqli_num_rows($result) > 0) {
            $employee = mysqli_fetch_assoc($result);
        } else {
            echo "No employee found with the provided email and password.";
        }

        return $employee;
    }

    public function deleteEmployee($employeeId) {
        $query = "DELETE FROM employee WHERE id = '$employeeId'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function updateEmployee($employeeId, $name, $phone, $email, $address, $doj, $password) {
        $query = "UPDATE employee SET name = '$name', phone = '$phone', email = '$email', address = '$address', doj = '$doj', pass = '$password' WHERE id = '$employeeId'";
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
