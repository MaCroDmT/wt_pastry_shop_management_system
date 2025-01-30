<?php
require_once('../../model/cartModel.php');
session_start();

if (isset($_POST['submit'])) {

    $productId = isset($_POST['pid']) ? $_POST['pid'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
    $customerId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if (!$productId || !$quantity || !$customerId) {
        echo "Invalid input. Please ensure all fields are filled.";
        exit;
    }

    $cartModel = new CartModel();
    $result = $cartModel->insertCart($customerId, $productId, $quantity);

    if ($result) {
        header("Location: ../../view/customer/viewcart.php");
    } else {
        echo "Failed to add product to cart.";
    }
}
?>
