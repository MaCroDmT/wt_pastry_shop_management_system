<?php
require_once('../../model/cartModel.php');

$cartItems = [];
if (isset($_SESSION['id'])) {

    $customerId = $_SESSION['id'];
    
    $cartModel = new CartModel();
    $cartItems = $cartModel->getCartItemsByCustomerId($customerId);
}
?>