<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<?php
  
    include "c_header.php"; 
?>
<style>
    .container {
    height: auto; 
    width: 100%; 
    padding-left: 280px;  
    margin-top: 110px; 
    margin-left: 170px;
}
.orderMainCont {
        padding: 20px;
    }

    .moptitle {
        margin-top: 20px;
    }

    .modcont {
        display: flex;
    }

    .cod,
    .gcash {
        margin-right: 20px;
    }

    .productbg img {
        max-width: 100%;
        height: auto;
    }

    .prodDetails mt-4 .hr {
        border: 5px solid gray;
        
    }

    .new4 {
        border: 2px solid gray;

    }

    .Remarks{
        text-align: center;
    }

    .form-controls {
        text-align: center;
        height: 100px;
        width: 100px; 
    }

    .btn btn-link {
        color: #D0BC05;
    }

    .card-img-top{
        max-width: 100px; 
        max-height: 100px; 
        background-color:#D0BC05;
        border-style: ridge;
    }
    
    .totalPrice{
        text-align: center;
    }

    .btn{
        background-color:#D0BC05;
        color: black;
        width: 150px;
    }

    .table{
        margin-top: 50px;
    }

    .modal-gcash{
        text-align: center;
    }
    td{
        vertical-align: middle !important;
    }
    h3{
        font-size: 1rem !important;
    }
    </style>
