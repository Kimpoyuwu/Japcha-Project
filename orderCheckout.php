<?php
    include "c_header.php"; 
?>

<link rel="stylesheet" href="orderCheckout.css">
<!-- Order Checkout -->

<div class="orderMainCont">
    <div class="detailsCont">
        <div class="userDetails">
            <h1>USER DETAILS</h1> <br>
            <p>Full Name</p><br>
            <h2>Juan Dela Cruz</h2>
            <a href="#">Change</a>

            <p>Contact Number</p><br>
            <h2>09123456789</h2>
            <a href="#">Change</a>
        </div>

        <div class="deliveryCont">
            <p>Delivery Address</p><br>
            <h2>Block 1 Lot 1 Area 1, Dasmarinas, Cavite..</h2>
            <a href="#">Change</a>

            <p>Mode of Payment</p><br>

            <label>
                <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                <img src="image/cod.png" alt="">
                <p>Cash on Delivery</p>

                <input type="checkbox" name="group" onclick="selectOnlyOne(this)">
                    <img src="image/gcash.png" alt="">
                    <img class="iButton"src="image/iButton.png" alt="">
                    <p>Gcash</p>
                    <a href="#" id="gcashCode">Show Gcash Code</a>
            </label>
            
            
            
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
    


