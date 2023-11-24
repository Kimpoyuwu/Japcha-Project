<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/OrderModel.php";
include "../classes/OrderController.php";
require_once "../classes/CartModel.php";
$cartmodel = new CartModel();
$order = new Order();
date_default_timezone_set('Asia/Manila');
$order_date = date('Y-m-d H:i:s');
echo $today;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['proceed1'])){ 
         // echo 'connected';
    // echo '<br>';
    $payment_pickup = isset($_POST["group"]["payment"]["pickup"]) ? 1 : 0;
    $payment_cod = isset($_POST["group"]["payment"]["cod"]) ? 1 : 0;
    $payment_gcash = isset($_POST["group"]["payment"]["gcash"]) ? 1 : 0;
    $gcash_upload = null;
    if($payment_gcash != 0){
        if(isset($_FILES['gcash_payment_upload'])) {
            $file = $_FILES['gcash_payment_upload'];
            // Check if there was no error during the file upload
            if($file['error'] === 0) {
                $fileType = $file['type'];
    
                // Define allowed image MIME types
                $allowedImageTypes = array('image/jpeg', 'image/png');
    
                if (in_array($fileType, $allowedImageTypes)) {
                    // The uploaded file is an image
                    // echo 'File is an image. You can process it here.';
                    $uploadDirectory = '../upload-content/';
                    $uploadPath = $uploadDirectory . $_FILES['gcash_payment_upload']['name'];
                    $tmp_name = $_FILES['gcash_payment_upload']['tmp_name'];
                    move_uploaded_file($tmp_name, $uploadPath);
    
                    $gcash_upload = $_FILES['gcash_payment_upload']['name'];
                   
                    // $savs = $samplemodel->setLogo($logo_name);
                    
                    // if ($savs === false) {
                    //     // Handle the database error here
                    //     echo "Error saving order to the database";
                    // } else {
                    //     // Specify the directory to move the file to
                    // }
                } else {
                    echo 'File is not an image. Please upload a valid image.';
                }
            } else {
                echo 'Error during file upload. Please try again.';
            }
        } else {
            echo 'No file was uploaded.';
        }
    }

    // echo  $logo_name;
    // echo ' pickup: ';
    // echo $payment_pickup ;
    // echo ' cod: ';
    // echo $payment_cod ;
    // echo ' gcas:';
    // echo $payment_gcash;
    $totalprice = htmlspecialchars($_POST["total_data"], ENT_QUOTES, 'UTF-8');
    $remark = htmlspecialchars($_POST["remarks"], ENT_QUOTES, 'UTF-8');
    

    $customerid = htmlspecialchars($_POST["userid"], ENT_QUOTES, 'UTF-8');

    $prodid = htmlspecialchars($_POST["product_id_data"], ENT_QUOTES, 'UTF-8');

    $product_name = htmlspecialchars($_POST["p_name"], ENT_QUOTES, 'UTF-8');
    $product_price = htmlspecialchars($_POST["product_price"], ENT_QUOTES, 'UTF-8');
    

    $sizesid = htmlspecialchars($_POST["size_data"], ENT_QUOTES, 'UTF-8');
    $size_name = htmlspecialchars($_POST["size_name"], ENT_QUOTES, 'UTF-8');

    $subtotal = htmlspecialchars($_POST["subtotal1"], ENT_QUOTES, 'UTF-8');



    $quantity = htmlspecialchars($_POST["quantity"], ENT_QUOTES, 'UTF-8');


    

    $addons_id = $_POST['addons_data'] ?? null;
    $addons_name = $_POST["addons_name"] ?? "";
    $addons_price = $_POST["addons_price"] ?? null;

    $product_remark = htmlspecialchars($_POST["prd_remark"], ENT_QUOTES, 'UTF-8');

    
    if($order->insertToOrderHeader($customerid,  $totalprice, $remark, $order_date, $payment_pickup , $payment_cod , $payment_gcash,  $gcash_upload)){
        $getOrderNumber = $order->getOrderNumberOfCustomer($customerid,  $totalprice);

        if($order->setOrder((int)$getOrderNumber, $customerid, $prodid, $product_name, $product_price, $sizesid, $size_name, $subtotal, $quantity, $addons_id, $addons_name, $addons_price, $product_remark, $order_date)){
            $_SESSION['order_placed'] = "successful_order";
            header("location: ../customerSHOP.php?error=none");
            exit();
        } else {
            echo "Failed to insert records.";
        }

    }
    // $remark = "sample remarks muna";
    // $status = 'In Progress';
    
 
    // $addson_id = null;
    // if(isset($_POST['addons_data']))
    //     $addson_id = htmlspecialchars($_POST["addons_data"], ENT_QUOTES, 'UTF-8');
    
    

    // $order->setOrder($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $_id, $remark);
    // if($order != false){
    //     header("location: ../customerSHOP.php?error=none");
    //     exit();
    // }else{
    //     echo "not updated";
    // }
    // if($order->insertToOrderHeader($customerid,  $totalprice, $remark)){
    //     if($order->setOrder($customerid, $prodid, $sizesid, $subtotal, $totalprice, $quantity, $addson_id, $remark)){
    //         header("location: ../customerSHOP.php?error=none");
    //         exit();
    //     } else {
    //         echo "Failed to insert records.";
    //     }
    
    // $size = json_decode($_POST['size_data'], true);
    // echo 'total_price:';
    // echo $totalprice;
    // echo '<br>';
    // echo 'userid:';
    // echo $customerid;
    // echo '<br>';
    // echo 'size_id:';
    // echo $sizesid;
    // echo '<br>';
    // echo 'quantity:';
    // echo $quantity;
    // echo '<br>';
    // echo 'subtotal:';
    // echo $subtotal;
    // echo '<br>';
    // echo 'addons_data:';
    // echo $addons_id;
    // echo '<br>';
    // echo 'product_id:';
    // echo $prodid;
    // echo '<br>';
    // echo 'remarks:';
    // echo $remark;
    // echo '<br>';
    // echo 'addons_name:';
    // echo $addons_name;
    // echo '<br>';
    // echo 'addons_price:';
    // echo $addons_price;
    // echo '<br>';
    // echo 'size_name:';
    // echo $size_name;
    // echo '<br>';
    // echo 'product_remark:';
    // echo $product_remark;
    // echo '<br>';
    // echo 'product_name:';
    // echo $product_name;

  


    }
   

