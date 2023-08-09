<?php
    include "adminHeader.php";
?>    
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/orders-list-admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-list-admin">
      <div class="mdigraph-box"></div>
      <div class="orders-list-admin-child"></div>
      <div class="rectangle-parent">
        <div class="group-child"></div>
        <div class="group-item"></div>
        <b class="b">₱200</b>
        <div class="group-inner"></div>
        <b class="b1">₱200</b>
        <div class="wrapper">
          <b class="b2">₱200</b>
        </div>
        <div class="order-00004-parent">
          <div class="order-00004">Order #00004</div>
          <div class="order-00003">Order #00003</div>
          <div class="rectangle-group" id="groupContainer1">
            <div class="rectangle-div"></div>
            <div class="order-00001">Order #00001</div>
            <b class="b3">₱200</b>
          </div>
          <div class="order-00002">Order #00002</div>
        </div>
      </div>
      <b class="list-of-orders">List of Orders</b>
      <div class="rectangle-container">
        <div class="frame-child"></div>
        <div class="frame-item"></div>
        <b class="order-info">Order Info</b>
        <div class="frame-inner"></div>
        <b class="accept-order">Accept order</b>
        <b class="cancel-order">Cancel Order</b>
      </div>
      <div class="orders-list-admin-inner">
        <div class="frame-wrapper">
          <div class="frame-wrapper">
            <div class="customer-name-parent">
              <div class="customer-name">Customer Name</div>
              <div class="line-div"></div>
              <div class="address">Address</div>
              <div class="frame-child1"></div>
              <div class="email">Email</div>
              <div class="order-no">Order No.</div>
              <div class="frame-child2"></div>
            </div>
          </div>
        </div>
      </div>
      <b class="manage-orders">Manage Orders</b>
      <div class="frame-div">
        <div class="frame-child3"></div>
        <div class="frame-child4"></div>
        <b class="complete" id="completeText">Complete</b>
        <b class="preparing" id="preparingText">Preparing</b>
        <b class="new">New</b>
        <b class="delivery" id="deliveryText">Delivery</b>
      </div>
    </div>

    <script>
      var groupContainer1 = document.getElementById("groupContainer1");
      if (groupContainer1) {
        groupContainer1.addEventListener("click", function (e) {
          window.location.href = "./orders-new-admin.php";
        });
      }
      
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

