<?php
require_once('../../model/productModel.php');

session_start();

if (isset($_POST['submit'])) {
    $productName = trim($_POST['p_name']);
    $productCategory = trim($_POST['p_category']);
    $productPrice = trim($_POST['p_price']);
    $productionDate = trim($_POST['p_production']);
    $expireDate = trim($_POST['p_expire']);


    if (empty($productName) || empty($productCategory) || empty($productPrice) || empty($productionDate) || empty($expireDate)) {
        $_SESSION['error'] = 'All fields are required.';
        header("Location: ../../view/product/addproduct.php");
        exit();
    }


    $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];
    for ($i = 0; $i < strlen($productName); $i++) {
        if (in_array($productName[$i], $specialChars)) {
            $_SESSION['error'] = 'Product Name should not contain special characters.';
            header("Location: ../../view/product/addproduct.php");
            exit();
        }
    }


    for ($i = 0; $i < strlen($productCategory); $i++) {
        if (in_array($productCategory[$i], $specialChars)) {
            $_SESSION['error'] = 'Category should not contain special characters.';
            header("Location: ../../view/product/addproduct.php");
            exit();
        }
    }


    if (!is_numeric($productPrice) || floatval($productPrice) <= 0) {
        $_SESSION['error'] = 'Please enter a valid price.';
        header("Location: ../../view/product/addproduct.php");
        exit();
    }


    if ($productionDate === $expireDate) {
        $_SESSION['error'] = 'Production Date and Expire Date cannot be the same.';
        header("Location: ../../view/product/addproduct.php");
        exit();
    }

    if (new DateTime($expireDate) <= new DateTime($productionDate)) {
        $_SESSION['error'] = 'Expire Date must be after Production Date.';
        header("Location: ../../view/product/addproduct.php");
        exit();
    }


    $productModel = new ProductModel();
    $result = $productModel->insertProduct($productName, $productCategory, $productPrice, $productionDate, $expireDate);

    if ($result) {
        $_SESSION['success'] = 'Product added successfully.';
        header("Location: ../../view/product/viewallproduct.php");
        exit();
    } else {
        $_SESSION['error'] = 'Failed to add product.';
        header("Location: ../../view/product/addproduct.php");
        exit();
    }
} else {
    header("Location: ../../view/product/addproduct.php");
    exit();
}
?>
