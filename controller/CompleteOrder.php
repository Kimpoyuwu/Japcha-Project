<?php
// Include your database connection code
require_once "../classes/dbh.classes.php";
require_once "../classes/OrderModel.php";
$OrderModel = new Order();

if (isset($_POST['customer_id']) && isset($_POST['orderId'])){
    $orderid = $_POST['orderId'];
    $customerid  = $_POST['customer_id'];

    if($OrderModel->UpdateCompleteOrder($orderid)){
        
        if($OrderModel->CompleteOrder($orderid, $customerid)){
            $response = "Order #" . $orderid . " is completed";
            echo $response;
        }else{
            echo "Invalid";
        }
      
    }else{
        echo "Invalid request.";
    }
    
}
