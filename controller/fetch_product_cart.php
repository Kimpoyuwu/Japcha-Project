<?php
require_once "../classes/dbh.classes.php";
require_once "../classes/CartModel.php";

$CartModel = new CartMOdel();

    $customerId = $_GET['customer_id'];
    $cart = $CartModel->fetchCart($customerId);
    
        $CartItem = [];

        foreach ($cart as $carts){

            $prod = $CartModel->fetchCartDetails($carts['product_id'], $carts['size_id'], $carts['addons_id']);
            $addonsName = $prod['addons_name'] ?? "None";
            $fetchPrize = $CartModel->fetchPrice($carts['size_id'], $carts['product_id']);
            $CartItem[] = [
                'cart_id' => $carts['cart_id'],
                'image_url' => 'upload/'. $prod['image_url'],
                'product_name' => $prod['product_name'],
                'product_id' => $carts['product_id'],
                'sizename' => $prod['size_name'],
                'addonsname' => $addonsName,
                'price' => $fetchPrize['price'],
                'quantity' => $carts['quantity']
             
            ];
            
        }

        // Return the sample product data as JSON
        header('Content-Type: application/json');
        echo json_encode($CartItem);


   

