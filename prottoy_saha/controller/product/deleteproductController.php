<?php
require_once('../../model/productModel.php');

if (isset($_GET['id'])) {

    $productId = intval($_GET['id']);
    
    $productModel = new ProductModel();
    $result = $productModel->deleteProduct($productId);

    if ($result) {
        header("Location: ../../view/product/deleteproduct.php");
    } else {
        echo "Failed to delete product.";
    }
}
?>