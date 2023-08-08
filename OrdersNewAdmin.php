<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersNewAdmin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    />

    <div class="orders-new-admin">
      <div class="mdigraph-box"></div>
      <div class="orders-new-admin-child"></div>
      <div class="orders-new-admin-item"></div>
      <div class="rectangle-parent">
        <div class="group-child"></div>
        <div class="group-item"></div>
        <div class="group-inner"></div>
        <div class="parent">
          <b class="b">₱ 200</b>
          <b class="b1">₱ 200</b>
          <b class="b2">₱ 200</b>
        </div>
        <div class="order-00004-parent">
          <div class="order-00004">Order #00004</div>
          <div class="order-00003">Order #00003</div>
          <div class="rectangle-group">
            <div class="rectangle-div"></div>
            <b class="b3">₱ 200</b>
            <div class="order-00001">Order #00001</div>
          </div>
          <div class="order-00002">Order #00002</div>
        </div>
      </div>
      <b class="list-of-orders">List of Orders</b>
      <b class="manage-orders">Manage Orders</b>
      <div class="rectangle-container">
        <div class="frame-child"></div>
        <div class="frame-item"></div>
        <b class="complete" id="completeText">Complete</b>
        <img class="frame-inner" alt="" src="./image/line-8.png" />

        <b class="preparing" id="preparingText">Preparing</b>
        <b class="new">New</b>
        <b class="delivery" id="deliveryText">Delivery</b>
        <img class="line-icon" alt="" src="./image/line-6.png" />

        <img class="frame-child1" alt="" src="./image/line-71.png" />
      </div>
      <div class="frame-div">
        <div class="frame-child2"></div>
        <div class="frame-child3"></div>
        <b class="order-info">Order Info</b>
        <div class="frame-child4"></div>
        <b class="accept-order">Accept order</b>
        <b class="cancel-order">Cancel Order</b>
      </div>
      <div class="group-div">
        <div class="group-child1"></div>
        <div class="div">09123456789</div>
        <div class="block-1-lot">Block 1 lot 1 Phase 1, Paliparan III</div>
        <div class="customer-name">Customer Name</div>
        <div class="line-div"></div>
        <div class="address">Address</div>
        <a
          class="sampleemailgmailcom"
          href="mailto:sampleEmail@gmail.com"
          target="_blank"
          >sampleEmail@gmail.com</a
        >
        <div class="group-child2"></div>
        <div class="email">Email</div>
        <div class="order-no">Order No.</div>
        <div class="div1">#00001</div>
        <div class="group-child3"></div>
      </div>
      <div class="rectangle-parent1">
        <div class="group-child4"></div>
        <div class="sample-sample">sample, sample</div>
        <div class="add-ons">Add-ons</div>
        <div class="x2">x2</div>
        <div class="product-name">Product Name</div>
        <img
          class="material-symbolsimage-outline-icon"
          alt=""
          src="./image/materialsymbolsimageoutline.png"
        />

        <div class="div2">₱ 100</div>
        <div class="rectangle-parent2">
          <div class="group-child5"></div>
          <div class="sample-sample1">sample, sample</div>
          <div class="add-ons1">Add-ons</div>
          <div class="x21">x2</div>
          <div class="product-name1">Product Name</div>
          <img
            class="material-symbolsimage-outline-icon1"
            alt=""
            src="./image/materialsymbolsimageoutline1.png"
          />

          <div class="div3">₱ 100</div>
        </div>
      </div>
      <b class="cash-on-deilvery">Cash on Deilvery</b>
      <b class="b4">₱ 200</b>
    </div>

    <script>
      var completeText = document.getElementById("completeText");
      if (completeText) {
        completeText.addEventListener("click", function (e) {
          window.location.href = "./OrdersCompleteAdmin.html";
        });
      }
      
      var preparingText = document.getElementById("preparingText");
      if (preparingText) {
        preparingText.addEventListener("click", function (e) {
          window.location.href = "./OrdersPreparingAdmin.html";
        });
      }
      
      var deliveryText = document.getElementById("deliveryText");
      if (deliveryText) {
        deliveryText.addEventListener("click", function (e) {
          window.location.href = "./OrdersDeliveryAdmin.html";
        });
      }
      </script>
<?php
      include "adminFooter.php";
?>
