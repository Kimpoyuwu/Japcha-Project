<?php
include "c_header.php";
?>

<link rel="stylesheet" href="orderstatus.css">
<div class="orderpage">
    <div class="orderstat">
        <div class="orderbar">
            <a href="#" id="preparingBtn" class = "nav">Preparing</a>
            <a href="#" id="shippingBtn" class = "nav">To Ship</a>
            <a href="#" id="shippingBtn" class = "nav">To Receive</a>
            <a href="#" id="shippingBtn" class = "nav">To Review</a>
            <a href="#" id="shippingBtn" class = "nav">Return & Cancel</a>
            <hr>

            <div class="cat">
                <p class = "catt1">Order No.</p>
                <p class = "catt2">Price</p>
                <p class = "catt3">Quantity</p>
                <p class = "catt4">Sub Total</p>
            </div>
        </div>
    </div>

    <div class="orderlist" id = "preparingOrders">
        <div class="productbg">
            <img src="image/Mango-shake.png" alt="img">
        </div>

        <div class="prdetails">
            <p class= "pr">#00001</p>
            <p class= "pr">₱120.00</p>
            <p class= "pr">2</p>
            <p class= "pr">₱270.00</p>
            <a href="#" >Cancel</a>
        </div>


    </div>

    <!-- <div class="orderlist" id = "shippingOrders">
        <div class="productbg">
            <img src="image/Mango-shake.png" alt="img">
        </div>

        <div class="prdetails">
            <p class= "pr">#00001</p>
            <p class= "pr">₱120.00</p>
            <p class= "pr">2</p>
            <p class= "pr">₱270.00</p>
            <a href="#" >Cancel</a>
        </div> -->


    </div>
</div>

<div class="terms">
    <p>If you wish to cancel an order Please Read our Cancellation</p> <br>
    <a href="#">Terms & Condition</a>
</div>

<script>
  const preparingBtn = document.getElementById("preparingBtn");
  const shippingBtn = document.getElementById("shippingBtn");
  const preparingOrders = document.getElementById("preparingOrders");
  const shippingOrders = document.getElementById("shippingOrders");

  preparingBtn.addEventListener("click", () => {
    
    shippingOrders.style.display = "none";


    
  });

  shippingBtn.addEventListener("click", () => {
    preparingOrders.style.display = "none";

  });
</script>

<?php
include "c_footer.php";
?>