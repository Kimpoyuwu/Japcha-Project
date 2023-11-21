<?php
// Include your database connection code
require_once "../classes/dbh.classes.php";
require_once "../classes/OrderModel.php";
$OrderModel = new Order();

if (isset($_POST['updateorder'])){
    $orderid = $_POST['updateorder'];
    $customer_id  = $_POST['customerid'];
    $reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING);

    if($OrderModel->UpdateToCancelOrder($orderid, $reason)){
        if($OrderModel->CancelOrder($orderid, $customer_id)){
            $response = "Order #" . $orderid . " has been cancelled.";
            echo $response;
        }else{
            echo "Invalid request.";
        }
      
    }else{
        
    }

}
