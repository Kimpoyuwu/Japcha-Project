<?php
    require_once ("adminHeader.php");
    // require_once("../classes/add-size-cntrl.classes.php");  
    // $obj = new AddSizeContr;
    require_once "../classes/dbh.classes.php";
    require_once "../classes/add-size.classes.php";
    include_once "../config/databaseConnection.php";

    $SizeModel = new addSize();
    $sizes =  $SizeModel->getAllSize();
?>
    <main class="table_category">
        <section class="table_header d-flex p-3" style="gap: 10px;">
            <h2>Sizes</h2>
            <!-- <input type="search" class="search" placeholder="Search...."> -->
            <?php
                if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
                  echo' <div class="btnAddCategory">
                            <button type="button" class="btn1" onclick="openPopup()" style="height:40px">Add Size</button>
                        </div>';
                }
            ?>
   
        </section>
        <section class="table_body">
            <table>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Sizes</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1 && isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                echo'<th colspan="2">Action</th>';
                            }
                    ?>
                  </tr>
                  <tbody>
                    <?php
                     $query = "SELECT * FROM product_sizes";
                     $result = mysqli_query($con, $query);
                     $count = 0;
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $sizeName = $row['size_name'];
                          $sizeID = $row['sizes_id'];
                          $count ++;
                     ?>
                    <tr>
                      <td><?=$count?></td>
                      <td><?=$sizeName?></td>
                      <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                              ?><td><div class="btnCon">
                                  <button class="update btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Size"
                                    data-toggle="modal" data-target="#modalupdate<?= $sizeID?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                  

                      <?php
                            }
                            if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                      ?>          <button class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Delete Size"
                                  data-toggle="modal" data-target="#delete"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                                </div></td>

                      <?php
                            }
                      ?>
                      
                     
                    </tr>
                    <?php } } ?>      
                  </tbody>
                </thead>
            </table>
            
    </main>
    
    


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
  <?php
  foreach($sizes as $size):
    $size_id = $size['sizes_id'];
  ?>
  <div class="modal fade" id="modalupdate<?= $size_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Add-Ons Item</h4>
                <button type="button" class="close" onclick="closePopup()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../includes/update-sizes.inc.php" method="post" id="formCategory">
                    <div class="form-group">
                        <label for="size">Add-Ons Name:</label>
                        <input type="hidden" class="form-control" name="sizeid" id="sizeid" value="<?=  $size_id  ?>">
                        <input type="text" class="form-control" name="sizename" id="sizename" value="<?= $size['size_name'];?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <?php
  endforeach;
  ?>
    <!-- ################################################################################# -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
     $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
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