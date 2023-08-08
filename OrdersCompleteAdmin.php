<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersCompleteAdmin.css" />
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>
 
    <div class="orders-complete-admin">
      <div class="orders-complete-admin-child"></div>
      <div class="orders-complete-admin-item"></div>
      <div class="rectangle-parent42">
        <div class="frame-child20"></div>
        <div class="frame-child21"></div>
        <b class="complete8">Complete</b>
        <img class="frame-child22" alt="" src="./image/line-8.png" />

        <b class="preparing4" id="preparingText">Preparing</b>
        <b class="new4" id="newText">New</b>
        <b class="delivery4" id="deliveryText">Delivery</b>
        <img class="frame-child23" alt="" src="./image/line-6.png" />

        <img class="frame-child24" alt="" src="./image/line-71.png" />
      </div>
      <div class="orders-complete-admin-inner">
        <div class="group-wrapper3">
          <div class="group-wrapper3">
            <div class="group-child45"></div>
            <b class="clear-all">Clear All</b>
          </div>
        </div>
      </div>
      <b class="manage-orders4">Manage Orders</b>
      <div class="rectangle-parent44">
        <div class="group-child46"></div>
        <div class="order-000024">Order #00002</div>
        <div class="completed">completed</div>
        <div class="group-wrapper4">
          <div class="rectangle-parent45">
            <div class="group-child47"></div>
            <b class="remove8">Remove</b>
          </div>
        </div>
      </div>
      <div class="rectangle-parent46">
        <div class="group-child46"></div>
        <div class="order-000014">Order #00001</div>
        <div class="completed">completed</div>
        <div class="group-wrapper5">
          <div class="rectangle-parent45">
            <div class="group-child47"></div>
            <b class="remove8">Remove</b>
          </div>
        </div>
        <div class="rectangle-parent48">
          <div class="group-child46"></div>
          <div class="group-wrapper5">
            <div class="rectangle-parent45">
              <div class="group-child47"></div>
              <b class="remove8">Remove</b>
            </div>
          </div>
          <div class="order-000044">Order #00004</div>
          <div class="completed2">completed</div>
        </div>
      </div>
      <div class="rectangle-parent50">
        <div class="group-child46"></div>
        <div class="group-wrapper5">
          <div class="rectangle-parent45">
            <div class="group-child47"></div>
            <b class="remove8">Remove</b>
          </div>
        </div>
        <div class="completed3">completed</div>
        <div class="order-000034">Order #00003</div>
      </div>
    </div>

    <script>
      var preparingText = document.getElementById("preparingText");
      if (preparingText) {
        preparingText.addEventListener("click", function (e) {
          window.location.href = "./OrdersPreparingAdmin.html";
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

<?php
    include "adminFooter.php";
?>