<?php
require_once('../../model/productModel.php');

$product = null;

if (isset($_GET['id'])) {

    $productId = intval($_GET['id']);
    
    $productModel = new ProductModel();
    $product = $productModel->getProductById($productId);
}
?>