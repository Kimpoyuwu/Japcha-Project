<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/orders-info-admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"/>

    <div class="orders-info-admin">
      <b class="manage-orders3">Manage Orders</b>
      <div class="orders-info-admin-child"></div>
      <div class="rectangle-parent19">
        <div class="group-child18"></div>
        <div class="rectangle-parent20">
          <div class="group-child19"></div>
          <b class="deliver">Deliver</b>
        </div>
        <b class="b8">₱ 200</b>
        <div class="order-000043">Order #00004</div>
        <div class="rectangle-parent21">
          <div class="group-child20"></div>
          <b class="remove4">Remove</b>
        </div>
      </div>
      <div class="rectangle-parent22">
        <div class="group-child18"></div>
        <b class="b9">₱ 200</b>
        <div class="order-000033">Order #00003</div>
      </div>
      <div class="rectangle-parent23">
        <div class="group-child18"></div>
        <b class="b9">₱ 200</b>
        <div class="order-000033">Order #00002</div>
        <div class="group-parent">
          <div class="rectangle-parent24">
            <div class="group-child20"></div>
            <b class="remove4">Remove</b>
          </div>
          <div class="rectangle-parent25">
            <div class="group-child19"></div>
            <b class="deliver">Deliver</b>
          </div>
        </div>
      </div>
      <div class="rectangle-parent26">
        <div class="group-child25"></div>
        <b class="b9">₱ 200</b>
        <div class="order-000013">Order #00001</div>
        <div class="group-container">
          <div class="rectangle-parent27">
            <div class="group-child26"></div>
            <b class="remove4">Remove</b>
          </div>
        </div>
      </div>
      <div class="parent">
        <b class="b12">₱ 200</b>
        <div class="rectangle-parent28">
          <div class="group-child27"></div>
          <div class="rectangle-parent29">
            <div class="group-child28"></div>
            <img
              class="material-symbolsimage-outline-icon"
              alt=""
              src="./image/materialsymbolsimageoutline.png"
            />
          </div>
          <b class="order-info1">Order Info</b>
          <div class="rectangle-parent30">
            <div class="group-child29"></div>
            <div class="block-1-lot">Block 1 lot 1 Phase 1, Paliparan III</div>
            <div class="sample">Sample</div>
            <div class="samplegmailcom">Sample@gmail.com</div>
            <div class="group-child30"></div>
            <div class="group-child31"></div>
            <div class="group-child32"></div>
          </div>
          <div class="rectangle-parent31">
            <div class="group-child33"></div>
            <img
              class="material-symbolsimage-outline-icon1"
              alt=""
              src="./image/materialsymbolsimageoutline1.png"
            />

            <b class="add-ons">Add-ons</b>
          </div>
        </div>
        <img
          class="material-symbolscancel-outlin-icon"
          alt=""
          src="./image/materialsymbolscanceloutline.png"
          id="materialSymbolscancelOutlinIcon"
        />

        <b class="order-no1">Order No.</b>
        <b class="email1">Email</b>
        <b class="adddress">Adddress</b>
        <b class="customer-name1">Customer Name</b>
        <b class="cash-on-delivery">Cash on Delivery</b>
        <b class="b13">₱200</b>
        <b class="b14">₱100</b>
        <b class="sample-sample">Sample, Sample</b>
        <b class="sample-sample1">Sample, Sample</b>
        <b class="product-name">Product Name</b>
        <b class="product-name1">Product Name</b>
        <b class="x2">x2</b>
        <b class="x21">x2</b>
        <b class="add-ons1">Add-ons</b>
        <b class="b15">₱100</b>
      </div>
      <div class="div">#00001</div>
      <div class="rectangle-parent32">
        <div class="group-child19"></div>
        <b class="deliver">Deliver</b>
      </div>
      <div class="rectangle-parent33">
        <div class="group-child19"></div>
        <b class="deliver">Deliver</b>
      </div>
      <div class="rectangle-parent34">
        <div class="group-child20"></div>
        <b class="remove4">Remove</b>
      </div>
      <div class="rectangle-parent35">
        <div class="frame-child9"></div>
        <div class="frame-child10"></div>
        <b class="complete7" id="completeText">Complete</b>
        <b class="preparing3">Preparing</b>
        <b class="new3" id="newText">New</b>
        <b class="delivery3" id="deliveryText">Delivery</b>
      </div>
    </div>

    <script>
      var materialSymbolscancelOutlinIcon = document.getElementById(
        "materialSymbolscancelOutlinIcon"
      );
      if (materialSymbolscancelOutlinIcon) {
        materialSymbolscancelOutlinIcon.addEventListener("click", function (e) {
          window.location.href = "./orders-preparing-admin.php";
        });
      }
      
      var completeText = document.getElementById("completeText");
      if (completeText) {
        completeText.addEventListener("click", function (e) {
          window.location.href = "./orders-complete-admin.php";
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
          window.location.href = "./orders-delivery-admin.html";
        });
      }
      </script>
<?php
    include "adminFooter.php";

?>
