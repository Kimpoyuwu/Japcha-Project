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
    <div class="container" style="margin-left: 300px; max-height: 100vh;">
      <div class="manage-order">
        <h2>Manage Order</h2>
      </div>
      <div class="status-bar">
        <button class="New" id="newStatus">New <span class="badge badge-success">4</span></button>
        <button class="Preparing" id="preparingStatus">Preparing <span class="badge badge-success">4</span></button>
        <button class="Delivery" id="deliveryStatus">Delivery <span class="badge badge-success">4</span></button>
        <button class="Complete" id="completeStatus">Complete <span class="badge badge-success">4</span></button>
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
        <button class="remove-button"></button>
        <button class="deliver-button"></button>
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
    <div class="addons-section" id="addons-section">
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
          <p class="order-no"></p>
          <p class="order-price"></p>
      </div>
      <div class="order-actions">
        <button class="complete-button"></button>
      </div>
    </div>
   


  </div>
  
  <!-- <div class="order-list" id="completeOrders" style="display: none;"> -->
    <!-- Clear All Button (Initially Hidden) -->
    <!-- Sample order -->
    <!-- <div> -->
     <!-- <button class="clear-all-button" id="clearAllButton" style="display: none;">Clear All</button> -->
     <!-- </div> -->
    <!-- <div class="order">
      <p>Order #00001</p>
      <div class="order1">
      <p>Complete</p>
      </div>
      <button class="remove-button">Remove</button>
    </div> -->

    <div class="order-list" id="completeOrders" style="display: none;">
        <!-- Clear All Button (Initially Hidden) -->
        <!-- <div>
            <button class="clear-all-button" id="clearAllButton" style="display: none;">Clear All</button>
        </div> -->
        <!-- Sample order element (you can create multiple such elements dynamically using JavaScript) -->
        <div class="order">
            <p class="order-no"></p>
            <div class="order1">
                <p></p>
            </div>
            <button class="remove-button"></button>
        </div>
    </div>



    </div>
    <!-- Add more orders following the same structure -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    

    <script>
 $(document).ready(function() {
  // Fetch and display orders when the page loads
fetchOrders();
// Call the fetchOrderDetails function to initially populate orders
fetchOrderDetails();
fetchDeliveryOrderDetails();
fetchCompleteOrderDetails() ;
// Poll for updates every 5 seconds
setInterval(fetchOrderDetails, 5000);
  var selectedOrderId;
  var selectedCustomerEmail;
  var selectedCustomerName;
  var selectedCustomerAddress;
  var totalprice;
  
// Create an object to track the last displayed time for each order
const lastDisplayTime = {};

function fetchOrders() {
    $.ajax({
        url: '../controller/get_latest_orders.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update the order list
            updateOrderList(response.orders);

            response.orders.forEach(function(order) {
                if (!order.accepted) {
                    const currentTime = new Date().getTime();
                    const lastTime = lastDisplayTime[order.orderId] || 0;
                    // Display notification only if 10 seconds have passed since the last display
                    if (currentTime - lastTime >= 300000) {
                        startTimer(order.orderId, 300000); // 10 seconds timer
                        lastDisplayTime[order.orderId] = currentTime;
                    }
                }
            });
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

function startTimer(orderId, duration) {
    setTimeout(function() {
        // Check if the order is still unaccepted
        if (!orderIsAccepted(orderId)) {
            displayNotification(orderId);
        }
    }, duration);
}

function orderIsAccepted(orderId) {
    // You need to implement a function to check if an order is accepted based on its orderId
    // You can make an AJAX request to your server to check the order's status
    // For simplicity, I'll assume an order is accepted if it's assigned an "accepted" flag
    // Replace this logic with your own order acceptance check
    const acceptedOrders = [/* List of accepted order IDs */];
    return acceptedOrders.includes(orderId);
}

function displayNotification(orderId) {
    // Create and play an audio notification
    var audio = new Audio('../audio/notification.mp3');
    audio.play();

    // Customize the notification message
    alert("Order #" + orderId + " hasn't been accepted within 5 minutes.");
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
    // orderItem.dataset.orderId = order.orderId;
    orderItem.dataset.customerId = order.customerid;

    var ul = document.createElement('ul');
    ul.innerHTML = '<li>Order #' + order.orderId + '</li>' +
                   '<li>' + order.price + '</li>';
    // Add more order details as needed

    orderItem.appendChild(ul);
    $("#newOrders").append(orderItem);

    // Attach a click event handler to this order item
    orderItem.addEventListener('click', function() {
      var customerId = order.customerid; // Change from orderId to customerId
        console.log(customerId); // Lo
        var orderId = order.orderId;
        selectedOrderId = orderId;
        SelectedCustomerid = customerId;
        selectedCustomerName = order.customer_name;
        selectedCustomerAddress = order.customer_address;
        selectedCustomerEmail = order.customer_email;
        totalprice = order.price;
        
        // Make an AJAX request to fetch order details
        $.ajax({
            url: '../controller/get_order_details.php', // Replace with the actual URL to fetch order details
            type: 'GET',
            data: { customerId: customerId},
            success: function(response) {
                var orderDetails = JSON.parse(response);
                // console.log("Received order details:", orderDetails);
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
        $("#orderNumber").text(selectedOrderId);
        $("#customerEmail").text(selectedCustomerEmail);
        $("#customerAddress").text(selectedCustomerAddress);
        $("#customerName").text(selectedCustomerName);
        $("#addons-section").empty();

orderDetails.forEach(function(order, index) {
    // Create a container for each order detail
    var orderContainer = document.createElement('div');
    orderContainer.classList.add('addon');

    // Create a div for the image or video
    var imageOrVideoElement = document.createElement('div');
    imageOrVideoElement.id = 'imageOrVideo_' + index;

    // Populate the image or video dynamically
    if (order.addons.imageURL.includes('.mp4')) {
        // It's a video
        imageOrVideoElement.innerHTML = `
            <video controls style="max-width: 100%">
                <source src="${order.addons.imageURL}" type="video/mp4">
                <p>Your browser does not support the video tag</p>
            </video>
        `;
    } else {
        // It's an image
        imageOrVideoElement.innerHTML = `
            <img src="${order.addons.imageURL}" alt="Sample Product" style="max-width: 100%">
        `;
    }

    // Create a paragraph for addon details
    var addonDetails = document.createElement('p');
    addonDetails.classList.add('addon-details');

    // Populate the addon details dynamically
    addonDetails.innerHTML = `
        <span class="product-name" id="productName_${index}">${order.addons.productName}</span>
        <span class="quantity" id="productQuantity_${index}">${order.addons.quantity}</span>
        <span class="sample" id="productSample_${index}">${order.addons.sample}</span>
        <span class="addons" id="productAddons_${index}">${order.addons.addonsid}</span>
        <span class="price" id="productPrice_${index}">${order.addons.price}</span>
    `;

    // Append the image or video and addon details to the order container
    orderContainer.appendChild(imageOrVideoElement);
    orderContainer.appendChild(addonDetails);

    // Append the order container to the newOrders container
    $("#addons-section").append(orderContainer);
});

        // Update the cash on delivery
        $("#cashOnDelivery").text(totalprice);
        $("#orderInfo").css("display", "block");
    }

    $(".accept").click(function() {
        if (selectedOrderId, SelectedCustomerid) {
            // Display a confirmation dialog with the order ID
            var confirmation = confirm("Are you sure you want to accept order #" + selectedOrderId +"?");

            if (confirmation) {
                // Make an AJAX request to update the order status
                $.ajax({
                    url: '../controller/update_order.php', // Replace with the actual URL for updating the order
                    type: 'POST', // You may use POST to send data securely
                    data: { updateorder: selectedOrderId,
                            customerid: SelectedCustomerid,
                            accepted: true,
                    },
                    success: function(response) {
                        // Remove the container for the order
                        console.log("Connected to updateorder in PHP");
                        $("#orderInfo").css("display", "none");
                        // console.log(response);
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

                removeButton.addEventListener('click', function () {
                    var confirmRemove = confirm('Are you sure you want to remove this order?');
                    if (confirmRemove) {
                        removeOrder(order.orderId, order.customer_id);
                        console.log(order.orderId);
                    }
                });

                deliverButton.addEventListener('click', function () {
                    var confirmDeliver = confirm('Are you sure you want to deliver this order?');
                    if (confirmDeliver) {
                        deliverOrder(order.orderId, order.customer_id);

                        console.log(order.orderId, order.customer_id);
                    }
                });

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

function removeOrder(orderId, customerid) {
    $.ajax({
        url: '../controller/RemoveOrder.php', // Replace with your server's URL for delivering orders
        type: 'POST',
        data: { customer_id: customerid,
                orderId: orderId,        
        },
        success: function (response) {
            if (response.success) {
                // Order delivered successfully, you can update the UI or perform any other necessary actions
                // alert("Order #" + orderId + " is up for delivery.");
                alert(response);
                // Optionally, you can remove the order from the UI or update its status
            } else {
                alert(response);
                // alert("Failed to deliver the order. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}


// Function to deliver an order
function deliverOrder(orderId, customerid) {
    $.ajax({
        url: '../controller/DeliverOrder.php', // Replace with your server's URL for delivering orders
        type: 'POST',
        data: { customer_id: customerid,
                orderId: orderId,        
        },
        success: function (response) {
            if (response.success) {
                // Order delivered successfully, you can update the UI or perform any other necessary actions
                // alert("Order #" + orderId + " is up for delivery.");
                alert(response);
                // Optionally, you can remove the order from the UI or update its status
            } else {
                alert(response);
                // alert("Failed to deliver the order. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}


function fetchDeliveryOrderDetails() {
    // Make an AJAX request to your server to fetch delivery order details
    $.ajax({
        url: '../controller/OrdersDelivery.php', // Replace with your server's URL
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Append the delivery order details to the container
            $('#deliveryOrders').empty(); // Clear the existing delivery orders first
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

                // Create and populate "Complete" button
                var completeButton = document.createElement('button');
                completeButton.classList.add('complete');
                completeButton.textContent = 'Complete';

                completeButton.addEventListener('click', function () {
                    var confirmDeliver = confirm('Are you sure you want to mark this order as completed?');
                    if (confirmDeliver) {
                        completeOrder(order.orderId, order.customer_id);

                        console.log(order.orderId, order.customer_id);
                    }
                });

                // Append elements to their respective containers
                orderDetailsDiv.appendChild(orderNoP);
                orderDetailsDiv.appendChild(orderPriceP);

                orderActionsDiv.appendChild(completeButton);

                // Append the containers to the order element
                orderDiv.appendChild(orderDetailsDiv);
                orderDiv.appendChild(orderActionsDiv);

                // Append the order details to the "deliveryOrders" container
                $('#deliveryOrders').append(orderDiv);
            });
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}

function completeOrder(orderId, customerid) {
    $.ajax({
        url: '../controller/CompleteOrder.php', // Replace with your server's URL for delivering orders
        type: 'POST',
        data: { customer_id: customerid,
                orderId: orderId,        
        },
        success: function (response) {
            if (response.success) {
                // Order delivered successfully, you can update the UI or perform any other necessary actions
                // alert("Order #" + orderId + " is up for delivery.");
                alert(response);
                // Optionally, you can remove the order from the UI or update its status
            } else {
                alert(response);
                // alert("Failed to deliver the order. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}


function fetchCompleteOrderDetails() {
    // Make an AJAX request to your server to fetch complete order details
    $.ajax({
        url: '../controller/OrdersCompleted.php', // Replace with your server's URL
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Append the complete order details to the container
            $('#completeOrders').empty(); // Clear the existing complete orders first
            response.orders.forEach(function (order) {
                // Create a new order element
                var orderDiv = document.createElement('div');
                orderDiv.classList.add('order');

                // Create and populate order details
                var orderNoP = document.createElement('p');
                orderNoP.classList.add('order-no');
                orderNoP.textContent = 'Order #' + order.orderId;

                var order1Div = document.createElement('div');
                order1Div.classList.add('order1');
                var completeP = document.createElement('p');
                completeP.textContent = 'Complete';

                // Create and populate "Remove" button
                var removeButton = document.createElement('button');
                removeButton.classList.add('remove-button');
                removeButton.textContent = 'Remove';

                removeButton.addEventListener('click', function () {
                    var confirmDeliver = confirm('Are you sure you want to remove this order?');
                    if (confirmDeliver) {
                        DeleteOrder(order.orderId, order.customer_id);
                    }
                });
                // Append elements to their respective containers
                order1Div.appendChild(completeP);

                // Append elements to the order element
                orderDiv.appendChild(orderNoP);
                orderDiv.appendChild(order1Div);
                orderDiv.appendChild(removeButton);

                // Append the order details to the "completeOrders" container
                $('#completeOrders').append(orderDiv);
            });
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}


function DeleteOrder(orderId, customerid) {
    $.ajax({
        url: '../controller/DeleteOrder.php', // Replace with your server's URL for delivering orders
        type: 'POST',
        data: { customer_id: customerid,
                orderId: orderId,        
        },
        success: function (response) {
            if (response.success) {
                // alert("Order #" + orderId + " is up for delivery.");
                alert(response);
                // Optionally, you can remove the order from the UI or update its status
            } else {
                alert(response);
            }
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}

});


    </script>
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

<?php
    include "adminFooter.php";

?>
  