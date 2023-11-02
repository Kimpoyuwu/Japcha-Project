<?php
    include "adminHeader.php";
    include_once "../config/databaseConnection.php";
    include_once "../classes/dbh.classes.php";
    include_once "../classes/add-category.classes.php";
    $data = new addCategory();
    $category = $data->getCategory();
?>
<?php
   if (isset($_GET["error"])) {
    if ($_GET["error"] == "categoryalreadyexist") {
        echo '<script>alert("Category already exist!");</script>';
        unset($_GET['error']);
    }
  }

?>
    <main class="table_category">
        <section class="table_header d-flex p-3" style="gap: 10px;">
            <h2>Category </h2>
            <?php
        if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
            echo' <div class="btnAddCategory">
                      <button type="button" class="btn1" onclick="openPopup()" style="height:40px">
                              Add Category</button>
                  </div>';
        }
    ?>
   
        </section>
        <section class="table_body">
            <table>
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1 && isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                echo'<th colspan="2">Action</th>';
                            }
                    ?>
                  </tr>
                  <tbody>
                  <?php
                     $query = "SELECT * FROM categories";
                     $result = mysqli_query($con, $query);
                 
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $categoryname = $row['category_name'];
                          $categoryid = $row['category_id'];
                          // $categorytime = $row['time'];

                     ?>
                    <tr>
                      <td><?=$categoryname?></td>
                      <?php
                          if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                      ?>
                            <td><div class="btnCon">
                              <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                                    data-toggle="modal" data-target="#edit<?= $row['category_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            
                     <?php  
                        }if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                      ?>
                               <button class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Delete"
                                        data-toggle="modal" data-target="#confirm<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="../includes/add-category.inc.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="c_name">Category Name: </label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group-button">
              <button type="submit" class="btn1" style="height:40px" name="submit">Add Category</button>
            </div>
          </form>
        </div>
     </div>
    </div>
     <div id="alertContainer"></div>

      <!-- ################################################################################# -->
    <?php
      include_once "EditCategory.php";
    ?>
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
  <script src="../assets/js/update.js"></script>
    
<?php
    include "adminFooter.php";

?>