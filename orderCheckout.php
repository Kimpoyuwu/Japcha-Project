<?php
    include "c_header.php"; 
?>

<link rel="stylesheet" href="orderCheckout.css">
<!-- Order Checkout -->

    <div class="orderMainCont">
        <div class="detailsCont">
            <div class="userDetails">
                <p>User Details</p>
                <h2>Full Name</h2>
                     <div class="changeName">
                    <p class="name">John Dela Cruz</p>
                    <a class ="change1" href="#">Change</a>
                    </div>

                    <div class="contactNumber">
                    <h2>Contact no.</h2>
                    <p> 09123456789</p>
                    <a class ="change2" href="#">Change</a>
                </div>
            </div>
        </div>

        <div class="deliveryCont">
                <div class="deliveryAddress">
                    <p>Delivery Address</p>
                    <h2> Block 1 Lot 1 Area 1, Dasmarinas, Cavite..</h2>
                    <a class="change3" href="#">Change</a>

                    <div class="MOP">
                        <p>Mode of Payment</p>
                    <script>
                        function selectOnlyOne(checkbox) {
                         var checkboxes = document.getElementsByName('group');
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i] !== checkbox) {
                                    checkboxes[i].checked = false;
                                }
                            }
                        }
                    </script>
                    <div class="option1">

                    <label>
                        <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                        <img src="image/cod.png" alt="">
                        <p>Cash on Delivery</p>
                    </label>
                    </div>
            
                    <div class="option2">
                    <label>
                        <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                        <img src="image/gcash.png" alt="">
                        <p>Gcash</p>
                        <img class="iButton"src="image/iButton.png" alt="">
                    
                        </label>
                     </div>
                     <div class="gcashCode">
                     <a href="#" id="gcashCode">Show Gcash Code</a>
                    </div>
                    
                </div>

        </div>

        <div class="orderCategory">
            <div class="headerSection">
                <p class="category1">Price</p>
                <p class="category2">Quantity</p>
                <p class ="category3">Item Subtotal</p>
            </div>

            <div class="orderlist" id = "preparingOrders">
                <div class="productbg">
                    <img src="image/Mango-shake.png" alt="img">
            </div>

             <div class="prdetails">
                <p class= "pr">Product 1</p>
                <p class= "pr">₱120.00</p>
                <p class= "pr">2</p>
                <p class= "pr">₱270.00</p>
                <input type="checkbox" name="" id="">
        </div>


    </div>
        </div>
    </div>

    