<?php
 if (isset($_SESSION["userid"])) 
 {
    $uid = $_SESSION["userid"];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // var_dump($sizeid);
       
?> 
<div class="container orderMainCont">
    <form action="includes/OrderInc.php" method ="POST">
    
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="detailsCont">
                    <div class="userDetails">
                        <div class="name">
                            <div class="name1">
                 
                                <p>Full Name</p>
                                <h4><?= $_SESSION["username"] ?></h4>
                                <input type="hidden" name="userid" value="<?= $uid ?>">
                            </div>
                        </div>

                        <div class="contact mt-3">
                            <div class="cont">
                                <p>Contact Number</p>
                                <h4><?= $_SESSION["contact"] ?></h4>
                            </div>
                            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#changeContactModal">Change</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="changeContactModal" tabindex="-1" role="dialog" aria-labelledby="changeContactModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changeModalLabel">Change Contatct Number</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="recipient-name" class="col-form-label">Contact Number:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- Add any other buttons you need in the modal footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="detailsCont">
                    <div class="deliveryCont">
                        <div class="address">
                            <h3>Delivery Address</h3>
                            <h4><?= $_SESSION["address"] ?></h4>
                        </div>
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#changeAddressModal">Change</a>
                    </div>
                    <div class="modal fade" id="changeAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeModalLabel">Change Delivery Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
                                <!-- Add any other buttons you need in the modal footer -->
                            </div>
                        </div>
                    </div>
                </div>
                    

                    <h3 class="moptitle mt-3">Mode of Payment</h3>
                    <div class="modcont">
                        <div class="cod">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="cod-checkbox" name="group" id="" onclick="selectOnlyOne(this)">
                                <p class="form-check-label"> <img src="image/cod.png" alt=""> Cash on Delivery</p>
                            </div>
                        </div>

                                                <div class="gcash">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gcash-checkbox" name="group" onclick="selectOnlyOne(this)">
                                <div class="gcashtitle">
                                    <p> <img src="image/gcash.png" alt=""> Gcash </p>
                                </div>
                                <a href="#" id="gcashCode" data-toggle="modal" data-target="#gcashQRCodeModal">Show Gcash Code</a>
                            </div>
                        </div>
                        <div class="modal fade" id="gcashQRCodeModal" tabindex="-1" role="dialog" aria-labelledby="gcashQRCodeModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="gcashQRCodeModalLabel">GCash QR Code</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Add the QR code image here -->
                                        <img src="path/to/your/qr_code.png" alt="GCash QR Code">
                                    </div>
                                    <div class="modal-body">
                                    <a class="modal-gcash" id="changeModalLabel">How to pay using Gcash?</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Container for Product Details -->
        <div class="prodDetails mt-4">
            <hr class="new4"> </hr>
        </div>
        <?php
             if(isset($_POST['buynow'])){
                $prodID = $_POST['prdID'];
                $prodname = $_POST['prdname'];
                $image = $_POST['prodImage'];
                $sizeid = $_POST['sizes'];
             
           
        ?>
        <input type="hidden" name="product_id_data" value="<?= $prodID ?>">
        <input type="hidden" name="size_data" value="<?= $sizeid ?>">
            <table class="table">
        <thead style="text-align: center;">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
               
                <?php
                    if(isset($_POST['addons'])){
                     ?>
               <th scope="col">Addons</th>

                <?php
                    }
                ?>
                 <th scope="col">Subtotal</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center-content"><?php
                    // Assuming $images contains the file path to the image or video
                    if (strpos($image, '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls="false" style="max-width: 100px; max-height: 100px;">
                        <source src="upload/<?= $image?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="upload/<?= $image ?>" alt="" style="max-width: 100px; max-height: 100px;" >
                    <?php
                        }
                    ?>
                </td>
                <td class="center-content"><?=  $prodname ?></td>
                <?php
                    $getSizeName =  $productModel->getOneSize($sizeid);
                    if ($getSizeName !== false) {
                        $sizename = $getSizeName;
                ?>
                <td class="center-content"><?=  $sizename ?></td>
              
                <?php
                    }
                ?>
                <?php
                 $getprice =  $productModel->getPriceBySize($sizeid, $prodID);
                
                 if ($getprice !== false) {
                    $price = $getprice;
                ?>
                <td class="center-content">₱<span id="price"><?=  $price ?></span></td>
               
                <?php
                 }
                ?>
                <td class="center-content"><input type="number" name="quantity" id="quantity" min="1" step="1" value="1" required style="width:50px;"></td>
               
                 <?php
                    $ddson = 0;
                    if(isset($_POST['addons'])){
                     $ddson = $_POST['addons'];
                    include_once "classes/add-addons.classes.php";
                    $addonsModel = new addAddons();
                    $dataAdds =  $addonsModel->getOneAddons($ddson);
                    if($dataAdds != false){

                        $addonsid = $dataAdds['addons_id'];
                        $addonsName = $dataAdds['addons_name'];
                        $addonsPrice = $dataAdds['price'];
                     ?>
                          <td scope="col"><?= $addonsName ?> ₱<span id="addonsPrice"><?= $addonsPrice ?></span></td>
                          <input type="hidden" name="addons_data" value="<?= $ddson ?>">
                          <!-- <td></td> -->
                <?php
                         }
                    }
                ?>
                 <?php
                 $getprice =  $productModel->getPriceBySize($sizeid, $prodID);
                
                 if ($getprice !== false) {
                    $price = $getprice;
                ?>
                    <td class="center-content" >₱<span id="subtotal"><?= $price ?></span></td>
                    <input type="hidden" name="subtotal1" id="subtotalInput" value="<?= $price ?>">
                <?php
                 }
                ?>
                  
                <!-- <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td> -->
            </tr>
        </tbody>
    </table>

            <div class="remarks mt-3">
                        <h4 class ="Remarks">Remarks</h4>
                        <textarea name="remarks" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

            </div>

            <div class="totalPrice mt-3">
                <span id="shippingFee" style="display: none">Shipping Fee: $10.00</span>
                <h2 class="TP">Total Price:</h2>
                <h3 class="value">₱<span id="total"><?= $price ?></span></h3>
                <input type="hidden" name="total_data" id="totalInput" value="<?= $price ?>">
                <button class="btn btn-primary" type ="submit" name="proceed1">Proceed</button>
            </div>

    <script src="assets/js/OrderCheckoutSingleOrder.js"></script>

<?php
  }
  if(isset($_POST['checkout'])){

?>

<table class="table">
        <thead style="text-align: center;">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
               
                <?php
                    // if(isset($_POST['addons'])){
                     ?>
               <th scope="col">Addons</th>

                <?php
                    // }
                ?>
                 <th scope="col">Subtotal</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
            require_once "classes/CartModel.php";
            $ProdModel = new ProductModel();
            $cartModel = new CartModel();
            $displayCart = $cartModel->fetchCart($uid);

            foreach ($displayCart as $cart):
                $addonsid = $cart['addons_id'] ?? null;
                $fetchDetails = $cartModel->fetchCartDetails($cart['product_id'], $cart['size_id'], $cart['addons_id']);
                $addonsDetails = $cartModel->FetchAddons($cart['addons_id']);
                $addonsName = $addonsDetails['addons_name'] ?? "None";
                $fetchPrize = $cartModel->fetchPrice($cart['size_id'], $cart['product_id']);
        ?>
            <tr class="product-row">
                <input type="hidden" name="cid[]" value="<?= $uid ?>">
                <td class="center-content">
                        <?php
                    // Assuming $images contains the file path to the image or video
                            if (strpos($fetchDetails['image_url'], '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls="false" style="max-width: 100px; max-height: 100px;">
                        <source src="upload/<?= $fetchDetails['image_url'] ?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="upload/<?= $fetchDetails['image_url'] ?>" alt="" style="max-width: 100px; max-height: 100px;" >
                    <?php
                        }
                    ?>
                </td>
                <td class="center-content"><?= $fetchDetails['product_name'] ?></td>
                <input type="hidden" name="product_id_data[]" value="<?= $cart['product_id'] ?>">
                <td class="center-content"><?= $fetchDetails['size_name'] ?></td>
                <input type="hidden" name="size_data[]" value="<?= $cart['size_id'] ?>">
               
             
                <td class="center-content"> ₱<span class="product-price" id="product-price"><?= $fetchPrize['price'] ?></span></td>
               <input type="hidden" name="price[]" value="<?= $fetchPrize['price'] ?>">
              
                <td class="center-content"><input type="number" name="quantity[]" class="product-quantity" min="1" step="1" value="1" required style="width:50px;"></td>
               
             
                          <td scope="col"><?= $addonsName ?><span class="product-addons"></span></td>
                          <input type="hidden" name="addons_data[]" value="<?= $addonsid ?>">
                          <!-- <td></td> -->
               
                
                    <td class="center-content" ><span class="product-subtotal" id="product-subtotal"></span></td>
                    <input type="hidden" name="subtotal1[]" class="subtotal-input" id="subtotalInput" value="">
             
                  
                <!-- <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td> -->
            </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>

    <div class="remarks mt-3">
                <h4 class ="Remarks">Remarks</h4>
                <textarea name="remarks" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

            </div>

            <div class="totalPrice mt-3">
                <span id="shippingFee" style="display: none">Shipping Fee: ₱10.00</span>
                <h2 class="TP">Total Price:</h2>
                <h3 class="value"><span id="total"></span></h3>
                <input type="hidden" name="total_data" id="totalInput" value="<?= $fetchPrize['price'] ?>">
                <button class="btn btn-primary" type ="submit" name="proceed2">Proceed</button>
            </div>

<script src="assets/js/OrderCheckoutCart.js"></script>
<?php
 }
?>
          
        </div>
</form>

</div>

    <?php
    include "OrderCheckoutModal.php";
    ?>
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<?php

}
}
?>