<?php
    foreach($getAnnouncement as $gAnnouncement):
?>

<div class="modal fade" id="editModal <?=$gAnnouncement['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addCouponModalLabel">Edit Announcement</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Add a form element with the appropriate method and action attributes -->
                      <form action="../includes/add-announcement.inc.php" method="post">
                          <div class="form-group"> <input type="hidden" value ="<?= $gAnnouncement['id']?>" name="couponID">
                              <label for="editStartTime">Date</label>
                              <input required type="datetime-local" class="form-control" id="editStartTime" value ="<?= $gAnnouncement['announcement_date'] ?>" name="editStartTime">
                          </div>
                          <div class="form-group">
                              <label for="couponCode">Announcement Title</label>
                              <input required type="text" class="form-control" id="couponCode" value ="<?= $gAnnouncement['announcement'] ?>" name="editTitle" placeholder="Enter Title here...">
                          </div>
                          <div class="form-group">
                              <label for="announcementContent">Content</label>
                              <textarea required class="form-control" id="announcementContent"rows="3" name="editContent" placeholder="Enter content here..."> <?= $gAnnouncement['content'] ?></textarea>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              <button type="submit" class="btn" data-toggle ="modal" data-target="#editModal" style="background-color: #D0BC05; border-color: #D0BC05; color: #ffffff;" name="updateButton">Save Changes</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

<?php 
        endforeach;
?> 