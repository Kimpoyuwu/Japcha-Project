<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/orders-complete-admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-complete-admin">
      <div class="orders-complete-admin-child"></div>
      <div class="orders-complete-admin-inner">
        <div class="group-wrapper">
          <div class="group-wrapper">
            <div class="group-child1"></div>
            <b class="clear-all">Clear All</b>
          </div>
        </div>
      </div>
      <b class="manage-orders1">Manage Orders</b>
      <div class="rectangle-parent1">
        <div class="group-child2"></div>
        <div class="order-000021">Order #00002</div>
        <div class="completed">completed</div>
      </div>
      <div class="rectangle-parent2">
        <div class="group-child2"></div>
        <div class="order-000021">Order #00001</div>
        <div class="completed1">completed</div>
        <div class="rectangle-parent3">
          <div class="group-child2"></div>
          <div class="order-000041">Order #00004</div>
          <div class="completed2">completed</div>
        </div>
      </div>
      <div class="rectangle-parent4">
        <div class="group-child2"></div>
        <div class="completed3">completed</div>
        <div class="order-000031">Order #00003</div>
      </div>
      <div class="rectangle-parent5">
        <div class="group-child6"></div>
        <b class="remove">Remove</b>
      </div>
      <div class="rectangle-parent6">
        <div class="group-child6"></div>
        <b class="remove">Remove</b>
      </div>
      <div class="rectangle-parent7">
        <div class="group-child6"></div>
        <b class="remove">Remove</b>
      </div>
      <div class="rectangle-parent8">
        <div class="group-child6"></div>
        <b class="remove">Remove</b>
      </div>
      <div class="rectangle-parent9">
        <div class="frame-child5"></div>
        <div class="frame-child6"></div>
        <b class="complete1">Complete</b>
        <b class="preparing1" id="preparingText">Preparing</b>
        <b class="new1" id="newText">New</b>
        <b class="delivery1" id="deliveryText">Delivery</b>
      </div>
    </div>

    <script>
      var preparingText = document.getElementById("preparingText");
      if (preparingText) {
        preparingText.addEventListener("click", function (e) {
          window.location.href = "./orders-preparing-admin.php";
        });
      }
      
      var newText = document.getElementById("newText");
      if (newText) {
        newText.addEventListener("click", function (e) {
          window.location.href = "./orders-list-admin.php";
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
