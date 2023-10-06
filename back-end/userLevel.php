<?php
    include "adminHeader.php";
?>
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
                            if(isset($_SESSION["appointmentManagement_delete"]) && $_SESSION["appointmentManagement_delete"] == 1){
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
                        <td><?= $userlevel['user_level']?></td>
                        <?php
                            if(isset($_SESSION["appointmentManagement_delete"]) && $_SESSION["appointmentManagement_delete"] == 1){
                                echo '<td><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
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
            echo '<div class="btnAddCategory">
        <button type="button" class="btn1" data-toggle="modal" data-target="#myModal">Add Userlevel</button>
    </div>';
          }
    ?>
   

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User-Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/user_level.inc.php" enctype="multipart/form-data" method="POST"
                        id="userLevelForm">
                        <div class="scrollable-form">
      
                          <div class="form-group">
                              <label for="usname"><b>Name</b></label>
                              <input type="text" class="form-control" placeholder="Enter Name" name="usname" required>
                          </div>

                          <!-- Dashboard Permissions -->
                          <label for="permissions"><b>Dashboard Permissions</b></label>
                          <div class="form-group" id="dashboardPermissions">

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="dashboard_view"
                                      name="permissions[dashboard][view]">
                                  <label class="form-check-label" for="dashboard_view">View</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="dashboard_edit"
                                      name="permissions[dashboard][edit]" >
                                  <label class="form-check-label" for="dashboard_edit">Edit</label>
                              </div>
                          </div>

                          <!-- Appointment Management Permissions -->
                          <label for="permissions"><b>Order Management Permissions</b></label>
                          <div class="form-group" id="appointmentManagementPermissions">

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="appointmentManagement_view"
                                      name="permissions[appointmentManagement][view]">
                                  <label class="form-check-label" for="appointmentManagement_view">View</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="appointmentManagement_create"
                                      name="permissions[appointmentManagement][create]" >
                                  <label class="form-check-label" for="appointmentManagement_create">Create</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="appointmentManagement_edit"
                                      name="permissions[appointmentManagement][edit]" >
                                  <label class="form-check-label" for="appointmentManagement_edit">Edit</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="appointmentManagement_delete"
                                      name="permissions[appointmentManagement][delete]" >
                                  <label class="form-check-label" for="appointmentManagement_delete">Delete</label>
                              </div>
                          </div>

                          <!-- Account Management Permissions -->
                          <label for="permissions"><b>File Management Permissions</b></label>
                          <div class="form-group" id="accountManagementPermissions">

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_view"
                                      name="permissions[accountManagement][view]">
                                  <label class="form-check-label" for="accountManagement_view">View</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_create"
                                      name="permissions[accountManagement][create]" >
                                  <label class="form-check-label" for="accountManagement_create">Create</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_edit"
                                      name="permissions[accountManagement][edit]" >
                                  <label class="form-check-label" for="accountManagement_edit">Edit</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_delete"
                                      name="permissions[accountManagement][delete]" >
                                  <label class="form-check-label" for="accountManagement_delete">Delete</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_archive"
                                      name="permissions[accountManagement][archive]" >
                                  <label class="form-check-label" for="accountManagement_archive">Archive</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="accountManagement_ban"
                                      name="permissions[accountManagement][ban]" >
                                  <label class="form-check-label" for="accountManagement_ban">Ban</label>
                              </div>
                          </div>

                          <!-- Content Management Permissions -->
                          <label for="permissions"><b>Content Management Permissions</b></label>
                          <div class="form-group" id="contentManagementPermissions">

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="contentManagement_view"
                                      name="permissions[contentManagement][view]">
                                  <label class="form-check-label" for="contentManagement_view">View</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="contentManagement_create"
                                      name="permissions[contentManagement][create]" >
                                  <label class="form-check-label" for="contentManagement_create">Create</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="contentManagement_edit"
                                      name="permissions[contentManagement][edit]" >
                                  <label class="form-check-label" for="contentManagement_edit">Edit</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="contentManagement_delete"
                                      name="permissions[contentManagement][delete]" >
                                  <label class="form-check-label" for="contentManagement_delete">Delete</label>
                              </div>
                          </div>

                          <!-- File Management Permissions -->
                          <label for="permissions"><b>File Management Permissions</b></label>
                          <div class="form-group" id="fileManagementPermissions">

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="fileManagement_view"
                                      name="permissions[fileManagement][view]">
                                  <label class="form-check-label" for="fileManagement_view">View</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="fileManagement_create"
                                      name="permissions[fileManagement][create]" >
                                  <label class="form-check-label" for="fileManagement_create">Create</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="fileManagement_edit"
                                      name="permissions[fileManagement][edit]" >
                                  <label class="form-check-label" for="fileManagement_edit">Edit</label>
                              </div>

                              <div class="form-check form-check-inline">
                                  <input type="checkbox" class="form-check-input" id="fileManagement_delete"
                                      name="permissions[fileManagement][delete]" >
                                  <label class="form-check-label" for="fileManagement_delete">Delete</label>
                              </div>
                          </div>
                          
                      
                        </div>

                        <div class="form-group mt-3 d-flex justify-content-center text-center">
                            <button type="submit" class="btn btn-primary custom-btn button-link"
                                id="addUserLevelButton">Add User-Level</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    

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
a