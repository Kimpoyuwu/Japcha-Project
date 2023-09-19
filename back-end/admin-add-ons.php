<?php
    include_once "adminHeader.php";
    include_once "../config/databaseConnection.php";
?>



    <main class="table_category">
        <section class="table_header">
            <h1>Add-ons </h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                  <tr>
                    <th>Add-ons</th>
                    <th colspan="2">Action</th>
                  </tr>
                  <tbody>
                  <?php
                     $query = "SELECT * FROM addons LIMIT 6";
                     $result = mysqli_query($con, $query);
                 
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $addonsName = $row['addons_name'];
                          $addonsid = $row['addons_id'];

                     ?>
                    <tr>
                      <td><?=$addonsName?></td>
                      <td><button class='remove'><a href='#'>Remove</a></button></td>
                      <td><button class='update' data-id="<?= $addonsid ?>"><a href='#'>update</a></button></td>
                    </tr>
                    <?php } } ?> 
                  </tbody>
                </thead>
            </table>
    </main>


    <div class="btnAddCategory">
         <!-- Trigger the modal with a button -->
        <button type="button" class="btn1" onclick="openPopup()" style="height:40px">
                Add Add-Ons</button>
    </div>

    <!--triggers can't click outside element when modal is open -->
    <div id="modalOverlay">
    <div class="modal-container" id="popup">
        <div class="modal-header">
          <h4 class="modal-title">New Add-Ons Item</h4>
          <button type="button" class="close" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="../includes/add-ons.inc.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="addons">Add-Ons Name: </label>
              <input type="text" class="form-control" name="addons" required>
            </div>
            <div class="form-group-button">
              <button type="submit" class="btn1" style="height:40px" name="submit">Add Add-Ons</button>
            </div>
          </form>
        </div>
     </div>
    </div>

    <!-- ################################################################################# -->
    <div id="modalupdate">
    <div class="modal-container2" id="popup2">
        <div class="modal-header">
          <h4 class="modal-title">New Add-Ons Item</h4>
          <button type="button" class="close2" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="../includes/update-addons.inc.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="addons">Add-Ons Name: </label>
              <input type="hidden" class="form-control" name="addonsid" id="addonsID" >
              <input type="text" class="form-control" name="addons" id="addonsName" required>
            </div>
            <div class="form-group-button">
              <button type="submit" class="btn1" style="height:40px" name="submit">Update</button>
            </div>
          </form>
        </div>
     </div>
    </div>
    <!-- ################################################################################# -->

  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let popup = document.getElementById("popup");
    let overlay = document.getElementById("modalOverlay");
    function openPopup()
    { 
        popup.classList.add("open-modal-container");
       modalOverlay.style.display = "block";
    }
    function closePopup()
    {
      popup.classList.remove("open-modal-container");
      modalOverlay.style.display = "none";
    }
    function closeModal(event) {
  if (event.target === modalOverlay || event.key === "Escape"){
    closePopup();
   }
  }

  // Listen for clicks on the modal overlay
  modalOverlay.addEventListener("click", closeModal);

  // Listen for keydown events to close the modal when "Escape" key is pressed
  document.addEventListener("keydown", closeModal);

  $(document).ready(function(){

    get_record();
    close_update();
  });

function close_update(){
  $(document).on('click', '.close2', function() {
    // Assuming 'modalupdate' is the ID of your modal element
    document.getElementById('modalupdate').style.display = "none";
    document.getElementById('popup2').classList.remove("open-modal-container2");
  });
}
function get_record(){

  $(document).on('click', '.update', function() {
    // Assuming 'modalupdate' is the ID of your modal element
    // document.getElementById('modalupdate').style.display = "flex";
    // document.getElementById('popup2').classList.add("open-modal-container2");
  
    var id = $(this).attr('data-id');
    $.ajax(
      {
          url: 'get_data.php',
          method: 'post',
          data:{AddonsId:id},
          dataType: 'JSON',
          success: function(data) 
          {
             $("#addonsID").val(data[0]);
              $("#addonsName").val(data[1]);
              document.getElementById('modalupdate').style.display = "flex";
              document.getElementById('popup2').classList.add("open-modal-container2");
          }

    });
  });
}
  

  </script>
    
<?php
    include_once "adminFooter.php";

?>