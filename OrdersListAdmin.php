<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersListAdmin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    />

    <div class="orders-list-admin">
      <div class="mdigraph-box1"></div>
      <div class="orders-list-admin-child"></div>
      <div class="orders-list-admin-item"></div>
      <div class="rectangle-parent52">
        <div class="group-child54"></div>
        <div class="group-child55"></div>
        <div class="group-child56"></div>
        <div class="container">
          <b class="b19">₱ 200</b>
          <b class="b20">₱ 200</b>
          <b class="b21">₱ 200</b>
        </div>
        <div class="order-00004-group">
          <div class="order-000045">Order #00004</div>
          <div class="order-000035">Order #00003</div>
          <div class="rectangle-parent53" id="groupContainer1">
            <div class="group-child57"></div>
            <b class="b22">₱ 200</b>
            <div class="order-000015">Order #00001</div>
          </div>
          <div class="order-000025">Order #00002</div>
        </div>
      </div>
      <b class="list-of-orders1">List of Orders</b>
      <b class="manage-orders5">Manage Orders</b>
      <div class="rectangle-parent54">
        <div class="frame-child25"></div>
        <div class="frame-child26"></div>
        <b class="complete9" id="completeText">Complete</b>
        <img class="frame-child27" alt="" src="./image/line-8.png" />

        <b class="preparing5" id="preparingText">Preparing</b>
        <b class="new5">New</b>
        <b class="delivery5" id="deliveryText">Delivery</b>
        <img class="frame-child28" alt="" src="./image/line-6.png" />

        <img class="frame-child29" alt="" src="./image/line-71.png" />
      </div>
      <div class="rectangle-parent55">
        <div class="frame-child30"></div>
        <div class="frame-child31"></div>
        <b class="order-info2">Order Info</b>
        <div class="frame-child32"></div>
        <b class="accept-order1">Accept order</b>
        <b class="cancel-order1">Cancel Order</b>
      </div>
      <div class="rectangle-parent56">
        <div class="group-child58"></div>
        <div class="customer-name2">Customer Name</div>
        <div class="group-child59"></div>
        <div class="address2">Address</div>
        <div class="group-child60"></div>
        <div class="email2">Email</div>
        <div class="order-no2">Order No.</div>
        <div class="group-child61"></div>
      </div>
    </div>

    <script>
      var groupContainer1 = document.getElementById("groupContainer1");
      if (groupContainer1) {
        groupContainer1.addEventListener("click", function (e) {
          window.location.href = "./OrdersNewAdmin.html";
        });
      }
      
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