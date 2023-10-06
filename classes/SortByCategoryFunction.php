<?php
require "dbh.classes.php";
require "ProductsModel.php";
$productModel = new ProductModel();

if(isset($_POST['category'])){
    $category = $_POST['category'];
    
    if( $category === ""){
        $products = $productModel->getAllProducts();
    }else{
        $products = $productModel->getProductsByCategory($category);
    }
    echo json_encode($products);
}