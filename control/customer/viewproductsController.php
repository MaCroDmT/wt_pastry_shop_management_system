<?php
require_once('../model/productModel.php');

$productModel = new ProductModel();
$products = $productModel->getAllProducts();

?>