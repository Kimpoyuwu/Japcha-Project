<?php
    require_once ("adminHeader.php");
    // require_once("../classes/add-size-cntrl.classes.php");  
    // $obj = new AddSizeContr;
    include_once "../config/databaseConnection.php";
?>
    <main class="table_category">
        <section class="table_header">
            <h1>Sizes</h1>
            <!-- <input type="search" class="search" placeholder="Search...."> -->
        </section>
        <section class="table_body">
            <table>
                <thead>
                  <tr>
                    <th>Sizes</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1 && isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                echo'<th colspan="2">Action</th>';
                            }
                    ?>
                  </tr>
                  <tbody>
                    <?php
                     $query = "SELECT * FROM size LIMIT 6";
                     $result = mysqli_query($con, $query);
                 
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $sizeName = $row['size_name'];
                          $sizeID = $row['size_id'];
                     ?>
                    <tr>
                      <td><?=$sizeName?></td>
                      <?php
                            if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                              echo '<td><button class="remove"><a href="#">Remove</a></button></td>';

                            }
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                              echo '<td><button class="update" data-id="' . $sizeID . '"><a href="#">update</a></button></td>';

                            }
                      ?>
                      
                     
                    </tr>
                    <?php } } ?>      
                  </tbody>
                </thead>
            </table>
            
    </main>
    
    
<?php
    if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
      echo' <div class="btnAddCategory">
                <button type="button" class="btn1" onclick="openPopup()" style="height:40px">Add Size</button>
            </div>';
    }
?>
   

    <!--triggers can't click outside element when modal is open -->
    <div id="modalOverlay">
    <div class="modal-container" id="popup">
        <div class="modal-header">
          <h4 class="modal-title">New Size Item</h4>
          <button type="button" class="close" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="../includes/sizes.inc.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="size">Size Name: </label>
              <input type="text" class="form-control" name="size" required>
            </div>
            <div class="form-group-button">
              <button type="submit" class="btn1" style="height:40px" name="submit">Add Size</button>
            </div>
          </form>
        </div>
     </div>
    </div>
     <div id="alertContainer"></div>

  <!-- ################################################################################# -->
  <div id="modalupdate">
    <div class="modal-container2" id="popup2">
        <div class="modal-header">
          <h4 class="modal-title">New Add-Ons Item</h4>
          <button type="button" class="close2" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="../includes/update-sizes.inc.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="size">Add-Ons Name: </label>
              <input type="hidden" class="form-control" name="sizeid" id="sizeid" >
              <input type="text" class="form-control" name="sizename" id="sizename" required>
            </div>
            <div class="form-group-button">
              <button type="submit" class="btn1" style="height:40px" name="submit">Update</button>
            </div>
          </form>
        </div>
     </div>
    </div>
    <!-- ################################################################################# -->
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
  if (event.target === modalOverlay || event.key === "Escape") {
    closePopup();
  }
}

// Listen for clicks on the modal overlay
modalOverlay.addEventListener("click", closeModal);

// Listen for keydown events to close the modal when "Escape" key is pressed
document.addEventListener("keydown", closeModal);
  </script>
  <script src="../assets/js/size.js"></script>
    
<?php
    include_once "adminFooter.php";

?>