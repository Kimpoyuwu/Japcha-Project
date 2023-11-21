<?php
    include "adminHeader.php";
    require_once "../classes/dbh.classes.php";
    require_once "../classes/StatisticsModel.php";
    $Stat = new StatisticsModel();
?>
<link rel="stylesheet" href="../assets/css/admindashboard.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="adminDashboard.css"> -->
<?php
        if(isset($_SESSION["dashboardview"]) && $_SESSION["dashboardview"] == 1){                 
?>    
<style>

  .card-header{
    background-color: pink;
  }

  .more-info{
    font-size: 20px;
  }

  .Products{
    background-color: #0091d5;
  }

  .Sales {
    background-color: #6ab187;
  }

  .Orders{
    background-color: #4cb5f5;
  }

  .Deliveries{
    background-color: #b3c100;
  }

  </style>
<div class="container mt-4 mr-0 mb-0 pd-0 pl-0  float: right;" >
    <p class="Dashboard text-left"  style="margin-top: 50px;">Dashboard</p>
      <div class="row">

        <div class="col-md-3">
          <div class="card" style="width: 270px; margin-left: 20px;">
            <div class="card-header Products py-3 text-center ">
            <h5 class="card-header Products">TOTAL PRODUCTS</h5>
                <div class="card-body">
                <h1 class="card-title prodCount"></h1>
                  <div class="more-info">
                <a href="adminProducts.php" id="#">More Info</a>
              </div>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 270px; ">
            <div class="card-header Sales py-3 text-center">
            <h5 class="card-header Sales">TOTAL SALES </h5>
                <div class="card-body">
                <h1 class="card-title">43</h1>
                  <div class="more-info">
                <a href="AdminStatistics_v2.php" id="#">More Info</a>
              </div>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 270px;">
            <div class="card-header Orders py-3 text-center">
            <h5 class="card-header Orders">TOTAL ORDERS </h5>
                <div class="card-body">
                  <h1 class="card-title orderCount"></h1>
              <div class="more-info">
                <a href="AdminOrders.php" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 270px;">
            <div class="card-header Deliveries py-3 text-center">
            <h5 class="card-header Deliveries">TOTAL DELIVERIES</h5>
                <div class="card-body">
                <h1 class="card-title DeliveryCount"></h1>
              <div class="more-info">
                <a href="AdminStatistics_v2.php" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row2">
      <div class="col-12 col-xl-8 mb-4 mb-lg-0">
            <div class="card">
                <h5 class="card-header" style="background-color: white;">Active Orders</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Product</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Total</th>
                                <!-- <th scope="col"></th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">17371705</th>
                                <td>Fruit Tea</td>
                                <td>johndoe@gmail.com</td>
                                <td>€61.11</td>
                                <!-- <td><a href="#" class="btn btn-sm btn-primary">View</a></td> -->
                              </tr>
                       
                            </tbody>
                          </table>
                    </div>
                      <a href="AdminOrders.php" class="btn btn-block btn-light">View all</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <!-- Another widget will go here -->
        </div>
    
</div>
<?php
      }
?>
<script>
  $(document).ready(function() {
    // Call the function to fetch and display the product count
    fetchProductCount();
    fetchTotalOrders();
    fetchTotalDeliveries();
    function fetchProductCount() {
        $.ajax({
            url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
            type: 'GET',
            data:{product: "product"},
            dataType: 'json',
            success: function(response) {
                // Update the card with the fetched product count
                updateProductCount(response.count);
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    }

    function fetchTotalOrders() {
        $.ajax({
            url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
            type: 'GET',
            data:{order: "order"},
            dataType: 'json',
            success: function(response) {
                // Update the card with the fetched product count
                updateOrderCount(response.countOrder)
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    }

    function fetchTotalDeliveries() {
        $.ajax({
            url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
            type: 'GET',
            data:{deliveries: "deliveries"},
            dataType: 'json',
            success: function(response) {
                // Update the card with the fetched product count
                updateDeliveriesCount(response.CountDeliver)
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    }


    function updateProductCount(count) {
        // Update the content of the card with the product count
        $('.prodCount').text(count);
    }

    function updateOrderCount(count) {
        // Update the content of the card with the product count
        $('.orderCount').text(count);
    }

    function updateDeliveriesCount(count) {
        // Update the content of the card with the product count
        $('.DeliveryCount').text(count);
    }
});
</script>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script> -->

<?php
    include "adminFooter.php";

?>
