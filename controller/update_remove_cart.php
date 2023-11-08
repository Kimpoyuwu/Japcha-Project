<?php
require_once "../classes/dbh.classes.php";
require_once "../classes/CartModel.php";

$CartModel = new CartMOdel();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $cartId = $_POST['CartId'];
    $customerId = $_POST['customer_id'];
    $productId = $_POST['product_id'];
    
    $remove = $CartModel->RemoveFromCart($customerId, $productId);

    if ($remove != false) {
        $response = ['success' => true];
    } else {
        // Invalid request, 'isRemove' is not set to true
        $response = ['success' => false, 'message' => 'Invalid request.'];
    }
} else {
    // Invalid request method
    $response = ['success' => false, 'message' => 'Invalid request method.'];
}

header('Content-Type: application/json');
echo json_encode($response);

