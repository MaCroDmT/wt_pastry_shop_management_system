<?php
require_once('dbconn.php');

class AdminModel {
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

    public function insertAdmin($name, $email, $phone, $password, $bio, $reference) {
        $query = "INSERT INTO admin (name, phone, email, pass, bio, ref) VALUES ('$name', '$phone', '$email', '$password', '$bio', '$reference')";
        return mysqli_query($this->conn, $query);
    }

    public function getAllAdmins() {
        $query = "SELECT * FROM admin";
        $result = mysqli_query($this->conn, $query);

        $admins = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $admins[] = $row;
            }
        }
        return $admins;
    }

    public function getAdminById($adminId) {
        $query = "SELECT * FROM admin WHERE id = '$adminId'";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function deleteAdmin($adminId) {
        $query = "DELETE FROM admin WHERE id = '$adminId'";
        return mysqli_query($this->conn, $query);
    }

    public function updateAdmin($id, $name, $phone, $email, $password, $bio, $reference) {
        $query = "UPDATE admin 
                  SET name = '$name', phone = '$phone', email = '$email', bio = '$bio', ref = '$reference'
                  WHERE id = '$id'";
        return mysqli_query($this->conn, $query);
    }

    public function loginAdmin($email, $password) {
        $query = "SELECT * FROM admin WHERE email = '$email' AND pass = '$password'";
        $result = mysqli_query($this->conn, $query);

        $admin = null;
        if (mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);
        } else {
            echo "No admin found with the provided email and password.";
        }

        return $admin;
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}
?>
