<?php
    include "adminHeader.php";
?>
    <div class="container">
      <div class="manage-order">
        <h2>Manage Order</h2>
      </div>
      <div class="status-bar">
        <button class="New" id="newStatus">New</button>
        <button class="Preparing" id="preparingStatus">Preparing</button>
        <button class="Delivery" id="deliveryStatus">Delivery</button>
        <button class="Complete" id="completeStatus">Complete</button>
      </div>
      <!-- New Orders List Section -->
      <div class="order-list" id="newOrders">
        <h3>List of Orders</h3>
        <div class="list">
        <ul>
          <li>Order #0001 </li>
          <li>₱100</li>
          <!-- Add more new order items here -->
        </ul>
        </div>
      </div>
      <!-- Preparing Orders List Section -->
      <div class="order-list" id="preparingOrders" style="display: none;">
    <div class="order">
      <div class="order-details">
        <p>Order No. #00001</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="remove-button">Remove</button>
        <button class="deliver-button">Deliver</button>
      </div>
    </div>
    <div class="order">
      <div class="order-details">
        <p>Order No. #00002</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="remove-button">Remove</button>
        <button class="deliver-button">Deliver</button>
      </div>
    </div>
    <div class="order">
      <div class="order-details">
        <p>Order No. #00003</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="remove-button">Remove</button>
        <button class="deliver-button">Deliver</button>
      </div>
    </div>
    <div class="order">
      <div class="order-details">
        <p>Order No. #00004</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="remove-button">Remove</button>
        <button class="deliver-button">Deliver</button>
      </div>
    </div>
    <!-- Add more preparing order items here -->
  </div>
      <!-- Order Info Section -->
      <div class="order-info" id="orderInfo">
        <h3>Order Info</h3>
        <table>
          <tr>
            <th>Order No.</th>
            <th>Email</th>
            <th>Address</th>
            <th>Customer Name</th>
          </tr>
          <tr>
            <td>#00001</td>
            <td>Sample@gmail.com</td>
            <td>Block 1 lot 1 Phase 1, Paliparan III</td>
            <td>Sample</td>
          </tr>
          <!-- Add more rows for additional orders -->
        </table>
     <!-- Add-ons Section -->
    <div class="addons-section">
      <div class="addon">
        <img src="image/sampleimage.png" alt="Sample Product">
        <p class="addon-details">
          <span class="product-name">Product Name</span>
          <span class="quantity">x2</span>
          <span class="sample">Sample</span>
          <span class="price">₱100</span>
        </p>
      </div>
      <!-- Add more add-ons here -->
    </div>
    <div class="Cash-On-delivery">
        <p>Cash On Delivery</p>
        <p>₱100</p>
      </div>
    <div class="buttons" id="buttons">
        <button class="button cancel">Cancel Order</button>
        <button class="button accept">Accept Order</button>
      </div>
    </div>
    
    <div class="order-list" id="deliveryOrders" style="display: none;">
    <div class="order">
      <div class="order-details">
        <p>Order No. #00001</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="complete">Complete</button>
      </div>
    </div>
    <div class="order">
      <div class="order-details">
        <p>Order No. #00002</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="complete">Complete</button>
      </div>
  </div>
  <div class="order">
      <div class="order-details">
        <p>Order No. #00003</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="complete">Complete</button>
      </div>
      </div>
      <div class="order">
      <div class="order-details">
        <p>Order No. #00004</p>
        <p>₱200</p>
      </div>
      <div class="order-actions">
        <button class="complete">Complete</button>
      </div>
      </div>
      </div>
  
  <div class="order-list" id="completeOrders" style="display: none;">
    <!-- Clear All Button (Initially Hidden) -->
    <!-- Sample order -->
    <div>
     <button class="clear-all-button" id="clearAllButton" style="display: none;">Clear All</button>
     </div>
    <div class="order">
      <p>Order #00001</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>
    <div class="order">
      <p>Order #00002</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>
    <div class="order">
      <p>Order #00003</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>
    <div class="order">
      <p>Order #00004</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>
    <div class="order">
      <p>Order #00005</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>
    </div>
    <!-- Add more orders following the same structure -->
    </div>
    <script>
      // JavaScript to toggle the display of the New Orders List
    document.getElementById("newStatus").addEventListener("click", function() {
      var newOrders = document.getElementById("newOrders");
      var preparingOrders = document.getElementById("preparingOrders");
      var orderInfo = document.getElementById("orderInfo");
      var buttons = document.getElementById("buttons");
      var deliveryOrders = document.getElementById("deliveryOrders");
      var completeOrders = document.getElementById("completeOrders");
  
  
      newOrders.style.display = "block";
      preparingOrders.style.display = "none";
      orderInfo.style.display = "block";
      buttons.style.display = "block";
      deliveryOrders.style.display = "none";
      completeOrders.style.display = "none"
    });
  
    // JavaScript to toggle the display of the Preparing Orders List
    document.getElementById("preparingStatus").addEventListener("click", function() {
        var newOrders = document.getElementById("newOrders");
        var preparingOrders = document.getElementById("preparingOrders");
        var orderInfo = document.getElementById("orderInfo");
        var buttons = document.getElementById("buttons"); // Get the buttons div
        var deliveryOrders = document.getElementById("deliveryOrders");
        var completeOrders = document.getElementById("completeOrders");
  
        newOrders.style.display = "none";
        preparingOrders.style.display = "block";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        deliveryOrders.style.display = "none";
        completeOrders.style.display = "none"
      });
  
      document.getElementById("deliveryStatus").addEventListener("click", function() {
        var newOrders = document.getElementById("newOrders");
        var preparingOrders = document.getElementById("preparingOrders");
        var orderInfo = document.getElementById("orderInfo");
        var buttons = document.getElementById("buttons"); // Get the buttons div
        var deliveryOrders = document.getElementById("deliveryOrders");
        var completeOrders = document.getElementById("completeOrders");
  
        newOrders.style.display = "none";
        preparingOrders.style.display = "none";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        completeOrders.style.display = "none"
        deliveryOrders.style.display = "block"
       
      });
  
      document.getElementById("completeStatus").addEventListener("click", function() {
        var newOrders = document.getElementById("newOrders");
        var preparingOrders = document.getElementById("preparingOrders");
        var orderInfo = document.getElementById("orderInfo");
        var buttons = document.getElementById("buttons"); // Get the buttons div
        var deliveryOrders = document.getElementById("deliveryOrders");
        var completeOrders = document.getElementById("completeOrders");
        var clearAllButton = document.getElementById("clearAllButton");
  
        newOrders.style.display = "none";
        preparingOrders.style.display = "none";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        deliveryOrders.style.display = "none";
        completeOrders.style.display = "block";
        clearAllButton.style.display = "block";
      });
   
    </script>

<?php
    include "adminFooter.php";

?>
  