<?php
include "../classes/dbh.classes.php";
include "../classes/OrderModel.php";
include "../classes/OrderController.php";
require_once "../classes/CartModel.php";
$cartmodel = new CartModel();
$order = new Order();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['proceed1'])){ 
         // echo 'connected';
    // echo '<br>';
    $customerid = htmlspecialchars($_POST["userid"], ENT_QUOTES, 'UTF-8');
    $prodid = htmlspecialchars($_POST["product_id_data"], ENT_QUOTES, 'UTF-8');
    $sizesid = htmlspecialchars($_POST["size_data"], ENT_QUOTES, 'UTF-8');
    $subtotal = htmlspecialchars($_POST["subtotal1"], ENT_QUOTES, 'UTF-8');
    $totalprice = htmlspecialchars($_POST["total_data"], ENT_QUOTES, 'UTF-8');
    $quantity = htmlspecialchars($_POST["quantity"], ENT_QUOTES, 'UTF-8');
    $remark = htmlspecialchars($_POST["remarks"], ENT_QUOTES, 'UTF-8');
    // $remark = "sample remarks muna";
    $status = 'In Progress';
    
    $addson_id = null;
    if(isset($_POST['addons_data'])){
        $addson_id = htmlspecialchars($_POST["addons_data"], ENT_QUOTES, 'UTF-8');
    }
    

    // $order->setOrder($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $_id, $remark);
    // if($order != false){
    //     header("location: ../customerSHOP.php?error=none");
    //     exit();
    // }else{
    //     echo "not updated";
    // }
    if($order->insertToOrderHeader($customerid,  $totalprice, $remark)){
        if($order->setOrder($customerid, $prodid, $sizesid, $subtotal, $totalprice, $quantity, $addson_id, $remark)){
            header("location: ../customerSHOP.php?error=none");
            exit();
        } else {
            echo "Failed to insert records.";
        }
    }else{
        echo "Failed to insert records.";
    }
    // $size = json_decode($_POST['size_data'], true);
    // echo $_POST['total_data'];
    // echo '<br>';
    // echo $_POST['userid'];
    // echo '<br>';
    // echo $_POST['size_data'];
    // echo '<br>';
    // echo $_POST['quantity'];
    // echo '<br>';
    // echo $_POST['subtotal1'];
    // echo '<br>';
    // echo $_POST['addons_data'];
    // echo '<br>';
    // echo $_POST['product_id_data'];
    // echo '<br>';
    // echo $_POST['remarks'];

    }
   

if(isset($_POST['proceed2'])){

    $userID = $_POST["userid"];
    $customerid = $_POST["cid"];
    $totalprice = $_POST["total_data"];
    $subtotals = $_POST['subtotal1']; // This is now an array
    $prodid = $_POST["product_id_data"];
    $sizesid = $_POST["size_data"];
    $quantity = $_POST["quantity"];
    $addons = $_POST['addons_data'];
    $remark = htmlspecialchars($_POST["remarks"], ENT_QUOTES, 'UTF-8');

    // echo $userID;
    // echo '<br>';
    // echo $totalprice;
    // echo '<br>';
    // echo $remark;
    // echo '<br>';

    $number_of_rows = count($customerid); 


    // var_dump($InsertOrder);
    $UpdateCart = $cartmodel->updateCart($userID);

    if($order->insertToOrderHeader($userID,  $totalprice, $remark)){
        
        $getOrderNumber = $order->getOrderNumberOfCustomer($userID, $totalprice);

        // for ($i = 0; $i < $number_of_rows; $i++) {

        //     $addons_id = !empty($addons[$i]) ? $addons[$i] : null;
    
        //     $InsertOrder[] = [
        //         'customer_id' => $customerid[$i],
        //         'product_id' => $prodid[$i],
        //         'sizes_id' => $sizesid[$i],
        //         'addons_id' => $addons_id, // Set to null or provide actual values
        //         'quantity' => $quantity[$i],
        //         'subtotal' => $subtotals[$i],
        //     ];
        // }

        var_dump($getOrderNumber);
        // if ($order->insertMultipleOrder($InsertOrder)) {
        //     header("location: ../customerSHOP.php?error=none");
        //     exit();
        // } else {
        //     echo "Failed to insert multiple records.";
        // }
    }else{
        echo "Failed to insert records.";
    }

  
}
    

}