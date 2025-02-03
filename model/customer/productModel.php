<?php
require_once('dbconn.php');

class ProductModel {
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

    public function insertProduct($name, $category, $price, $production, $expire) {
        $sql = "INSERT INTO product (name, category, price, production, expire) VALUES ('$name', '$category', '$price', '$production', '$expire')";

        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
        }
    }

    public function getAllProducts() {
        $query = "SELECT * FROM product";
        $result = mysqli_query($this->conn, $query);

        $products = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function deleteProduct($productId) {
        $query = "DELETE FROM product WHERE id = '$productId'";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function updateProduct($id, $name, $category, $price, $production, $expire) {
        $sql = "UPDATE product 
                SET name = '$name', category = '$category', price = '$price', production = '$production', expire = '$expire'
                WHERE id = '$id'";

        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->conn);
        }
    }

    public function getProductById($productId) {
        $productId = intval($productId);

        $query = "SELECT * FROM product WHERE id = $productId";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function deleteProductById($id) {
        $id = (int)$id; 

        $query = "DELETE FROM products WHERE id = $id";

        return $this->db->query($query);
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }

    public function getTotalProductSales() {
        $query = "
            SELECT p.id, p.name, p.category, p.price, SUM(q.quantity) AS total_quantity_sold,
                   (p.price * SUM(q.quantity)) AS total_price
            FROM product p
            JOIN pquantity q ON p.id = q.pid
            GROUP BY p.id, p.name, p.category, p.price;
        ";

        $result = $this->db->query($query);
        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
?>
