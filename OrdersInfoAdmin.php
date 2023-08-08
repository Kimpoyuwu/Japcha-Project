<?php
    include "adminHeader.php";
?>
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/OrdersInfoAdmin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    />

    <div class="orders-info-admin">
      <div class="orders-info-admin-child"></div>
      <div class="rectangle-parent16">
        <div class="frame-child10"></div>
        <div class="frame-child11"></div>
        <b class="complete2" id="completeText">Complete</b>
        <img class="frame-child12" alt="" src="./image/line-8.png" />

        <b class="preparing2">Preparing</b>
        <b class="new2" id="newText">New</b>
        <b class="delivery2" id="deliveryText">Delivery</b>
        <img class="frame-child13" alt="" src="./image/line-6.png" />

        <img class="frame-child14" alt="" src="./image/line-71.png" />
      </div>
      <b class="manage-orders2">Manage Orders</b>
      <img class="group-icon1" alt="" src="./image/group1.png" />

      <div class="orders-info-admin-item"></div>
      <div class="rectangle-parent17">
        <div class="group-child18"></div>
        <b class="b9">₱ 200</b>
        <div class="group-parent3">
          <div class="rectangle-parent18">
            <div class="group-child19"></div>
            <b class="remove4">Remove</b>
          </div>
          <div class="rectangle-parent19">
            <div class="group-child20"></div>
            <b class="deliver4">Deliver</b>
          </div>
        </div>
        <div class="order-000042">Order #00004</div>
      </div>
      <div class="rectangle-parent20">
        <div class="group-child18"></div>
        <b class="b9">₱ 200</b>
        <div class="group-parent3">
          <div class="rectangle-parent18">
            <div class="group-child19"></div>
            <b class="remove4">Remove</b>
          </div>
          <div class="rectangle-parent19">
            <div class="group-child20"></div>
            <b class="deliver4">Deliver</b>
          </div>
        </div>
        <div class="order-000042">Order #00003</div>
      </div>
      <div class="rectangle-parent23">
        <div class="group-child18"></div>
        <b class="b9">₱ 200</b>
        <div class="order-000042">Order #00002</div>
        <div class="group-parent3">
          <div class="rectangle-parent18">
            <div class="group-child19"></div>
            <b class="remove4">Remove</b>
          </div>
          <div class="rectangle-parent19">
            <div class="group-child20"></div>
            <b class="deliver4">Deliver</b>
          </div>
        </div>
      </div>
      <div class="rectangle-parent26">
        <div class="group-child27"></div>
        <b class="b9">₱ 200</b>
        <div class="order-000012">Order #00001</div>
        <div class="group-parent3">
          <div class="rectangle-parent18">
            <div class="group-child19"></div>
            <b class="remove4">Remove</b>
          </div>
          <div class="rectangle-parent19">
            <div class="group-child20"></div>
            <b class="deliver4">Deliver</b>
          </div>
        </div>
      </div>
      <div class="group">
        <b class="b13">₱ 200</b>
        <div class="rectangle-parent29">
          <div class="group-child30"></div>
          <b class="cash-on-deilvery1">Cash on Deilvery</b>
          <b class="b14">₱ 200</b>
          <div class="rectangle-parent30">
            <div class="group-child31"></div>
            <div class="sample-sample2">sample, sample</div>
            <div class="add-ons2">Add-ons</div>
            <div class="x22">x2</div>
            <div class="product-name2">Product Name</div>
            <img
              class="material-symbolsimage-outline-icon2"
              alt=""
              src="./image/materialsymbolsimageoutline2.png"
            />

            <div class="div4">₱ 100</div>
          </div>
          <b class="order-info1">Order Info</b>
          <div class="rectangle-parent31">
            <div class="group-child32"></div>
            <div class="div5">09123456789</div>
            <div class="block-1-lot1">Block 1 lot 1 Phase 1, Paliparan III</div>
            <div class="customer-name1">Customer Name</div>
            <div class="group-child33"></div>
            <div class="address1">Address</div>
            <a
              class="sampleemailgmailcom1"
              href="mailto:sampleEmail@gmail.com"
              target="_blank"
              >sampleEmail@gmail.com</a
            >
            <div class="group-child34"></div>
            <div class="email1">Email</div>
            <div class="order-no1">Order No.</div>
            <div class="div6">#00001</div>
            <div class="group-child35"></div>
          </div>
          <div class="rectangle-parent32">
            <div class="group-child36"></div>
            <div class="sample-sample3">sample, sample</div>
            <div class="add-ons3">Add-ons</div>
            <div class="x23">x2</div>
            <div class="product-name3">Product Name</div>
            <img
              class="material-symbolsimage-outline-icon3"
              alt=""
              src="./image/materialsymbolsimageoutline2.png"
            />

            <div class="div7">₱ 100</div>
          </div>
        </div>
        <img
          class="material-symbolscancel-outlin-icon"
          alt=""
          src="./image/materialsymbolscanceloutline.png"
          id="materialSymbolscancelOutlinIcon"
        />
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
      
      var materialSymbolscancelOutlinIcon = document.getElementById(
        "materialSymbolscancelOutlinIcon"
      );
      if (materialSymbolscancelOutlinIcon) {
        materialSymbolscancelOutlinIcon.addEventListener("click", function (e) {
          window.location.href = "./OrdersPreparingAdmin.html";
        });
      }
      </script>
<?php
    include "adminFooter.php";
?>

