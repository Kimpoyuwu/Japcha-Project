<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersPreparingAdmin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    />
  </head>
  <body>
    <div class="orders-preparing-admin">
      <div class="orders-preparing-admin-child"></div>
      <div class="rectangle-parent3">
        <div class="frame-child5"></div>
        <div class="frame-child6"></div>
        <b class="complete1" id="completeText">Complete</b>
        <img class="frame-child7" alt="" src="./image/line-8.png" />

        <b class="preparing1">Preparing</b>
        <b class="new1" id="newText">New</b>
        <b class="delivery1" id="deliveryText">Delivery</b>
        <img class="frame-child8" alt="" src="./image/line-6.png" />

        <img class="frame-child9" alt="" src="./image/line-71.png" />
      </div>
      <b class="manage-orders1">Manage Orders</b>
      <img class="group-icon" alt="" src="./image/group.png" />

      <div class="orders-preparing-admin-item"></div>
      <div class="rectangle-parent4">
        <div class="group-child6"></div>
        <b class="b5">₱ 200</b>
        <div class="group-parent">
          <div class="rectangle-parent5">
            <div class="group-child7"></div>
            <b class="remove">Remove</b>
          </div>
          <div class="rectangle-parent6">
            <div class="group-child8"></div>
            <b class="deliver">Deliver</b>
          </div>
        </div>
        <div class="order-000041">Order #00004</div>
      </div>
      <div class="rectangle-parent7">
        <div class="group-child6"></div>
        <b class="b5">₱ 200</b>
        <div class="group-parent">
          <div class="rectangle-parent5">
            <div class="group-child7"></div>
            <b class="remove">Remove</b>
          </div>
          <div class="rectangle-parent6">
            <div class="group-child8"></div>
            <b class="deliver">Deliver</b>
          </div>
        </div>
        <div class="order-000041">Order #00003</div>
      </div>
      <div class="rectangle-parent10">
        <div class="group-child6"></div>
        <b class="b5">₱ 200</b>
        <div class="order-000041">Order #00002</div>
        <div class="group-parent">
          <div class="rectangle-parent5">
            <div class="group-child7"></div>
            <b class="remove">Remove</b>
          </div>
          <div class="rectangle-parent6">
            <div class="group-child8"></div>
            <b class="deliver">Deliver</b>
          </div>
        </div>
      </div>
      <div class="rectangle-parent13" id="groupContainer15">
        <div class="group-child15"></div>
        <b class="b5">₱ 200</b>
        <div class="order-000011">Order #00001</div>
        <div class="group-parent">
          <div class="rectangle-parent5">
            <div class="group-child7"></div>
            <b class="remove">Remove</b>
          </div>
          <div class="rectangle-parent6">
            <div class="group-child8"></div>
            <b class="deliver">Deliver</b>
          </div>
        </div>
      </div>
    </div>

    <script>
      var completeText = document.getElementById("completeText");
      if (completeText) {
        completeText.addEventListener("click", function (e) {
          window.location.href = "./OrdersCompleteAdmin.html";
        });
      }
      
      var newText = document.getElementById("newText");
      if (newText) {
        newText.addEventListener("click", function (e) {
          window.location.href = "./OrdersNewAdmin.html";
        });
      }
      
      var deliveryText = document.getElementById("deliveryText");
      if (deliveryText) {
        deliveryText.addEventListener("click", function (e) {
          window.location.href = "./OrdersDeliveryAdmin.html";
        });
      }
      
      var groupContainer15 = document.getElementById("groupContainer15");
      if (groupContainer15) {
        groupContainer15.addEventListener("click", function (e) {
          window.location.href = "./OrdersInfoAdmin.html";
        });
      }
      </script>
<?php
    include "adminFooter.php";
?>
