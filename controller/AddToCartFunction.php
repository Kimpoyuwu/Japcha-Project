<?php
// Initialize the session or any required authentication checks
require_once "../classes/dbh.classes.php";
require_once "../classes/CartModel.php";
$cart = new CartModel();
// ... (previous code)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive and validate the data
    $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : null;
    $product_id = isset($_POST['prod__id']) ? $_POST['prod__id'] : null;
    $size_id = isset($_POST['size_id']) ? $_POST['size_id'] : null;
    $addons_id = isset($_POST['addons_id']) ? $_POST['addons_id'] : null;
    $quantity = 1;
    $subtotal = 20;

    $response = "Customer ID: " . $customer_id . " Product ID: " . $product_id;

    // You can check if the addons_id is null or set to some default value
    if ($customer_id && $product_id && $size_id) {
        // Perform cart update operations here, including database interactions
        
        // Example: Insert the selected product, size, and addons into the cart table
        $cart->insertToCart($customer_id, $product_id, $size_id, $addons_id,  $quantity,  $subtotal);
        
        // Check if the cart update was successful
        if ($cart != false) {
            $response = array('success' => true, 'message' => 'Item added to cart.');
        } else {
            $response = array('success' => false, 'message' => 'Failed to add item to cart.');
        }
    } else {
        $response = array('success' => false, 'message' => 'Invalid data.');
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request method.');
}

// Return the response in JSON format
header('Content-Type: application/json');
echo json_encode($response);
