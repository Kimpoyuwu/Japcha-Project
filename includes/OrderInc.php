<?php

// $customerid = 1;
// $prodid = 3;
// $sizesid = 1;
// $price = 150;
// $quantity = 2;
// $address = "blk 1 2 3";
// $remark = "";
// $status = 'In Progress';

// include "../classes/dbh.classes.php";
// include "../classes/OrderModel.php";
// include "../classes/OrderController.php";
// $order = new OrderController($customerid, $prodid, $sizesid, $price, $quantity, $address, $remark, $status);


// $order ->orderProd();
// header("location: ../customerSHOP.php?error=none");
// exit();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo 'connected';

    echo $_POST['subtotal1'];

}