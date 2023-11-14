<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <?php include "c_header.php"; ?>
    <style>
       .container {
    height: auto;
    width: 100%;
    margin-top: 130px;
    margin-left: auto;
    justify-content: center;
    }

    .card-img-top {
        border: 2px solid gray;
        max-width: 100px;
        max-height: 100px;
        background-color: #D0BC05;
    }

    .nav-item {
        font-weight: bold;
        font-size: 25px;
    }

    .terms {
        margin-top: 90px;
        text-align: center;
    }

    .table {
        margin-top: 20px;
        text-align: center;
        
    }

    .nav-item {
        text-align: center;
        position: relative;
        color: black;
        padding: 20px 4px;
        max-width: 300%;
    }

    .nav-item::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 10;
        width: 100%;
        height: 5%;
        background: linear-gradient(transparent, black);
        z-index: -1;
        transition: 0.2s;
        transform: scaleY(0);
        border-bottom: 4px solid !important;
    }
    
    .nav-item.active::before {
        transform: scaleY(1);
    }


    .nav.nav-fill {
    width: 280px; 
    }

    .nav-item.nav-link {
        width: 140px; 
    }

    .tab-pane {
        display: flex;
        justify-content: center;
        width: 100%; 
    }
   
    td.center-content{
        vertical-align: middle !important;
    }
    </style>
    <div class="container text-center">
     <div class="orderbar">
        <div class="row d-flex" style="width: 100%; justify-content: center;">
            <ul class="nav nav-tab d-flex justify-content-center gap-3" style="gap: 50px;">

                <li class="nav-item">
                    <a class="nav-item nav-link active" id="nav-Pending-tab" data-toggle="tab" href="#nav-Pending" role="tab" aria-controls="nav-Pending" aria-selected="true">Pending</a>
                </li>

                <li class="nav-item  ">
                    <a class="nav-item nav-link" id="nav-Prepairing-tab" data-toggle="tab" href="#nav-Prepairing" role="tab" aria-controls="nav-Prepairing" aria-selected="true">Preparing</a>
                </li>

                <!-- <li class="nav-item " >
                    <a class="nav-item nav-link" id="nav-ToShip-tab" data-toggle="tab" href="#nav-ToShip" role="tab" aria-controls="nav-ToShip" aria-selected="false">To Ship</a>
                </li> -->

                <li class="nav-item " >
                    <a class="nav-item nav-link" id="nav-ToReceive-tab" data-toggle="tab" href="#nav-ToReceive" role="tab" aria-controls="nav-ToReceive" aria-selected="false">To Receive</a>
                </li>

                <li class="nav-item  " >
                    <a class="nav-item nav-link" id="nav-ToReview-tab" data-toggle="tab" href="#nav-ToReview" role="tab" aria-controls="nav-ToReview" aria-selected="false">Completed</a>
                </li>

                    </ul>
                    </div>
                </div>
            </div>

        
        <div class="tab-content justify-content-center " id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-Pending" role="tabpanel" aria-labelledby="nav-Pending-tab">
            <!-- <div class="d-flex justify-content-center">ORDER NO. <span></span></div>     -->
            <!-- <button type="button" class="btn btn-link" id="loadOrders">Load Orders</button> -->
            <div id="accordion"></div>
            
            
        </div>


            <div class="tab-pane fade" id="nav-Prepairing" role="tabpanel" aria-labelledby="nav-Prepairing-tab">
                <div id="accordion_preparing"></div>        
            </div>
                                
            <!-- <div class="tab-pane fade" id="nav-ToShip" role="tabpanel" aria-labelledby="nav-ToShip-tab">
                <div id="accordion_toship"></div>          
			</div> -->
					
            <div class="tab-pane fade" id="nav-ToReceive" role="tabpanel" aria-labelledby="nav-ToReceive-tab">
                <div id="accordion_toreceieve"></div>    
			</div>

			<div class="tab-pane fade" id="nav-ToReview" role="tabpanel" aria-labelledby="nav-ToReview-tab">
                <div id="accordion_toreview"></div>     
	        </div>
	</div>
    </div>
    </div>
    </div>
    

    <div class="terms">
    <p>If you wish to cancel an order Please Read our Cancellation</p> <br>
    <a href="terms_and_conditions.php" target="_blank">Terms & Conditions</a>
    <br>
  </div>
  <div class="terms">
  
  </div>
  <script>
    var userId = <?php echo json_encode($_SESSION["userid"]); ?>; 
    // var cancelledOrders = {}; // Track cancelled orders
    var cancelledOrders = JSON.parse(localStorage.getItem('cancelledOrders')) || {};
    $(document).ready(function() {
    // $("#loadOrders").click(function() {
        function fetchAndDisplayOrders(userId) {
    console.log(userId);
    $.ajax({
        url: "controller/get_orders_front_end.php?userId=" + userId,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            if (data.length > 0) {
                $("#accordion").empty(); // Clear existing accordion content

                // Iterate through the orders and create an accordion item for each
                data.forEach(function (order, index) {
                    var orderId = order.orderID;
                    var orderContent = createOrderTable(order);
                    var totalprice = order.total_price;
                    var accordionItem = $(
                        '<div class="card">' +
                        '<div class="card-header" id="heading' + orderId + '">' +
                        '<h5 class="mb-0">' +
                        '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
                        'ORDER #' + orderId +
                        '</button>' +
                        '</h5>' +
                        '<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">Total Price: <span class="badge badge-primary badge-pill ml-1">₱ ' + totalprice + '</span></li></ul>' +
                        '<button class="btn btn-danger cancel-btn" data-orderid="' + orderId + '" data-customerid="' + userId + '">Cancel</button>' +
                        '</div>' +
                        '<div id="collapse' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion">' +
                        '<div class="card-body">' +
                        orderContent +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );

                    accordionItem.appendTo("#accordion");

                    // Check if the order has been cancelled
                    if (cancelledOrders[orderId] && Date.now() < cancelledOrders[orderId].expiryTime) {
                        disableCancelButton(accordionItem);
                    } else {
                        // Set a timeout to disable the cancel button after 5 seconds
                        setTimeout(function () {
                            disableCancelButton(accordionItem);
                            // Mark the order as cancelled in localStorage
                            cancelledOrders[orderId] = {
                                expiryTime: Date.now() + 5000 // 5 seconds from now
                            };
                            localStorage.setItem('cancelledOrders', JSON.stringify(cancelledOrders));
                        }, 5000);

                        // Set an interval to update the timer every second
                        var remainingTime = 5; // 5 seconds
                        var timerElement = accordionItem.find("#timer" + orderId);
                        var timerInterval = setInterval(function () {
                            var minutes = Math.floor(remainingTime / 60);
                            var seconds = remainingTime % 60;
                            timerElement.text(minutes + ':' + (seconds < 10 ? '0' : '') + seconds);

                            remainingTime--;

                            if (remainingTime < 0) {
                                clearInterval(timerInterval);
                                timerElement.text('0:00');
                            }
                        }, 1000);
                    }
                });
            }
        },
        error: function () {
            console.log("Failed to load orders.");
        }
    });
}

// Call the function with the userId
fetchAndDisplayOrders(<?php echo json_encode($_SESSION["userid"]); ?>);

    // });
    function disableCancelButton(accordionItem) {
        var cancelBtn = accordionItem.find(".cancel-btn");
        cancelBtn.prop("disabled", true);
        cancelBtn.text("Cancelled"); // Optional: Change button text
    }

    function createOrderTable(order) {
        var table = '<table class="table">' +
            '<thead>' +
            '<tr>' +
            '<th scope="col"></th>' +
            '<th scope="col">Product Name</th>' +
            '<th scope="col">Size</th>' +
            '<th scope="col">Price</th>' +
            '<th scope="col">Quantity</th>' +
            '<th scope="col">Addons</th>' +
            '<th scope="col">Item Subtotal</th>' +
            '<th scope="col"></th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>';

        order.products.forEach(function(product) {
            // Add rows for each product
            table += '<tr>' +
                '<td class="center-content"><img class="card-img-top" src="upload/' + product.image_url + '" alt="Card image cap" style=""></td>' +
                '<td class="center-content">' + product.product_name + '</td>' +
                '<td class="center-content">' + product.size_name + '</td>' +
                '<td class="center-content">' + product.product_price + '</td>' +
                '<td class="center-content"><span>' + product.quantity + '</span></td>' +
                '<td class="center-content">' + product.addons_name + ' <span>' + product.addons_price + '</span></td>' +
                '<td class="center-content">' + product.subtotal + '</td>' +
                '</tr>';
        });

        table += '</tbody></table>';
        return table;
    }

    $("#nav-Prepairing-tab").on("click", function () {
    // Call the function with the userId
    fetchAndDisplayOrdersPreparing(<?php echo json_encode($_SESSION["userid"]); ?>);
});

function fetchAndDisplayOrdersPreparing(userId) {
    console.log(userId);
    $.ajax({
        url: "controller/get_order_front_end_preparing.php?userId=" + userId,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            if (data.length > 0) {
                $("#accordion_preparing").empty(); // Clear existing accordion content

                // Iterate through the orders and create an accordion item for each
                data.forEach(function (order, index) {
                    var orderId = order.orderID;
                    var orderContent = createOrderTable(order);
                    var totalprice = order.total_price;
                    var accordionItem = $(
                        '<div class="card">' +
                        '<div class="card-header" id="heading' + orderId + '">' +
                        '<h5 class="mb-0">' +
                        '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse_prepare' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
                        'ORDER #' + orderId +
                        '</button>' +
                        '</h5>' +
                        '<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">Total Price: <span class="badge badge-primary badge-pill ml-1">₱ ' + totalprice + '</span></li></ul>' +
                        '</div>' +
                        '<div id="collapse_prepare' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion_preparing">' +
                        '<div class="card-body">' +
                        orderContent +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );

                    accordionItem.appendTo("#accordion_preparing");

                });
            }
        },
        error: function () {
            console.log("Failed to load orders.");
        }
    });
}

