<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/orders-delivery-admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-delivery-admin">
      <div class="orders-delivery-admin-child"></div>
      <div class="rectangle-parent10">
        <div class="group-child10"></div>
        <b class="b4">₱200</b>
        <div class="rectangle-parent11">
          <div class="group-child11"></div>
          <b class="complete2">Complete</b>
        </div>
        <div class="order-000012">Order #00001</div>
        <div class="rectangle-parent12">
          <div class="group-child12"></div>
          <div class="order-000042">Order #00004</div>
          <div class="rectangle-parent13">
            <div class="group-child11"></div>
            <b class="complete2">Complete</b>
          </div>
          <b class="b5">₱200</b>
        </div>
      </div>
      <b class="manage-orders2">Manage Orders</b>
      <div class="rectangle-parent14">
        <div class="group-child12"></div>
        <div class="rectangle-parent15">
          <div class="group-child11"></div>
          <b class="complete2">Complete</b>
        </div>
        <div class="order-000022">Order #00002</div>
        <b class="b5">₱200</b>
      </div>
      <div class="rectangle-parent16">
        <div class="group-child12"></div>
        <div class="rectangle-parent15">
          <div class="group-child11"></div>
          <b class="complete2">Complete</b>
        </div>
        <div class="order-000032">Order #00003</div>
        <b class="b5">₱200</b>
      </div>
      <div class="rectangle-parent18">
        <div class="frame-child7"></div>
        <div class="frame-child8"></div>
        <b class="complete6" id="completeText4">Complete</b>
        <b class="preparing2" id="preparingText">Preparing</b>
        <b class="new2" id="newText">New</b>
        <b class="delivery2">Delivery</b>
      </div>
    </div>

    <script>
      var completeText4 = document.getElementById("completeText4");
      if (completeText4) {
        completeText4.addEventListener("click", function (e) {
          window.location.href = "./orders-complete-admin.php";
        });
      }
      
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
      </script>
<?php
    include "adminFooter.php";

?>
