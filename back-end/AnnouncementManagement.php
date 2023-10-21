<?php
include_once "adminHeader.php";
?>

<?php
  include "../classes/dbh.classes.php";
  include "../classes/AnnouncementModel.php";
  $announcement = new AnnouncementModel();
  $getAnnouncement = $announcement->getAllAnnouncement();
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
            <th></th>
            <th>Date</th>
            <th>Announcement</th>
            <th>Content</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
            $count =1;
            foreach($getAnnouncement as $gAnnouncement):
        ?>
        
          <!-- Sample coupon data -->
          <tr>
            <td><?= $count?></td>
            <td><?= $gAnnouncement['announcement_date']?></td>
            <td><?= $gAnnouncement['announcement']?></td>
            <td><?= $gAnnouncement['content']?></td>
            <td><button type="button" class="btn" style="background-color: black; border-color: black; color: #ffffff;" data-toggle="modal" data-target="#editModal <?=$gAnnouncement['id']?>">Edit</button>
              <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button></td>
          </tr>

        <?php
           $count++; endforeach;
        ?>
        </tbody>
      </table>
    </div>
  </div>

      <!-- Add Announcement Modal -->
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
                      <!-- Add a form element with the appropriate method and action attributes -->
                      <form action="../includes/add-announcement.inc.php" method="post">
                          <div class="form-group">
                              <label for="editStartTime">Date</label>
                              <input required type="datetime-local" class="form-control" id="editStartTime" name="editStartTime">
                          </div>
                          <div class="form-group">
                              <label for="couponCode">Announcement Title</label>
                              <input required type="text" class="form-control" id="couponCode" name="editTitle" placeholder="Enter Title here...">
                          </div>
                          <div class="form-group">
                              <label for="announcementContent">Content</label>
                              <textarea required class="form-control" id="announcementContent" rows="3" name="editContent" placeholder="Enter content here..."></textarea>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <!-- Change the button type to "submit" to submit the form -->
                              <button type="submit" class="btn" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;" name="saveButton">Save</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- For Editing Modal -->
      <?php
        include "EditAnnouncementManagement.php";
      ?>

    
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
<?php
    include_once "adminFooter.php";
?>