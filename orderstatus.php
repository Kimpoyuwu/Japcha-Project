<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <?php include "c_header.php"; ?>
    <style>
       .container {
    height: auto;
    width: 100%;
    padding-left: 180px;
    margin-top: 130px;
    /* margin-left: 170px; */
    }

    .card-img-top {
        border: 2px solid gray;
        max-width: 100px;
        max-height: 100px;
        background-color: #D0BC05;
    }

    .nav-item {
        margin-right: 20px;
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
        <div class="row">
            <ul class="nav nav-tab justify-content-center ">

                <li class="nav-item  " style="margin-right: 20px ">
                    <a class="nav-item nav-link active" id="nav-Pending-tab" data-toggle="tab" href="#nav-Pending" role="tab" aria-controls="nav-Pending" aria-selected="true">Pending</a>
                </li>

                <li class="nav-item  " style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-Prepairing-tab" data-toggle="tab" href="#nav-Prepairing" role="tab" aria-controls="nav-Prepairing" aria-selected="true">Preparing</a>
                </li>

                <li class="nav-item "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToShip-tab" data-toggle="tab" href="#nav-ToShip" role="tab" aria-controls="nav-ToShip" aria-selected="false">To Ship</a>
                </li>

                <li class="nav-item "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToReceive-tab" data-toggle="tab" href="#nav-ToReceive" role="tab" aria-controls="nav-ToReceive" aria-selected="false">To Receive</a>
                </li>

                <li class="nav-item  "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToReview-tab" data-toggle="tab" href="#nav-ToReview" role="tab" aria-controls="nav-ToReview" aria-selected="false">Completed</a>
                </li>

                    </ul>
                    </div>
                </div>
            </div>

        
        <div class="tab-content justify-content-center " id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-Pending" role="tabpanel" aria-labelledby="nav-Pending-tab">
            <!-- <div class="d-flex justify-content-center">ORDER NO. <span></span></div>     -->

            <div id="accordion"></div>
            <button id="loadOrders">Load Orders</button>
            
        </div>


                            <div class="tab-pane fade" id="nav-Prepairing" role="tabpanel" aria-labelledby="nav-Prepairing-tab">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Addons</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                            require_once "classes/OrderModel.php";
                                            require_once "classes/ProductsModel.php";
                                            $product_Model = new ProductModel();
                                            $orderModel = new Order();

                                            $order = $orderModel->getOrderPrearpingFrontEnd($_SESSION["userid"]);
                                            if($order != false){

                                           
                                            foreach ($order as $order_info):
                                                $order_details = $orderModel->getData($order_info['product_id'], $order_info['sizes_id'], $_SESSION["userid"]);
                                                $addons_details = $orderModel->getAddons($order_info['addons_id']);
                                                $addons_name = $addons_details['addons_name'] ?? "None";
                                                $addons_price = $addons_details['price'] ?? "";

                                                $product_details = $orderModel->getPriceBySize($order_info['sizes_id'], $order_info['product_id']);
                                                
                                        ?>
                                                <tr>
                                                            <td class="center-content"><img class="card-img-top" src="upload/<?= $order_details['image_url'] ?>" alt="Card image cap" style=""></td>
                                                            <td class="center-content"><?= $order_details['product_name'] ?></td>
                                                            <td class="center-content"><?= $product_details ?></td>
                                                            <td class="center-content"><span><?= $order_info['quantity'] ?></span> </td>
                                                                <td class="center-content"><?= $addons_name ?> <span><?= $addons_price ?></span></td>
                                                            <td class="center-content"><?= $order_info['subtotal'] ?></td>
                                                            <!-- <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td> -->
                                                </tr>
                                        <?php
                                            endforeach;
                                        }
                                        ?>
                                            
                    </tbody>
                </table>
            </div>
                                <div class="tab-pane fade" id="nav-ToShip" role="tabpanel" aria-labelledby="nav-ToShip-tab">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Addons</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                            require_once "classes/OrderModel.php";
                                            require_once "classes/ProductsModel.php";
                                            $product_Model = new ProductModel();
                                            $orderModel = new Order();

                                            $order = $orderModel->getOrderDeliveryFrontEnd($_SESSION["userid"]);
                                            if($order != false){
                                            foreach ($order as $order_info):
                                                $order_details = $orderModel->getData($order_info['product_id'], $order_info['sizes_id'], $_SESSION["userid"]);
                                                $addons_details = $orderModel->getAddons($order_info['addons_id']);
                                                $addons_name = $addons_details['addons_name'] ?? "None";
                                                $addons_price = $addons_details['price'] ?? "";

                                                $product_details = $orderModel->getPriceBySize($order_info['sizes_id'], $order_info['product_id']);
                                                
                                        ?>
                                                <tr>
                                                            <td class="center-content"><img class="card-img-top" src="upload/<?= $order_details['image_url'] ?>" alt="Card image cap" style=""></td>
                                                            <td class="center-content"><?= $order_details['product_name'] ?></td>
                                                            <td class="center-content"><?= $product_details ?></td>
                                                            <td class="center-content"><span><?= $order_info['quantity'] ?></span> </td>
                                                                <td class="center-content"><?= $addons_name ?> <span><?= $addons_price ?></span></td>
                                                            <td class="center-content"><?= $order_info['subtotal'] ?></td>
                                                            <!-- <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td> -->
                                                </tr>
                                        <?php
                                            endforeach;
                                        }
                                        ?>
                    </tbody>
                </table>
					</div>
					<div class="tab-pane fade" id="nav-ToReceive" role="tabpanel" aria-labelledby="nav-ToReceive-tab">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Addons</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                            require_once "classes/OrderModel.php";
                                            require_once "classes/ProductsModel.php";
                                            $product_Model = new ProductModel();
                                            $orderModel = new Order();

                                            $order = $orderModel->getOrderDeliveryFrontEnd($_SESSION["userid"]);
                                            if($order != false){
                                            foreach ($order as $order_info):
                                                $order_details = $orderModel->getData($order_info['product_id'], $order_info['sizes_id'], $_SESSION["userid"]);
                                                $addons_details = $orderModel->getAddons($order_info['addons_id']);
                                                $addons_name = $addons_details['addons_name'] ?? "None";
                                                $addons_price = $addons_details['price'] ?? "";

                                                $product_details = $orderModel->getPriceBySize($order_info['sizes_id'], $order_info['product_id']);
                                                
                                        ?>
                                                <tr>
                                                            <td class="center-content"><img class="card-img-top" src="upload/<?= $order_details['image_url'] ?>" alt="Card image cap" style=""></td>
                                                            <td class="center-content"><?= $order_details['product_name'] ?></td>
                                                            <td class="center-content"><?= $product_details ?></td>
                                                            <td class="center-content"><span><?= $order_info['quantity'] ?></span> </td>
                                                                <td class="center-content"><?= $addons_name ?> <span><?= $addons_price ?></span></td>
                                                            <td class="center-content"><?= $order_info['subtotal'] ?></td>
                                                            <!-- <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td> -->
                                                </tr>
                                        <?php
                                            endforeach;
                                        }
                                        ?>
                                   
                    </tbody>
                </table>
					</div>
					<div class="tab-pane fade" id="nav-ToReview" role="tabpanel" aria-labelledby="nav-ToReview-tab">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Addons</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                            require_once "classes/OrderModel.php";
                                            require_once "classes/ProductsModel.php";
                                            $product_Model = new ProductModel();
                                            $orderModel = new Order();

                                            $order = $orderModel->getOrderCompletedFrontEnd($_SESSION["userid"]);
                                            if($order != false){
                                            foreach ($order as $order_info):
                                                $order_details = $orderModel->getData($order_info['product_id'], $order_info['sizes_id'], $_SESSION["userid"]);
                                                $addons_details = $orderModel->getAddons($order_info['addons_id']);
                                                $addons_name = $addons_details['addons_name'] ?? "None";
                                                $addons_price = $addons_details['price'] ?? "";

                                                $product_details = $orderModel->getPriceBySize($order_info['sizes_id'], $order_info['product_id']);
                                                
                                        ?>
                                                <tr>
                                                            <td class="center-content"><img class="card-img-top" src="upload/<?= $order_details['image_url'] ?>" alt="Card image cap" style=""></td>
                                                            <td class="center-content"><?= $order_details['product_name'] ?></td>
                                                            <td class="center-content"><?= $product_details ?></td>
                                                            <td class="center-content"><span><?= $order_info['quantity'] ?></span> </td>
                                                                <td class="center-content"><?= $addons_name ?> <span><?= $addons_price ?></span></td>
                                                            <td class="center-content"><?= $order_info['subtotal'] ?></td>
                                                            <!-- <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td> -->
                                                </tr>
                                        <?php
                                            endforeach;
                                        }
                                        ?>
                                  
                    </tbody>
                </table>
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
    $(document).ready(function() {
    $("#loadOrders").click(function() {
        $.ajax({
            url: "controller/get_orders_front_end.php?userId=" + userId, // Replace with your server-side script that retrieves orders
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $("#accordion").empty(); // Clear existing accordion content

                    // Iterate through the orders and create an accordion item for each
                    data.forEach(function(order, index) {
                        var orderId = order.orderID;
                        var orderContent = createOrderTable(order);

                        var accordionItem = $(
                            '<div class="card">' +
                            '<div class="card-header" id="heading' + orderId + '">' +
                            '<h5 class="mb-0">' +
                            '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse' + orderId + '" aria-expanded="true" aria-controls="collapse' + orderId + '">' +
                            'ORDER #' + orderId +
                            '</button>' +
                            '</h5>' +
                            '</div>' +
                            '<div id="collapse' + orderId + '" class="collapse" aria-labelledby="heading' + orderId + '" data-parent="#accordion">' +
                            '<div class="card-body">' +
                            orderContent +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );

                        accordionItem.appendTo("#accordion");
                    });
                }
            },
            error: function() {
                console.log("Failed to load orders.");
            }
        });
    });

    function createOrderTable(order) {
        var table = '<table class="table">' +
            '<thead>' +
            '<tr>' +
            '<th scope="col"></th>' +
            '<th scope="col">Product Name</th>' +
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
                '<td class="center-content"><img class="card-img-top" src="' + product.image_url + '" alt="Card image cap" style=""></td>' +
                '<td class="center-content">' + product.product_name + '</td>' +
                '<td class="center-content">' + product.price + '</td>' +
                '<td class="center-content"><span>' + product.quantity + '</span></td>' +
                '<td class="center-content">' + product.addons_name + ' <span>' + product.addons_price + '</span></td>' +
                '<td class="center-content">' + product.subtotal + '</td>' +
                '</tr>';
        });

        table += '</tbody></table>';
        return table;
    }
});

  </script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include "c_footer.php"; ?>

