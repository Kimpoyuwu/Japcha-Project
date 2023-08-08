<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersDeliveryAdmin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-delivery-admin">
      <div class="orders-delivery-admin-child"></div>
      <div class="rectangle-parent33">
        <div class="frame-child15"></div>
        <div class="frame-child16"></div>
        <b class="complete3" id="completeText">Complete</b>
        <img class="frame-child17" alt="" src="./image/line-8.png" />

        <b class="preparing3" id="preparingText">Preparing</b>
        <b class="new3" id="newText">New</b>
        <b class="delivery3">Delivery</b>
        <img class="frame-child18" alt="" src="./image/line-6.png" />

        <img class="frame-child19" alt="" src="./image/line-71.png" />
      </div>
      <div class="orders-delivery-admin-item"></div>
      <div class="rectangle-parent34">
        <div class="group-child37"></div>
        <b class="b15">₱ 200</b>
        <div class="order-000013">Order #00001</div>
        <div class="group-wrapper">
          <div class="rectangle-parent35">
            <div class="group-child38"></div>
            <b class="complete4">Complete</b>
          </div>
        </div>
        <div class="rectangle-parent36">
          <div class="group-child39"></div>
          <div class="group-frame">
            <div class="rectangle-parent35">
              <div class="group-child38"></div>
              <b class="complete4">Complete</b>
            </div>
          </div>
          <b class="b16">₱ 200</b>
          <div class="order-000043">Order #00004</div>
        </div>
      </div>
      <b class="manage-orders3">Manage Orders</b>
      <div class="rectangle-parent38">
        <div class="group-child39"></div>
        <div class="group-frame">
          <div class="rectangle-parent35">
            <div class="group-child38"></div>
            <b class="complete4">Complete</b>
          </div>
        </div>
        <b class="b16">₱ 200</b>
        <div class="order-000043">Order #00002</div>
      </div>
      <div class="rectangle-parent40">
        <div class="group-child39"></div>
        <div class="group-frame">
          <div class="rectangle-parent35">
            <div class="group-child38"></div>
            <b class="complete4">Complete</b>
          </div>
        </div>
        <b class="b16">₱ 200</b>
        <div class="order-000043">Order #00003</div>
      </div>
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
      
      var newText = document.getElementById("newText");
      if (newText) {
        newText.addEventListener("click", function (e) {
          window.location.href = "./OrdersNewAdmin.html";
        });
      }
      </script>

<?php
    include "adminFooter.php";
?>