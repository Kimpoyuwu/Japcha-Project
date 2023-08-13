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

        <div class="deliveryCont">
            <div class="address">
                <p>Delivery Address</p>
                <h2>Block 1 Lot 1 Area 1, Dasmarinas, Cavite..</h2>
            </div>
            <a href="#">Change</a>


            <p>Mode of Payment</p>
            
            <div class="mod">
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
    


