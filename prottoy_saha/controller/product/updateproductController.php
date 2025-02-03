<?php
require_once('../../model/productModel.php');

session_start();

if (isset($_POST['submit'])) {
    $id = trim($_POST['id']);
    $productName = trim($_POST['name']);
    $productCategory = trim($_POST['category']);
    $productPrice = trim($_POST['price']);
    $production = trim($_POST['production']);
    $expire = trim($_POST['expire']);


    if (empty($productName) || empty($productCategory) || empty($productPrice) || empty($production) || empty($expire)) {
        $_SESSION['error'] = 'All fields are required.';
        header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production=$production&expire=$expire");
        exit();
    }


    $specialChars = ['@', '#', '$', '%', '&', '*', '!', '(', ')'];
    for ($i = 0; $i < strlen($productName); $i++) {
        if (in_array($productName[$i], $specialChars)) {
            $_SESSION['error'] = 'Product Name should not contain special characters.';
            header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
            exit();
        }
    }


    for ($i = 0; $i < strlen($productCategory); $i++) {
        if (in_array($productCategory[$i], $specialChars)) {
            $_SESSION['error'] = 'Category should not contain special characters.';
            header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
            exit();
        }
    }


    if (!is_numeric($productPrice) || floatval($productPrice) <= 0) {
        $_SESSION['error'] = 'Please enter a valid price.';
        header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
        exit();
    }


    if ($production === $expire) {
        $_SESSION['error'] = 'Production Date and Expire Date cannot be the same.';
        header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
        exit();
    }

    if (new DateTime($expire) <= new DateTime($production)) {
        $_SESSION['error'] = 'Expire Date must be after Production Date.';
        header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
        exit();
    }


    $productModel = new ProductModel();
    $result = $productModel->updateProduct($id, $productName, $productCategory, $productPrice, $production, $expire);

    if ($result) {
        $_SESSION['success'] = 'Product updated successfully.';
        header("Location: ../../view/product/updateproduct.php");
        exit();
    } else {
        $_SESSION['error'] = 'Failed to update product.';
        header("Location: ../../view/product/updateproduct.php?id=$id&name=$productName&category=$productCategory&price=$productPrice&production_date=$production&expire_date=$expire");
        exit();
    }
} else {
    header("Location: ../../view/product/updateproduct.php");
    exit();
}
?>
