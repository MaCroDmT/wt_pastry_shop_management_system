<?php
require_once('dbconn.php');

class CartModel {
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

    public function insertCart($customerId, $productId, $quantity) {
        $query = "INSERT INTO cart (customer_id, product_id, quantity) VALUES ('$customerId', '$productId', '$quantity')";
        return mysqli_query($this->conn, $query);
    }

    public function getCartItemsByCustomerId($customerId) {
        $query = "SELECT c.product_id, p.name as product_name, c.quantity, p.price, (c.quantity * p.price) as total
                  FROM cart c
                  JOIN product p ON c.product_id = p.id
                  WHERE c.customer_id = '$customerId'";
        $result = mysqli_query($this->conn, $query);

        $cartItems = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cartItems[] = $row;
            }
        }
        return $cartItems;
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
}
?>