$("#nav-ToShip-tab").on("click", function () {
    // Call the function with the userId
    fetchAndDisplayOrdersToShip(<?php echo json_encode($_SESSION["userid"]); ?>);
});

// function fetchAndDisplayOrdersToShip(userId) {
//     console.log(userId);
//     $.ajax({
//         url: "controller/get_orders_front_end.php?userId=" + userId,
//         type: "GET",
//         dataType: "json",
//         success: function (data) {
//             console.log(data);
//             if (data.length > 0) {
//                 $("#accordion_toship").empty(); // Clear existing accordion content

//                 // Iterate through the orders and create an accordion item for each
//                 data.forEach(function (order, index) {
//                     var orderId = order.orderID;
//                     var orderContent = createOrderTable(order);
//                     var totalprice = order.total_price;
//                     var accordionItem = $(
//                         '<div class="card">' +
//                         '<div class="card-header" id="heading' + orderId + '">' +
//                         '<h5 class="mb-0">' +
//                         '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse_toship' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
//                         'ORDER #' + orderId +
//                         '</button>' +
//                         '</h5>' +
//                         '<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">Total Price: <span class="badge badge-primary badge-pill ml-1">₱ ' + totalprice + '</span></li></ul>' +
//                         '</div>' +
//                         '<div id="collapse_toship' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion_preparing">' +
//                         '<div class="card-body">' +
//                         orderContent +
//                         '</div>' +
//                         '</div>' +
//                         '</div>'
//                     );

