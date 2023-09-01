<?php
    include "c_header.php"; 
?>

<link rel="stylesheet" href="orderCheckout.css">

<!-- Order Checkout -->

<div class="orderMainCont">
    
    <div class="title">
        <h1>USER DETAILS</h1> <br>
    </div>
    
    <div class="detailsCont">
        <div class="userDetails">
            <div class="name">

                <div class="name1">
                    <p>Full Name</p>
                    <h2>Juan Dela Cruz</h2>
                </div>

                <a href="#">Change</a>
            </div>

            <div class="contact">
                <div class="cont">
                    <p>Contact Number</p>
                    <h2>09123456789</h2>
                </div>

                <a href="#">Change</a>
            </div>

        </div>

        <div class="addcont"> 
            <div class="deliveryCont">
                <div class="address">
                    <p>Delivery Address</p>
                    <h2>Block 1 Lot 1 Area 1, Dasmarinas, Cavite..</h2>
                </div>
                <a href="#">Change</a>
            </div>

        <p class = "moptitle">Mode of Payment</p>
        <div class="modcont">
            <div class="cod">

                <label>
                    <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                    <img src="image/cod.png" alt="">
                    <p>Cash on Delivery</p>
                </label>

                     
            </div>
        
            <div class="gcash">
                <label>  
                    <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                        <img src="image/gcash.png" alt="">
                            
                        <div class="gcashtitle">
                            <p>Gcash</p>
                            <a href="#" id="gcashCode">Show Gcash Code</a>
                        </div>
                            
                </label>
            </div>
                        
                        
                        
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
            
        </div>
        

    </div>
           
            
</div>

<!--Container for Product Details -->

<div class="prodDetails">

         <div class="hr">
            <hr>
         </div>

         <div class="orderCategory">
                <p class ="cat1">Price</p>
                <p class ="cat2">Quantity</p>
                <p class ="cat3">Item Subtotal</p>
    
            </div> 
    
    <div class="orderlist">


            <div class="productbg">
                <img src="image/Mango-shake.png" alt="img">
            </div>

                <div class="prdetails">
                    <p class= "pr">Product 1</p>
                    <p class= "pr">₱120.00</p>
                    <p class= "pr">2</p>
                    <p class= "pr">₱240.00</p>
                    <input type="checkbox" name="" id="">
                </div>

    </div>

    <div class="orderlist1">

            <div class="productbg">
                <img src="image/Mango-shake.png" alt="img">
            </div>
            
                 <div class="prdetails">
                    <p class= "pr">Product 2</p>
                    <p class= "pr">₱120.00</p>
                    <p class= "pr">2</p>
                    <p class= "pr">₱240.00</p>
                    <input type="checkbox" name="" id="">
                </div>
    </div>


        <div class="remarks">
             <p>Remarks</p>
             <input type="text" name="" id="">
        </div>

        
        <div class="totalPrice">
            <p class ="TP">Total Price:</p>
            <p class ="value">480.00</p>
            <button onclick="goToPage()">Proceed</button>

            <script>
                function goToPage(){
                    window.location.href ="orderStatus.php";
                }
            </script>
        </div>
</div>

