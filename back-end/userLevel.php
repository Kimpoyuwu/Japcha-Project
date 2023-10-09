<?php
    include "adminHeader.php";
?>
<style>
    
</style>
 <div class="table_category">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<style>
.scrollable-form {
    max-height: 400px; /* Set the desired height */
    overflow-y: hidden; /* Hide vertical scrollbar by default */
    padding: 10px; /* Add padding for spacing */
    scrollbar-width: thin; /* Thin scrollbar */
    scrollbar-color: #555 #f5f5f5;
}
.scrollable-form::-webkit-scrollbar {
    width: 6px;/* Width of the scrollbar */
}

/* Show the scrollbar when hovering over .scrollable-form */
.scrollable-form:hover {
  
  overflow-y: scroll; /* Show vertical scrollbar on hover */
}

/* Customize the scrollbar thumb */
.scrollable-form::-webkit-scrollbar-thumb {
    background-color: #555; /* Thumb color */
}

/* Customize the scrollbar thumb on hover */
.scrollable-form::-webkit-scrollbar-thumb:hover {
    background-color: #333; /* Thumb color on hover */
}
</style>
<?php
   include "../classes/dbh.classes.php";
   include "../classes/user-level-Model.php";
   $UserLevel = new UserLevel();
?>
        <section class="table_header">
            <h1>User Level</h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                 
                  <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                                echo '<th>Action</th>';
                            }
                        
                        ?>
                    
                   
                  </tr>
                  <tbody>
                  <?php
                     $userlevels = $UserLevel->getUserlevel();
                     $count = 1;
                     foreach ($userlevels as $userlevel):
                  ?>
                      <tr>
                        <td><?= $count?></td>
                        <td><?= $userlevel['user_level_name']?></td>
                        <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                        ?>
                                <td><div class="btnCon">
                                    <button class="btn btn-info" data-tooltip="tooltip" data-placement="top" title="View Userlevel"
                                    data-toggle="modal" data-target="#view<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                                    data-toggle="modal" data-target="#edit<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>

                                    <button class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Delete Userlevel"
                                    data-toggle="modal" data-target="#confirm<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div></td>
                                
                        <?php    
                            }
                        ?>
                        
                      </tr>
                  <?php 
                       $count++; endforeach;
                  ?>
                  </tbody>
                </thead>
            </table>
    </div>
    <?php
        if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
    ?>
                <div class="btnAddCategory">
                    <button type="button" class="btn1"  data-toggle="modal" data-target="#myModal" >Add Userlevel</button>
                </div>
    <?php
        }
    ?>
    
    
    <?php include "../back-end/AddUserLevel.php"?>
    <?php include "../back-end/ViewUserLevel.php" ?>
    <?php include "../back-end/EditUserLevel.php" ?>
    <?php include "../back-end/DeleteUserLevel.php" ?>
    
            <!--triggers can't click outside element when modal is open -->
    <!-- <div id="modalOverlay"></div>

     <div class="modal-container" id="popup">
        <div class="modal-header">
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="controller/addCategory.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="c_name">Category Name: </label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group-button">
              <button type="submit" style="height:40px">Add user level</button>
            </div>
          </form>
        </div>
     </div> -->
     <div id="alertContainer"></div>



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
<?php
    include "adminFooter.php";

?>