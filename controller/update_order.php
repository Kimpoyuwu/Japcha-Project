<?php
// Include your database connection code
require_once "../classes/dbh.classes.php";
require_once "../classes/OrderModel.php";
$OrderModel = new Order();

if (isset($_POST['updateorder'])){
    $orderid = $_POST['updateorder'];
    $customer_id  = $_POST['customerid'];

    if($OrderModel->UpdatePrepareOrder($orderid)){
        if($OrderModel->AcceptOrderV2($orderid, $customer_id)){
            $response = "Order #" . $orderid . " has been accepted.";
            echo $response;
        }else{
            echo "Invalid request.";
        }
      
    }else{
        
    }
    
}
