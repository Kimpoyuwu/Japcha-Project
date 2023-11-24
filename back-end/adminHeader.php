<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/japcha_logo.png">
    <link rel="stylesheet" href="../assets/css/Admin.css">
    <link rel="stylesheet" href="../assets/css/AdminOrders.css">  
    <link rel="stylesheet" href="../assets/css/adminStat.css">
    <link rel="stylesheet" href="../assets/css/Global-CSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Document</title>
    <style>
        /* Custom CSS for animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animated-alert {
            animation: fadeIn 0.5s ease-in-out;
        
        }
        .badge-top {
        position: absolute !important;
        right: -3px !important;
        top: -4px;
        font-size: 10px !important;
        }
        #bell-icon {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .bell {
            color: #D0BC05;
        }

        /* Style for the notification dropdown */
        .dropdown-menu{
            min-width: 300px !important;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .notification-item {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .notification-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->



<?php
    if(isset($_SESSION["adminID"]) ){
 ?>
<nav>
    <div class="menu_logo">
    <div id="menu-icon">
    <button class="open" onclick="openNav()" ><i class="fa fa-bars menu" id="burger_menu"></i></button>
        </div>

        <div id ="logo-img">
            <a href="#">
                <img src="../image/japcha_log.png" alt="Japcha Logo">
            </a>
        </div>
        
    </div>
   
    <!-- <li> -->
    <div class="dropdown" style="margin: auto; position: relative;">
    <a id="bell-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell bell"></i>
        <span class="badge badge-danger badge-top BellBadge"></span>
    </a>

    <!-- Notification Dropdown -->
    <div id="notificationDropdown"  class="dropdown-menu" aria-labelledby="bell-icon">
    </div>
</div>
    <!-- </li> -->
            <!-- <li>
            <button class="btnCaretdown" ><i id="caret_down" class="fa fa-caret-down"></i></button>
            </li> -->

</nav>

    <div class="sidebar" id="mySidebar"> 
         <ul class="nav-links">
         <?php
                    if(isset($_SESSION["dashboardview"]) && $_SESSION["dashboardview"] == 1){
                       
            
        ?>              <li>
                            <a href="AdminDashBoard.php">
                                <i class="fa fa-home icon"></i>
                                <span class="link_name">Dashboard</span>
                            </a>
                            <ul class="sub-menu blank">
                                <li><a class="link_name" href="AdminDashBoard.php">Dashboard</a></li>
                            </ul> 
                        </li>
        <?php
            }
        ?>

        <?php   
                    if(isset($_SESSION["file_view"]) && $_SESSION["file_view"] == 1){
                    
        ?>                      <li>
                                        <div class="icon-link">
                                            <a href="#">
                                                <i class="fa fa-folder" aria-hidden="true"></i>
                                                <span class="link_name">File Manager</span>
                                            </a>
                                            <i class="fa fa-caret-down arrow"></i>
                                        </div>
                                        <ul class="sub-menu">
                                            <li><a class="link_name" href="#">File Manager</a></li>
                                            <li><a href="CustomerAccount.php">Customer</a></li>
                                            <li><a href="adminAccount.php">Admin</a></li>
                                            <li><a href="userLevel.php">User Level</a></li>
                                            <li><a href="adminProducts.php">Products</a></li>
                                            <li><a href="admin-ProductSizes.php">Product Sizes</a></li>
                                            <li><a href="viewCategory.php">Category</a></li>
                                            <li><a href="admin-add-ons.php">Add-ons</a></li>
                                            <li><a href="admin-sizes.php">Sizes</a></li>
                                        </ul> 
                                 </li>
        <?php
            }
        ?>
        <?php
                if(isset($_SESSION["orderManagement_view"]) && $_SESSION["orderManagement_view"] == 1){
        ?>       
                <!-- <li>
                    <div class="icon-link">
                        <a href="AdminOrders.php">
                            <i class="fa fa-list"></i>
                            <span id="insertCounter" class="link_name">Orders <span class="badge badge-success">0</span></span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li style="position: relative;"><a class="link_name" href="#">Orders</a></li>
                        <li><a href="AdminOrders.php">Orders</a><span id="insertCounter" class="badge badge-success" style="position: absolute; right: 60%; top:0;">0</span></li>
                        <li><a href="#">Archive</a></li>
                    </ul>  
                </li> -->
                <li>
                    <a href="AdminOrders.php">
                        <i class="fa fa-list"></i>
                        <span id="insertCounter" class="link_name">Orders <span class="badge badge-success"></span></span>
                    </a>
                </li>
                <script>
           function checkForNewInserts() {
                fetch('../controller/CountNewInsertedOrder.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        var badgeContent = data.new_insert_count !== 0
                            ? '<span class="badge badge-danger">' + data.new_insert_count + '</span>'
                            : ''; // If count is 0, set an empty string

                        document.getElementById('insertCounter').innerHTML = 'Orders ' + badgeContent;
                        // document.getElementById('numberAppointments').textContent = data.count;
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

                    setInterval(checkForNewInserts, 5000);
                    checkForNewInserts();
                </script>
        <?php
            }
        ?>
                <!-- <li>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="AdminOrders.php">Statistics</a></li>
                    </ul> 
                </li> -->

        <?php
                if(isset($_SESSION["statisticsManagement_view"]) && $_SESSION["statisticsManagement_view"] == 1){
        ?>  
                <li>
                    <a href="AdminStatistics_v2.php">
                        <i class="fa fa-bar-chart"></i>
                        <span class="link_name">Statistics</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="AdminStatistics_v2.php">Statistics</a></li>
                    </ul> 
                </li>
        <?php
            }
        ?>

         <?php
                if(isset($_SESSION["chatManagement_view"]) && $_SESSION["chatManagement_view"] == 1){
        ?> 
                <li>
                    <a href="adminMessage.php">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        <span class="link_name">Message</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="adminMessage.php">Message</a></li>
                    </ul> 
                </li>
        <?php
            }
        ?>
                <!-- <li>
                    <a href="ChatbotManagement.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span class="link_name">Chatbot</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="adminMessage.php">Chatbot</a></li>
                    </ul> 
                </li> -->
        

               <?php
                if(isset($_SESSION["contentManagement_view"]) && $_SESSION["contentManagement_view"] == 1){
                  ?>
                        <li>
                                <a href="admin-cms.php">
                                    <i class="fa fa-tasks"></i>
                                    <span class="link_name">Content Management</span>
                                </a>
                                <ul class="sub-menu blank">
                                    <li><a class="link_name" href="admin-cms.php">Content Management</a></li>
                                </ul> 
                         </li>  
                <?php
                 }
               ?>

                <?php
                if(isset($_SESSION["marketingManagement_view"]) && $_SESSION["marketingManagement_view"] == 1){
                  ?>

                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <span class="link_name">Marketing</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Marketing</a></li>
                        <li><a href="AdminRating.php">Ratings Management</a></li>
                        <li><a href="CouponManagement.php">Coupon Management</a></li>
                        <li><a href="AnnouncementManagement.php">Announcement</a></li>
                    </ul>  
                </li>
                <?php
                 }
               ?>

            <li>
                <div class="profile-details">

                    <div class="profile-content">
                        <img src="../image/Boy.png" alt="profile">
                    </div>

                    <div class="name-job">
                        <div class="profile_name"><?php echo $_SESSION["uname"];?></div>
                      
                         <div class="job"><?php echo $_SESSION["userlvl"]; ?></div>
                           
                        
                    </div>
                    <a href="../includes/logout.inc.php">
                        <i class="fa fa-sign-out signout" style="color: white"></i>
                    </a>
                </div>
            </li>
            
        </ul>
    </div>
<!-- Alert-like Div -->

<div id="alertContainer" style="z-index: 9999; position: fixed !important; bottom: 0; right: 0; display: block;"></div>

<script>

</script>

<script>
    $(document).ready(function(){
        // Variable to track if there are new orders
     

        function fetchOrdersAlertDiv() {
            $.ajax({
                url: '../controller/AlertNewOrder.php',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Clear the existing alertContainer
                    $('#alertContainer').empty();

                    // Iterate over orders and append new order alerts
                    response.orders.forEach(function (order) {
                        // Create the alertDiv for the current order
                        var alertDiv = $('<div>', {
                            class: 'alert alert-warning alert-dismissible fade show',
                            role: 'alert',
                            html: '<strong>Alert!</strong> A new order has been placed.' +
                                '<div style="position: absolute; right: 0; top: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span></button></div>' +
                                '<div class="mt-2 orderText"><p>Order #' + order.orderId + '</p></div>'
                        });

                        // Append the alertDiv to the alertContainer
                        $('#alertContainer').append(alertDiv);

                        $('#alertContainer').on('click', '.close', function () {
                            // Get the orderId from the parent alertDiv
                            var orderId = $(this).closest('.alert').find('.orderText p').text().match(/\d+/)[0];

                            // Call the updateDatabase function
                            UpdateSeenOrder(orderId);

                        });

                        $('#alertContainer').on('click', '.alert', function () {
                            // Get the orderId from the clicked alertDiv
                            var orderId = $(this).find('.orderText p').text().match(/\d+/)[0];
                            // Redirect to another page (replace 'your_page_url' with the actual URL)
                            UpdateSeenOrder(orderId);
                            window.location.href = 'AdminOrders.php';
                        });
                    });

                    // Set the newOrders variable based on the number of new orders
                 
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }

        // Call the function to start fetching orders
        setInterval(fetchOrdersAlertDiv, 5000); // 10 seconds interval

        // Initial fetch when the page loads
        fetchOrdersAlertDiv();


        function UpdateSeenOrder(orderId) {

            $.ajax({
                url: '../controller/SeenOrder.php', // Replace with your server's URL for delivering orders
                type: 'POST',
                data: { orderId: orderId        
                },
                success: function (response) {
                    console.log(response);
                   
                },
                error: function (xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        }

    });
</script>



    <script>
      // Fetch new orders and update the bell icon
      function checkForNewOrdersNotificationBell() {
    fetch('../controller/CountNewOrdersPending.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            var badgeContent = data.new_insert_count !== 0
                ? '<span class="badge badge-danger badge-top BellBadge">' + data.new_insert_count + '</span>'
                : ''; // If count is 0, set an empty string

            document.getElementById('bell-icon').innerHTML = ' <i class="fa fa-bell bell"></i>' + badgeContent;
            // document.getElementById('numberAppointments').textContent = data.count;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

    // Call the function to check for new orders
  
    function fetchOrdersNotificationBell() {
    $.ajax({
        url: '../controller/get_latest_orders.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Clear the existing dropdown items
            $('#notificationDropdown').empty();

            // Iterate over orders and append dropdown items
            response.orders.forEach(function(order) {
                var dropdownItem = $('<a>', {
                    class: 'dropdown-item',
                    href: 'AdminOrders.php',
                    text: 'New Order #' + order.orderId,
                });

                // Append the dropdown item to the notification dropdown
                $('#notificationDropdown').append(dropdownItem);
            });

        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}

// Initial fetch when the page loads
fetchOrdersNotificationBell();
checkForNewOrdersNotificationBell();
// Set interval after the initial fetch
setInterval(function () {
    fetchOrdersNotificationBell();
    checkForNewOrdersNotificationBell();
}, 5000);




</script>
<script src="../assets/js/admin.js"></script>
    <?php
            
        }
     ?>
<div class="table_container">