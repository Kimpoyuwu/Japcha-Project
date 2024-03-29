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
    <form action="includes/OrderInc.php" method ="POST"  enctype="multipart/form-data" id="FormCheckout">
    
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
                        <div class="pickup">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pickup-checkbox" name="group[payment][pickup]" >
                                <i class="fa fa-street-view" aria-hidden="true"></i>
                                <p class="form-check-label">Pick Up</p>
                            </div>
                        </div>

                        <div class="cod">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="cod-checkbox" name="group[payment][cod]"  onclick="selectOnlyOne(this)">
                                <!-- <img src="image/cod.png" alt=""> -->
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <p class="form-check-label">Cash on Delivery</p>
                            </div>
                        </div>

                        <div class="gcash">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gcash-checkbox" name="group[payment][gcash]" onclick="selectOnlyOne(this)">
                                <div class="gcashtitle">
                                    <strong>G-CASH</strong>
                                    
                                    <input class="form-control-file" type="file" accept="image/*" name="gcash_payment_upload" id="gcash_payment">
                                </div>
                               

                                <!-- <input class="form-control-file" type="file" accept="image/*" name="gcash_payment_upload" id="gcash_payment"> -->
                            </div>
                        </div>
                        <!-- <div class="modal fade" id="gcashQRCodeModal" tabindex="-1" role="dialog" aria-labelledby="gcashQRCodeModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="gcashQRCodeModalLabel">GCash QR Code</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Add the QR code image here -->
                                        <!-- <input class="form-control-file" type="file" accept="image/*" name="gcash_payment_upload" id="gcash_payment">
                                    </div>
                                    <div class="modal-body">
                                    <a class="modal-gcash" id="changeModalLabel">Upload Proof of Payment Here</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" >Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>  -->
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
                $quantity = $_POST['quantity'];
           
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
                
                     ?>
               <th scope="col">Addons</th>

                <?php
                    
                ?>
                 <th scope="col">Subtotal</th>
                 <th scope="col">Remarks</th>
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
                <input type="hidden" name="p_name" value="<?=  $prodname ?>">
                <?php
                    $getSizeName =  $productModel->getOneSize($sizeid);
                    if ($getSizeName !== false) {
                        $sizename = $getSizeName;
                ?>
                <td class="center-content"><?=  $sizename ?></td>
                <input type="hidden" name="size_name" value="<?=  $sizename ?>">
                <?php
                    }
                ?>
                <?php
                 $getprice =  $productModel->getPriceBySize($sizeid, $prodID);
                
                 if ($getprice !== false) {
                    $price = $getprice;
                ?>
                <td class="center-content">₱<span id="price"><?=  $price ?></span></td>
                <input type="hidden" name="product_price" value="<?=  $price ?>">
               
                <?php
                 }
                ?>
                <td class="center-content"><input type="number" name="quantity" id="quantity" min="1" step="1" value="<?=  $quantity ?>" required style="width:50px;"></td>
               
                 <?php
                    // $ddson = 0;
                   
                     $ddson = $_POST['addons'] ?? null;
                    include_once "classes/add-addons.classes.php";
                    $addonsModel = new addAddons();
                    $dataAdds =  $addonsModel->getOneAddons($ddson);
               
                        $addonsName = $dataAdds['addons_name'] ?? "none";
                        $addonsPrice = $dataAdds['price']?? null;
                    
                     ?>
                          <td scope="col"><?= $addonsName ?><span id="addonsPrice"><?= $addonsPrice ?></span></td>
                          <input type="hidden" name="addons_data" value="<?= $ddson ?>">
                          <input type="hidden" name="addons_name" value="<?= $addonsName ?>">
                          <input type="hidden" name="addons_price" value="<?= $addonsPrice ?>">
                          <!-- <td></td> -->
                <!-- <?php
                         
                    
                ?> -->
            
            
                    <td class="center-content" >₱<span id="subtotal"></span></td>
                    <input type="hidden" name="subtotal1" id="subtotalInput">
              
                  <td class="center-content" ><textarea name="prd_remark" id="" rows="2" placeholder="Optional..." style="padding: 5px;"></textarea></td>
                <!-- <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td> -->
            </tr>
        </tbody>
    </table>

            <div class="remarks mt-3">
                        <h4 class ="Remarks">Remarks</h4>
                        <textarea name="remarks" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Optional..."></textarea>

            </div>

            <div class="totalPrice mt-3">
                <span id="shippingFee" style="display: none">Shipping Fee: ₱10.00</span>
                <h2 class="TP">Total Price:</h2>
                <h3 class="value">₱<span id="total"><?= $price ?></span></h3>
                <input type="hidden" name="total_data" id="totalInput">
                <button class="btn btn-primary" type ="submit" name="proceed1">Proceed</button>
            </div>

    <!-- <script src="assets/js/OrderCheckoutSingleOrder.js"></script> -->
    <script>
     $(document).ready(function() {
    // Get references to the quantity input, price, and subtotal elements
    const quantityInput = $("#quantity");
    const addonsInput = $("#addonsPrice"); // Assuming this is the element displaying addons price
    const priceElement = $("#price");
    const subtotalElement = $("#subtotal");
    const totalElement = $("#total");
    
    $('#gcash-checkbox').on('click', function() {
    // Get the file input element
    const gcashPaymentUpload = $('#gcash_payment');

    // Check if the checkbox is checked
    if (this.checked) {
        // Set the 'required' attribute for the file input
        gcashPaymentUpload.attr('required', 'required');
    } else {
        // Remove the 'required' attribute for the file input
        gcashPaymentUpload.removeAttr('required');
    }
});
    // Function to calculate subtotal
    function calculateSubtotal() {
      const quantity = parseInt(quantityInput.val(), 10);
      let subtotal = 0;
    
      if (quantity < 1 || isNaN(quantity)) {
        quantityInput.val(1); // Reset to 1 if less than 1 or empty
      }
  
      const price = parseFloat(priceElement.text());
  
      let addonsTotal = 0;
      if (addonsInput !== null) {
        addonsTotal = parseFloat(addonsInput.text()) || 0;
      }
  
      subtotal = (quantity * price + addonsTotal).toFixed(2);
      subtotalElement.text(subtotal);
      $("#subtotalInput").val(subtotal);
  
      let total = parseFloat(subtotal);
  
      if ($('#cod-checkbox').is(':checked')) {
        total = (total + 10).toFixed(2); // Add a shipping fee of 10 if the checkbox is checked
      }
      if ($('#gcash-checkbox').is(':checked')) {
        total = (total + 10).toFixed(2); // Add a shipping fee of 10 if the checkbox is checked
      }
  
      // Update the total again after adding shipping fees
      totalElement.text(total);
      $("#totalInput").val(total);
    }
  
    // Calculate and display subtotal when the page loads
    calculateSubtotal();
  
    // Add event listeners to listen for changes to the inputs
    quantityInput.on("input", calculateSubtotal);
    $('#cod-checkbox').on('change', calculateSubtotal);
    $('#gcash-checkbox').on('change', calculateSubtotal);

    $('#FormCheckout').submit(function (event) {
        // Check if at least one checkbox is checked
        const atLeastOneChecked = $('input[name="group[payment][gcash]"]:checked, input[name="group[payment][cod]"]:checked,input[name="group[payment][pickup]"]:checked').length > 0;

        // If none are checked, prevent form submission
        if (!atLeastOneChecked) {
            alert('Please select at least one payment method.');
            event.preventDefault(); // Prevent the form from being submitted
        }
        // Otherwise, the form will be submitted
    });
    

});

