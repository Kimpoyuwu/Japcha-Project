<?php
    include "adminHeader.php";
?>
<link rel="stylesheet" href="../assets/css/admindashboard.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="adminDashboard.css"> -->
<div class="container mt-4 mr-0 mb-0 pd-0 pl-0  float: right;" >
    <p class="Dashboard text-left">Dashboard</p>
      <div class="row">
        <div class="col-md-3">
          <div class="card" style="width: 200px; margin-left: auto;">
            <div class="card-header py-3 text-center ">
              <p class="label font-weight-bold"> <i class="fa-solid fa-box fa-xl"></i> TOTAL PRODUCTS</p>
              <h2 class="data font-weight-bold">200</h2>
              <div class="more-info">
                <a href="#" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 200px; margin-left: auto;">
            <div class="card-header py-3 text-center">
              <p class="label font-weight-bold"> <i class="fa-solid fa-chart-line fa-xl"></i> TOTAL SALES</p>
              <h2 class="data font-weight-bold">30,000</h2>
              <div class="more-info">
                <a href="#" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 200px; margin-left: auto;">
            <div class="card-header py-3 text-center">
              <p class="label font-weight-bold"> <i class="fa-solid fa-cart-shopping fa-xl"></i> TOTAL ORDERS</p>
              <h2 class="data font-weight-bold">200</h2>
              <div class="more-info">
                <a href="#" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
    
        <div class="col-md-3">
          <div class="card" style="width: 200px; margin-left: auto;">
            <div class="card-header py-3 text-center">
              <p class="label font-weight-bold"> <i class="fa-solid fa-truck-fast fa-xl"></i></i> TOTAL DELIVERIES</p>
              <h2 class="data font-weight-bold">20</h2>
              <div class="more-info">
                <a href="#" id="#">More Info</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row2">
      <div class="card shadow float: right;"  style="width: 400px; margin-left: 50px;">
          <div class="card-header py-3 text-center float">
              <h6 class="m-0 font-weight-bold text-center">Active Orders</h6>
          </div>
          <div class="card-body">
              <h4 class="small font-weight-bold"><span
                      class="float-right"></span></h4>
              <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                      aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><span
                      class="float-right"></span></h4>
              <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><span
                      class="float-right"></span></h4>
              <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 60%"
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><span
                      class="float-right"></span></h4>
              <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                      aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><span
                      class="float-right"></span></h4>
              <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                      aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
          </div>
      </div>
      <!-- Add similar card elements for other tiles -->
    
</div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
    include "adminFooter.php";

?>
