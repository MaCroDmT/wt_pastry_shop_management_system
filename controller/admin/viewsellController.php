<?php
require_once('../../model/productModel.php');


function handleProductSales() {
    $db = getConnection(); // Get database connection
    $model = new ProductModel($db); // Create model instance
    return $model->getTotalProductSales(); // Fetch product sales data
}
?>