function selectOnlyOne(checkbox) {
    const shippingFeeElement = $("#shippingFee");

    // Uncheck other checkboxes
    $('input[name="group[payment][gcash]"], input[name="group[payment][cod]"]').not(checkbox).prop('checked', false);

    // Update the visibility of the shipping fee based on the selected checkbox
    if (checkbox.checked) {
        shippingFeeElement.css('display', 'inline');
    } else {
        shippingFeeElement.css('display', 'none');
    }

    // Recalculate the total when a checkbox is selected/unselected
    calculateTotal();
}
  

    </script>

<?php
  }
  if(isset($_POST['buyNowFromCart'])){

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
                 <th scope="col">Product Remarks</th>
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
                // $addonsDetails = $cartModel->FetchAddons($cart['addons_id']);
                $addonsName = $cart['addons_name'] ?? "";
                $addonsPrice = $cart['addons_price'] ?? "";
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
                <td class="center-content"><?= $cart['product_name'] ?></td>
                <input type="hidden" name="product_id_data[]" value="<?= $cart['product_id'] ?>">
                <input type="hidden" name="p_name[]" value="<?= $cart['product_name'] ?>">
                <td class="center-content"><?= $fetchDetails['size_name'] ?></td>
                <input type="hidden" name="size_name[]" value="<?= $fetchDetails['size_name'] ?>">
                <input type="hidden" name="size_data[]" value="<?= $cart['size_id'] ?>">
               
             
                <td class="center-content"> ₱<span class="product-price" id="product-price"><?= $cart['product_price'] ?></span></td>
               <input type="hidden" name="product_price[]" value="<?= $fetchPrize['price'] ?>">
              
                <td class="center-content"><input type="number" name="quantity[]" class="product-quantity" min="1" step="1" value="<?= $cart['quantity'] ?>" required style="width:50px;"></td>
               
             
                          <td scope="col"><?= $addonsName ?> <span class="addons-price" id="addonsPrice"><?= $addonsPrice ?></td>
                          <input type="hidden" name="addons_data[]" value="<?= $addonsid ?>">
                          <input type="hidden" name="addons_name[]" value="<?= $addonsName ?>">
                          <input type="hidden" name="addons_price[]" value="<?= $addonsPrice ?>">
                          <!-- <td></td> -->
               
                
                    <td class="center-content" ><span class="product-subtotal" id="product-subtotal"></span></td>
                    <input type="hidden" name="subtotal1[]" class="subtotal-input" id="subtotalInput" value="">
                    <td class="center-content" ><textarea name="prd_remark[]" id="" rows="2" placeholder="Optional..." style="padding: 5px;"></textarea></td>
                  
                <!-- <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td> -->
            </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>

    <div class="remarks mt-3">
                <h4 class ="Remarks">Remarks</h4>
                <textarea name="remarks" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Optional..."></textarea>

            </div>

            <div class="totalPrice mt-3">
                <span id="shippingFee" style="display: none">Shipping Fee: ₱10.00</span>
                <h2 class="TP">Total Price:</h2>
                <h3 class="value"><span id="total"></span></h3>
                <input type="hidden" name="total_data" id="totalInput" value="<?= $fetchPrize['price'] ?>">
                <button class="btn btn-primary" type ="submit" name="proceed2">Proceed</button>
            </div>

<!-- <script src="assets/js/OrderCheckoutCart.js"></script> -->
<script>
    $(document).ready(function() {

        $('#gcash-checkbox').on('click', function() {
    // Get the file input element
    const gcashPaymentUpload = $('#gcash_payment');

    // Check if the checkbox is checked
    if (this.checked) {
        // Set the 'required' attribute for the file input
        gcashPaymentUpload.attr('required', 'required');
    } else {
        // Remove the 'required' attribute for the file input
        gcashPaymentUpload.removeAttr('required');
    }
});
    // Function to calculate the total
    function calculateTotal() {
      let total = 0;
  
      // Iterate through each product row
      $('.product-row').each(function() {
        const price = parseFloat($(this).find('.product-price').text());
        const quantity = parseInt($(this).find('.product-quantity').val(), 10);
        const addonsPrice = parseFloat($(this).find('.addons-price').text()); // Get addons price
        const subtotal = (price * quantity + addonsPrice).toFixed(2);
        $(this).find('.product-subtotal').text('₱' + subtotal);
       
        total += parseFloat(subtotal);
      
  
        $(this).find('.subtotal-input').val(subtotal);
      });
  
      // Check if the "Cash on Delivery" checkbox is checked
      if ($('#cod-checkbox').is(':checked')) {
        total += 10; // Add a shipping fee of 10 if the checkbox is checked
      }
      if ($('#gcash-checkbox').is(':checked')) {
        total += 10; // Add a shipping fee of 10 if the checkbox is checked
      }
  
      $('#totalInput').val(total);
   
      // Update the total in the HTML
      $('#total').text('₱' + total.toFixed(2));
    }
  
    // Calculate and display the total when the page loads
    calculateTotal();
  
    // Add an event listener to listen for changes to the input (quantity)
    $('.product-quantity').on('input', calculateTotal);
    $('#cod-checkbox').on('change', calculateTotal);
    $('#gcash-checkbox').on('change', calculateTotal);

    $('#FormCheckout').submit(function (event) {
        // Check if at least one checkbox is checked
        const atLeastOneChecked = $('input[name="group[payment][gcash]"]:checked, input[name="group[payment][cod]"]:checked').length > 0;

        // If none are checked, prevent form submission
        if (!atLeastOneChecked) {
            alert('Please select at least one payment method.');
            event.preventDefault(); // Prevent the form from being submitted
        }
        // Otherwise, the form will be submitted
    });
    
  });
  
  function selectOnlyOne(checkbox) {
    const shippingFeeElement = $("#shippingFee");

    // Uncheck other checkboxes
    $('input[name="group[payment][gcash]"], input[name="group[payment][cod]"]').not(checkbox).prop('checked', false);

    // Update the visibility of the shipping fee based on the selected checkbox
    if (checkbox.checked) {
        shippingFeeElement.css('display', 'inline');
    } else {
        shippingFeeElement.css('display', 'none');
    }

    // Recalculate the total when a checkbox is selected/unselected
    calculateTotal();
}
  
  
</script>
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