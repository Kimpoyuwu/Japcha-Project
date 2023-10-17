<?php
include_once "adminHeader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcement Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5" style="height: 80%; width: 100%; padding-left: 280px;  margin-top: 80px;">
    <h1 class="mb-4">Announcement Management</h1>

    <button type="button" class="btn" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;" data-toggle="modal" data-target="#addCouponModal">
      Add New
    </button>
    
    <div class="table-responsive mt-4">
      <div class="input-group mb-3" style= "width: 100%; padding-left: 280px;  margin-top: 80px;" >
        <input type="text" class="form-control" placeholder="Search Announcements" aria-label="Search Announcements" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
      </div>          
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Announcement</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample coupon data -->
          <tr>
            <td>10/09/2023, 02:05 PM</td>
            <td>Announcement</td>
            <td>
              <button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;">Edit</button>
              <button type="button" class="btn" style="background-color: #85B6FF; border-color: #85B6FF; color: white;">Details</button>
              <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button>
            </td>
          </tr>
          <tr>
            <td>10/09/2023, 04:10 PM</td>
            <td>Announcement</td>
            <td>
              <button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;">Edit</button>
              <button type="button" class="btn" style="background-color: #85B6FF; border-color: #85B6FF; color: white;">Details</button>
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
              <h5 class="modal-title" id="addCouponModalLabel">Add Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="editStartTime">Date</label>
                  <input type="datetime-local" class="form-control" id="editStartTime" name="editStartTime">
                </div>
                <div class="form-group">
                  <label for="couponCode">Title</label>
                  <input type="text" class="form-control" id="couponCode" placeholder="">
                </div>
                <div class="form-group">
                  <label for="announcementContent">Content</label>
                  <textarea class="form-control" id="announcementContent" rows="3" placeholder="Enter content"></textarea>
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
    
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
<?php
include_once "adminFooter.php";
?>