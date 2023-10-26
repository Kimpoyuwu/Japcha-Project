<?php
// Include your database connection code
require_once "../classes/dbh.classes.php";
require_once "../classes/OrderModel.php";
$OrderModel = new Order();


if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];

    $order_data = $OrderModel->getOrder($orderId);
    
    if($order_data !=false){

       $proddata = $OrderModel->getData($order_data['product_id'], $order_data['sizes_id'], $order_data['customer_id']);
      
    //    $addis = 0;
    //    if($order_data['addons_id'] !== null){
        
    //     $addis = $order_data['addons_id'];
    //     $addons = $OrderModel->getAddons($addis);
    //     // Access the addons_id and addons_name
    //     $addonsId = $addons['addons_id'];
    //     $addonsName = $addons['addons_name'];
    //    }
     

            
        $orderDetails = array(
            'orderNo' =>  $order_data['order_id'],
            'email' => $proddata['email'],
            'address' => $proddata['customer_address'],
            'customerName' => $proddata['username'],
            'addons' => array(
                'productName' => $proddata['product_name'],
                'imageURL' => '../upload/'. $proddata['image_url'],
                'quantity' => $proddata['size_name'],
                'sample' => 'x'. $order_data['quantity'],
                'addons' => 'Addons' .$order_data['addons_id'],
                'price' => $order_data['price']
            ),
            'cashOnDelivery' => $order_data['price']
        );
    
        // Encode the order details as JSON and return it
        echo json_encode($orderDetails);
    } else {
        // Handle the case where the database query fails
        echo json_encode(['error' => 'Failed to retrieve order details']);
    }

    // Sample data (replace with actual data retrieval logic)
   
} 

if (isset($_POST['updateorder'])) {
    $orderid = $_POST['updateorder'];
    error_log('Received order update request for order ID: ' . $orderid);
    $OrderModel->acceptOrder($orderid);
}
