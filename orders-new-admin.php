<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/orders-new-admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-new-admin">
      <div class="mdigraph-box1"></div>
      <div class="orders-new-admin-child"></div>
      <div class="rectangle-parent49">
        <div class="group-child49"></div>
        <div class="group-child50"></div>
        <b class="b20">₱200</b>
        <div class="group-child51"></div>
        <b class="b21">₱200</b>
        <div class="container">
          <b class="b22">₱200</b>
        </div>
        <div class="order-00004-group">
          <div class="order-000045">Order #00004</div>
          <div class="order-000035">Order #00003</div>
          <div class="rectangle-parent50">
            <div class="group-child52"></div>
            <div class="order-000015">Order #00001</div>
            <b class="b23">₱200</b>
          </div>
          <div class="order-000025">Order #00002</div>
        </div>
      </div>
      <b class="list-of-orders1">List of Orders</b>
      <div class="rectangle-parent51">
        <div class="frame-child13"></div>
        <div class="frame-child14"></div>
        <b class="order-info2">Order Info</b>
        <div class="frame-child15"></div>
        <b class="accept-order1">Accept order</b>
        <b class="cancel-order1">Cancel Order</b>
        <b class="b24">₱200</b>
        <b class="cash-on-deilvery">Cash on Deilvery</b>
      </div>
      <div class="rectangle-parent52">
        <div class="frame-child16"></div>
        <div class="sample-sample2">sample, sample</div>
        <div class="add-ons2">Add-ons</div>
        <div class="x22">x2</div>
        <div class="product-name2">Product Name</div>
        <img
          class="material-symbolsimage-outline-icon2"
          alt=""
          src="./image/materialsymbolsimageoutline2.png"
        />

        <div class="div1">₱ 100</div>
        <div class="rectangle-parent53">
          <div class="frame-child17"></div>
          <div class="sample-sample3">sample, sample</div>
          <div class="add-ons3">Add-ons</div>
          <div class="x23">x2</div>
          <div class="product-name3">Product Name</div>
          <img
            class="material-symbolsimage-outline-icon3"
            alt=""
            src="./image/materialsymbolsimageoutline3.png"
          />

          <div class="div2">₱ 100</div>
        </div>
      </div>
      <div class="orders-new-admin-inner">
        <div class="frame-wrapper1">
          <div class="frame-wrapper1">
            <div class="sample-parent">
              <div class="sample1">Sample</div>
              <div class="block-1-lot1">
                Block 1 lot 1 Phase 1, Paliparan III
              </div>
              <div class="customer-name2">Customer Name</div>
              <div class="frame-child18"></div>
              <div class="address1">Address</div>
              <div class="frame-child19"></div>
              <div class="email2">Email</div>
              <div class="order-no2">Order No.</div>
              <div class="div3">#00001</div>
              <div class="frame-child20"></div>
              <div class="samplegmailcom1">Sample@gmail.com</div>
            </div>
          </div>
        </div>
      </div>
      <b class="manage-orders5">Manage Orders</b>
      <div class="rectangle-parent54">
        <div class="frame-child21"></div>
        <div class="frame-child22"></div>
        <b class="complete9" id="completeText">Complete</b>
        <b class="preparing5" id="preparingText">Preparing</b>
        <b class="new5">New</b>
        <b class="delivery5" id="deliveryText">Delivery</b>
      </div>
    </div>

    <script>
      var completeText = document.getElementById("completeText");
      if (completeText) {
        completeText.addEventListener("click", function (e) {
          window.location.href = "./orders-complete-admin.php";
        });
      }
      
      var preparingText = document.getElementById("preparingText");
      if (preparingText) {
        preparingText.addEventListener("click", function (e) {
          window.location.href = "./orders-preparing-admin.php";
        });
      }
      
      var deliveryText = document.getElementById("deliveryText");
      if (deliveryText) {
        deliveryText.addEventListener("click", function (e) {
          window.location.href = "./orders-delivery-admin.php";
        });
      }
      </script>
<?php
    include "adminFooter.php";

?>

