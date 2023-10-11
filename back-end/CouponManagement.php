<?php
    include "adminHeader.php";
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
          <tr>
            <td>Coupon123</td>
            <td>Weekend Offer</td>
            <td>10%</td>
            <td>10/01/2023, 02:20 PM</td>
            <td>10/02/2023, 04:20 PM</td>
            <td>
              <button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;">Edit</button>
              <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button>
            </td>
          </tr>
          <tr>
            <td>Coupon456</td>
            <td>Weekdays Offer</td>
            <td>20%</td>
            <td>10/04/2023, 04:20 PM</td>
            <td>10/09/2023, 06:20 PM</td>
            <td>
              <button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;">Edit</button>
              <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button>
            </td>
          </tr>
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
                  <label for="editStartTime">Start Time</label>
                  <input type="datetime-local" class="form-control" id="editStartTime" name="editStartTime">
                </div>
                <div class="form-group">
                  <label for="editEndTime">End Time</label>
                  <input type="datetime-local" class="form-control" id="editEndTime" name="editEndTime">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;">Save</button>
                </div>  
              </form>
            </div>
          </div>
        </div>
      </div>

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