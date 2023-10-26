<?php

// $customerid = 1;
// $prodid = 3;
// $sizesid = 1;
// $price = 150;
// $quantity = 2;
// $address = "blk 1 2 3";
// $remark = "";
// $status = 'In Progress';


// $order = new OrderController($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $address, $remark, $status);


// $order ->orderProd();
// header("location: ../customerSHOP.php?error=none");
// exit();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo 'connected';
    echo '<br>';

    $customerid = htmlspecialchars($_POST["userid"], ENT_QUOTES, 'UTF-8');
    $prodid = htmlspecialchars($_POST["product_id_data"], ENT_QUOTES, 'UTF-8');
    $sizesid = htmlspecialchars($_POST["size_data"], ENT_QUOTES, 'UTF-8');
    $subtotal = htmlspecialchars($_POST["subtotal1"], ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($_POST["total_data"], ENT_QUOTES, 'UTF-8');
    $quantity = htmlspecialchars($_POST["quantity"], ENT_QUOTES, 'UTF-8');
    $remark = htmlspecialchars($_POST["remarks"], ENT_QUOTES, 'UTF-8');
    // $remark = "sample remarks muna";
    $status = 'In Progress';
    
    $_id = null;
    if(isset($_POST['addons_data'])){
        $_id = htmlspecialchars($_POST["addons_data"], ENT_QUOTES, 'UTF-8');
    }
    


    include "../classes/dbh.classes.php";
    include "../classes/OrderModel.php";
    include "../classes/OrderController.php";
    $order = new Order();
    $order->setOrder($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $_id, $remark);
    if($order != false){
        header("location: ../customerSHOP.php?error=none");
        exit();
    }else{
        echo "not updated";
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
    // echo $_POST['product_id_data'];


    

}