if(isset($_POST['proceed2'])){
    $payment_pickup = isset($_POST["group"]["payment"]["pickup"]) ? 1 : 0;
    $payment_cod = isset($_POST["group"]["payment"]["cod"]) ? 1 : 0;
    $payment_gcash = isset($_POST["group"]["payment"]["gcash"]) ? 1 : 0;
    $gcash_upload = null;
    if($payment_gcash != 0){
        if(isset($_FILES['gcash_payment_upload'])) {
            $file = $_FILES['gcash_payment_upload'];
            // Check if there was no error during the file upload
            if($file['error'] === 0) {
                $fileType = $file['type'];
    
                // Define allowed image MIME types
                $allowedImageTypes = array('image/jpeg', 'image/png');
    
                if (in_array($fileType, $allowedImageTypes)) {
                    // The uploaded file is an image
                    // echo 'File is an image. You can process it here.';
                    $uploadDirectory = '../upload-content/';
                    $uploadPath = $uploadDirectory . $_FILES['gcash_payment_upload']['name'];
                    $tmp_name = $_FILES['gcash_payment_upload']['tmp_name'];
                    move_uploaded_file($tmp_name, $uploadPath);
    
                    $gcash_upload = $_FILES['gcash_payment_upload']['name'];
                   
                    // $savs = $samplemodel->setLogo($logo_name);
                    
                    // if ($savs === false) {
                    //     // Handle the database error here
                    //     echo "Error saving order to the database";
                    // } else {
                    //     // Specify the directory to move the file to
                    // }
                } else {
                    echo 'File is not an image. Please upload a valid image.';
                }
            } else {
                echo 'Error during file upload. Please try again.';
            }
        } else {
            echo 'No file was uploaded.';
        }
    }

    $userID = $_POST["userid"];
    $customerid = $_POST["cid"];
    $totalprice = $_POST["total_data"];
    $subtotals = $_POST['subtotal1']; // This is now an array
    $prodid = $_POST["product_id_data"];
    $sizesid = $_POST["size_data"];
    $quantity = $_POST["quantity"];
    $addons = $_POST['addons_data'];
    $remark = htmlspecialchars($_POST["remarks"], ENT_QUOTES, 'UTF-8');

    $prod_price =$_POST["product_price"];
    $array = $_POST['prd_remark']; // Example, replace with your actual variable
    $product_remark = array_map('htmlspecialchars', $array);

    $addons_name = $_POST['addons_name'];
    $addons_price = $_POST['addons_price'];
    $p_name = $_POST['p_name'];
    $size_name = $_POST['size_name'];
    $product_remark = $_POST['addons_data'];
    // // echo $userID;
    // // echo '<br>';
    // // echo $totalprice;
    // // echo '<br>';
    // // echo $remark;
    // // echo '<br>';
    // // var_dump($prod_price);
    $number_of_rows = count($customerid); 
   
    $UpdateCart = $cartmodel->updateCart($userID);

    if($order->insertToOrderHeader($userID,  $totalprice, $remark, $order_date, $payment_pickup , $payment_cod , $payment_gcash,  $gcash_upload)){
        $getOrderNumber = $order->getOrderNumberOfCustomer($userID,  $totalprice);

        for ($i = 0; $i < $number_of_rows; $i++) {

            $addons_id = !empty($addons[$i]) ? $addons[$i] : null;
            $AddonsName = !empty($addons_name[$i]) ? $addons_name[$i] : null;
            $AddonsPrice = !empty($addons_price[$i]) ? $addons_price[$i] : null;
            $InsertOrder[] = [
                'orders_id' => (int)$getOrderNumber,
                'customer_id' => $customerid[$i],
                'product_id' => $prodid[$i],
                'product_name' => $p_name[$i],
                'product_price' => $prod_price[$i], 
                'sizes_id' => $sizesid[$i],
                'size_name' => $size_name[$i],
                'addons_id' => $addons_id,
                'addons_name' => $AddonsName, 
                'addons_price' => $AddonsPrice,  // Set to null or provide actual values
                'quantity' => $quantity[$i],
                'subtotal' => $subtotals[$i],
                'product_remark' => $product_remark[$i],
                'order_date' => $order_date,
                
            ];
        }

        // var_dump($getOrderNumber);
        // var_dump($InsertOrder);
        if ($order->insertMultipleOrder($InsertOrder)) {
            $_SESSION['order_placed'] = "successful_order";
            header("location: ../customerSHOP.php?error=none");
            exit();
        } else {
            echo "Failed to insert multiple records.";
        }
    }else{
        echo "Failed to insert records.";
    }

  
}
    

}