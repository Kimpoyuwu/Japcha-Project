<?php
    include "adminHeader.php";
    require_once "../classes/dbh.classes.php";
    require_once "../classes/OrderModel.php";
    $OrderModel = new Order();
    $order_data = $OrderModel->getOrders();
?>
<style>
  .addon{
    padding: 5px;
  }
  .addon video{
    max-height: 100px;

  }
</style>
    <div class="container" style="margin-left: 300px;">
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
      <div class="order-list d-flex" id="newOrders" style="gap: 5px;">
        <h3>List of Orders</h3>
    
      </div>


      <!-- Preparing Orders List Section -->
      <!-- <div class="order-list" id="preparingOrders" style="display: none;">
      <div class="order">
      <div class="order-details">
        <p>Order No. #00001</p>
        <p>₱200</p>
      </div>
    </div> -->
    <div class="order-list" id="preparingOrders" style="display: none; max-height: 600px; overflow: auto;">
      <div class="order">
        <div class="order-details">
          <p class="order-no"></p>
          <p class="order-price"></p>
        </div>
        <div class="order-actions">
        <button class="remove-button">Remove</button>
        <button class="deliver-button">Deliver</button>
      </div>
    </div>
    <!-- Add more preparing order items here -->
  </div>
      <!-- Order Info Section -->
      <div class="order-info" id="orderInfo" style="display:none;">
        <h3>Order Info</h3>
        <table>
          <tr>
            <th>Order No.</th>
            <th>Email</th>
            <th>Address</th>
            <th>Customer Name</th>
          </tr>
          <tr>
            <td id="orderNumber"></td>
            <td id="customerEmail"></td>
            <td id="customerAddress"></td>
            <td id="customerName"></td>
        </tr>
          <!-- Add more rows for additional orders -->
        </table>
     <!-- Add-ons Section -->
    <div class="addons-section">
      <div class="addon">
        <div class="addon" id="imageOrVideo">
            <!-- The image or video will be inserted here dynamically -->
        </div>

        <p class="addon-details">
            <span class="product-name" id="productName"></span>
            <span class="quantity" id="productQuantity"></span>
            <span class="sample" id="productSample"></span>
            <span class="addons" id="productAddons"></span>
            <span class="price" id="productPrice"></span>
        </p>
      </div>
      <!-- Add more add-ons here -->
    </div>
    <div class="Cash-On-delivery">
        <p style="font-size: 20px; font-weight: bold;">Cash On Delivery</p>
        <p id="cashOnDelivery"></p>
      </div>
    <div class="buttons" id="buttons">
        <button class="button cancel" >Cancel Order</button>
        <button class="button accept">Accept Order</button>
      </div>
    </div>

    <?php
      // include_once "AdminOrderModal.php";
    ?>
    
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
   


  </div>
  
  <div class="order-list" id="completeOrders" style="display: none;">
    <!-- Clear All Button (Initially Hidden) -->
    <!-- Sample order -->
    <div>
     <!-- <button class="clear-all-button" id="clearAllButton" style="display: none;">Clear All</button> -->
     </div>
    <div class="order">
      <p>Order #00001</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div>

    
    </div>
    <!-- Add more orders following the same structure -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      // JavaScript to toggle the display of the New Orders List
      var newOrders = document.getElementById("newOrders");
      var preparingOrders = document.getElementById("preparingOrders");
      var orderInfo = document.getElementById("orderInfo");
      var buttons = document.getElementById("buttons");
      var deliveryOrders = document.getElementById("deliveryOrders");
      var completeOrders = document.getElementById("completeOrders");
    document.getElementById("newStatus").addEventListener("click", function() {
     
  
  
      newOrders.style.display = "block";
      preparingOrders.style.display = "none";
      orderInfo.style.display = "block";
      buttons.style.display = "block";
      deliveryOrders.style.display = "none";
      completeOrders.style.display = "none"
    });
  
    // JavaScript to toggle the display of the Preparing Orders List
    document.getElementById("preparingStatus").addEventListener("click", function() {
 
        newOrders.style.display = "none";
        preparingOrders.style.display = "block";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        deliveryOrders.style.display = "none";
        completeOrders.style.display = "none"
      });
  
      document.getElementById("deliveryStatus").addEventListener("click", function() {
 
        newOrders.style.display = "none";
        preparingOrders.style.display = "none";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        completeOrders.style.display = "none"
        deliveryOrders.style.display = "block"
       
      });
  
      document.getElementById("completeStatus").addEventListener("click", function() {
  
        newOrders.style.display = "none";
        preparingOrders.style.display = "none";
        orderInfo.style.display = "none"; // Hide order info when "Preparing" is clicked
        buttons.style.display = "none"; // Hide the buttons
        deliveryOrders.style.display = "none";
        completeOrders.style.display = "block";
        clearAllButton.style.display = "block";
      });
   
    </script>

    <script>
 $(document).ready(function() {
  // Fetch and display orders when the page loads
fetchOrders();
// Call the fetchOrderDetails function to initially populate orders
fetchOrderDetails();

// Poll for updates every 5 seconds
setInterval(fetchOrderDetails, 5000);
  var selectedOrderId;

  function fetchOrders() {
    $.ajax({
        url: '../controller/get_latest_orders.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update the order list
            updateOrderList(response.orders);
            // Start the next request after a short delay
            setTimeout(fetchOrders, 5000); // Poll every 5 seconds
        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
            // Start the next request after a short delay, even if there's an error
            setTimeout(fetchOrders, 5000); // Poll every 5 seconds
        }
    });
}

function updateOrderList(orders) {
    // Clear the existing order list
   // Clear the existing order list
   $("#newOrders").empty();

// Iterate through the orders and add them to the list
orders.forEach(function(order) {
    var orderItem = document.createElement('div');
    orderItem.classList.add('list');
    orderItem.style.cursor = 'pointer';
    orderItem.dataset.orderId = order.orderId;

    var ul = document.createElement('ul');
    ul.innerHTML = '<li>Order #' + order.orderId + '</li>' +
                   '<li>' + order.price + '</li>';
    // Add more order details as needed

    orderItem.appendChild(ul);
    $("#newOrders").append(orderItem);

    // Attach a click event handler to this order item
    orderItem.addEventListener('click', function() {
        var orderId = order.orderId;
        console.log(orderId);
        selectedOrderId = orderId;
        // Make an AJAX request to fetch order details
        $.ajax({
            url: '../controller/get_order_details.php', // Replace with the actual URL to fetch order details
            type: 'GET',
            data: { orderId: orderId },
            success: function(response) {
                var orderDetails = JSON.parse(response);
                console.log("Received order details:", orderDetails);
                updateOrderInfo(orderDetails);
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    });
});
}

function updateOrderInfo(orderDetails) {
        // Update the placeholders with dynamic data
        $("#orderNumber").text(orderDetails.orderNo);
        $("#customerEmail").text(orderDetails.email);
        $("#customerAddress").text(orderDetails.address);
        $("#customerName").text(orderDetails.customerName);

       
        // Separate the image URL
        var imageOrVideoElement = document.getElementById("imageOrVideo");
          if (orderDetails.addons.imageURL.includes('.mp4')) {
              // It's a video
              imageOrVideoElement.innerHTML = `
                  <video controls style="max-width: 100%">
                      <source src="${orderDetails.addons.imageURL}" type="video/mp4">
                      <p>Your browser does not support the video tag</p>
                  </video>
              `;
          } else {
              // It's an image
              imageOrVideoElement.innerHTML = `
                  <img src="${orderDetails.addons.imageURL}" alt="Sample Product" style="max-width: 100%">
              `;
          }

        // Update the add-ons section
        $("#productName").text(orderDetails.addons.productName);
        $("#productQuantity").text(orderDetails.addons.quantity);
        $("#productSample").text(orderDetails.addons.sample);
        $("#productAddons").text(orderDetails.addons.addons);
        $("#productPrice").text(orderDetails.addons.price);

        // Update the cash on delivery
        $("#cashOnDelivery").text(orderDetails.cashOnDelivery);
        $("#orderInfo").css("display", "block");
    }

    $(".accept").click(function() {
        if (selectedOrderId) {
            // Display a confirmation dialog with the order ID
            var confirmation = confirm("Are you sure you want to accept order #" + selectedOrderId + "?");

            if (confirmation) {
                // Make an AJAX request to update the order status
                $.ajax({
                    url: '../controller/get_order_details.php', // Replace with the actual URL for updating the order
                    type: 'POST', // You may use POST to send data securely
                    data: { updateorder: selectedOrderId },
                    success: function(response) {
                        // Remove the container for the order
                        console.log("Connected to updateorder in PHP");
                        $("#orderInfo").css("display", "none");
                        selectedOrderId = null; // Reset the selected order ID
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }
        } else {
            alert("Please select an order to accept.");
        }
    });


    function fetchOrderDetails() {
    // Make an AJAX request to your server to fetch order details
    $.ajax({
        url: '../controller/OrdersPreparing.php', // Replace with your server's URL
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          console.log('Successfully received data:', response);
            // Append the order details to the container
            $('#preparingOrders').empty(); // Clear the existing orders first
            response.orders.forEach(function (order) {
                // Create a new order element
                var orderDiv = document.createElement('div');
                orderDiv.classList.add('order');

                // Create a container for order details
                var orderDetailsDiv = document.createElement('div');
                orderDetailsDiv.classList.add('order-details');

                // Create and populate order details
                var orderNoP = document.createElement('p');
                orderNoP.classList.add('order-no');
                orderNoP.textContent = 'Order No. #' + order.orderId;

                var orderPriceP = document.createElement('p');
                orderPriceP.classList.add('order-price');
                orderPriceP.textContent = '₱' + order.price;

                // Create a container for order actions (buttons)
                var orderActionsDiv = document.createElement('div');
                orderActionsDiv.classList.add('order-actions');

                // Create and populate "Remove" button
                var removeButton = document.createElement('button');
                removeButton.classList.add('remove-button');
                removeButton.textContent = 'Remove';

                // Create and populate "Deliver" button
                var deliverButton = document.createElement('button');
                deliverButton.classList.add('deliver-button');
                deliverButton.textContent = 'Deliver';

                // Append elements to their respective containers
                orderDetailsDiv.appendChild(orderNoP);
                orderDetailsDiv.appendChild(orderPriceP);

                orderActionsDiv.appendChild(removeButton);
                orderActionsDiv.appendChild(deliverButton);

                // Append the containers to the order element
                orderDiv.appendChild(orderDetailsDiv);
                orderDiv.appendChild(orderActionsDiv);

                // Append the order details to the container
                $('#preparingOrders').append(orderDiv);
            });
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}




});


    </script>

<?php
    include "adminFooter.php";

?>
  