//                     accordionItem.appendTo("#accordion_toship");

//                 });
//             }
//         },
//         error: function () {
//             console.log("Failed to load orders.");
//         }
//     });
// }

$("#nav-ToReceive-tab").on("click", function () {
    // Call the function with the userId
    fetchAndDisplayOrdersToReceive(<?php echo json_encode($_SESSION["userid"]); ?>);
});

function fetchAndDisplayOrdersToReceive(userId) {
    console.log(userId);
    $.ajax({
        url: "controller/get_orders_front_end_ToReceive.php?userId=" + userId,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            if (data.length > 0) {
                $("#accordion_toreceieve").empty(); // Clear existing accordion content

                // Iterate through the orders and create an accordion item for each
                data.forEach(function (order, index) {
                    var orderId = order.orderID;
                    var orderContent = createOrderTable(order);
                    var totalprice = order.total_price;
                    var accordionItem = $(
                        '<div class="card">' +
                        '<div class="card-header" id="heading' + orderId + '">' +
                        '<h5 class="mb-0">' +
                        '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse_toreceive' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
                        'ORDER #' + orderId +
                        '</button>' +
                        '</h5>' +
                        '<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">Total Price: <span class="badge badge-primary badge-pill ml-1">₱ ' + totalprice + '</span></li></ul>' +
                        '</div>' +
                        '<div id="collapse_toreceive' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion_preparing">' +
                        '<div class="card-body">' +
                        orderContent +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );

                    accordionItem.appendTo("#accordion_toreceieve");

                });
            }
        },
        error: function () {
            console.log("Failed to load orders.");
        }
    });
}

$("#nav-ToReview-tab").on("click", function () {
    // Call the function with the userId
    fetchAndDisplayOrdersToReview(<?php echo json_encode($_SESSION["userid"]); ?>);
});

function fetchAndDisplayOrdersToReview(userId) {
    console.log(userId);
    $.ajax({
        url: "controller/get_orders_front_end_ToReview.php?userId=" + userId,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            if (data.length > 0) {
                $("#accordion_toreview").empty(); // Clear existing accordion content

                // Iterate through the orders and create an accordion item for each
                data.forEach(function (order, index) {
                    var orderId = order.orderID;
                    var orderContent = createOrderTable(order);
                    var totalprice = order.total_price;
                    var accordionItem = $(
                        '<div class="card">' +
                        '<div class="card-header" id="heading' + orderId + '">' +
                        '<h5 class="mb-0">' +
                        '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse_toreview' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
                        'ORDER #' + orderId +
                        '</button>' +
                        '</h5>' +
                        '<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">Total Price: <span class="badge badge-primary badge-pill ml-1">₱ ' + totalprice + '</span></li></ul>' +
                        '</div>' +
                        '<div id="collapse_toreview' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion_preparing">' +
                        '<div class="card-body">' +
                        orderContent +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );

                    accordionItem.appendTo("#accordion_toreview");

                });
            }
        },
        error: function () {
            console.log("Failed to load orders.");
        }
    });
}

});

  </script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include "c_footer.php"; ?>

