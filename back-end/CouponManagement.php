<?php
    include "adminHeader.php";
?>

<?php
include "../classes/dbh.classes.php";
include "../classes/CouponModel.php";
$coupon = new CouponModel();
$getCoupon = $coupon->getAllCoupon();
?>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <div class="container mt-5" style="height: 80%; width: 100%; padding-left: 280px;  margin-top: 80px;">
    <h1 class="mb-4">Coupon Management</h1>

    <button type="button" class="btn" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;" data-toggle="modal" data-target="#addCouponModal">
      Add Coupon
    </button>
    

    <div class="table-responsive mt-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>Coupon Code</th>
            <th>Offer Name</th>
            <th>Discount (%)</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Action</th>
          
          </tr>
        </thead>
        <tbody>
          <!-- Sample coupon data -->
          <?php
                     
                     $count = 1;
                     foreach ($getCoupon as $gCoupon):
                  ?>
          <tr>
            <td><?= $count?></td>
            <td><?= $gCoupon['coupon_code']?></td>
            <td><?= $gCoupon['offer_name']?></td>
            <td><?= $gCoupon['discount_percentage']?></td>
            <td><?= $gCoupon['start_time']?></td>
            <td><?= $gCoupon['end_time']?></td>
            <td>
              <button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;"
              data-toggle="modal" data-target="#editModal<?= $gCoupon['id'] ?>">Edit </button>
              <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button>
            </td>
          
          </tr>
          <?php 
                       $count++; endforeach;
                  ?>          
          <!-- Add more coupon entries here -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Coupon Modal -->
    
      <!-- Add Coupon Modal -->
      <div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCouponModalLabel">Add Coupon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="../includes/add-coupon.inc.php" method="post">
                <div class="form-group">
                  <label for="couponCode">Coupon Code</label>
                  <input required type="text" class="form-control" id="couponCode" name ="couponCode"placeholder="Enter coupon code">
                </div>
                <div class="form-group">
                  <label for="discount">Offer Name</label>
                  <input required type="text" class="form-control" id="offerName" name ="offerName"placeholder="">
                </div>
                <div class="form-group">
                  <label for="discount">Discount (%)</label>
                  <input required type="text" class="form-control" id="discount" name = "discount"placeholder="Enter discount percentage">
                </div>
                <div class="form-group">
                  <label for="editStartTime">Start Time</label>
                  <input required type="datetime-local" class="form-control" id="editStartTime" name="StartTime">
                </div>
                <div class="form-group">
                  <label for="editEndTime">End Time</label>
                  <input required type="datetime-local" class="form-control" id="editEndTime" name="EndTime">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"name="CloseButton">Close</button>
                  <button type="submit" class="btn" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;"name ="SaveButton">Save</button>
                </div>  
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- For Editing Modal -->
      <?php
        include "EditCouponManagement.php";
      ?>


  <div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCouponModalLabel">Add Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="couponCode">Coupon Code</label>
              <input type="text" class="form-control" id="couponCode" placeholder="Enter coupon code">
            </div>
            <div class="form-group">
              <label for="discount">Offer Name</label>
              <input type="text" class="form-control" id="discount" placeholder="">
            </div>
            <div class="form-group">
              <label for="discount">Discount (%)</label>
              <input type="text" class="form-control" id="discount" placeholder="Enter discount percentage">
            </div>
            <div class="form-group">
              <label for="dateOfUsage">Start Time</label>
              <input type="date" class="form-control" id="dateOfUsage" name="dateOfUsage">
            </div>
            <div class="form-group">
              <label for="dateOfUsage">End Time</label>
              <input type="date" class="form-control" id="dateOfUsage" name="dateOfUsage">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>  
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> -->

<?php
    include "adminFooter.php";

?>