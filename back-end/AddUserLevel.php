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
                          <!-- <label for="permissions"><b>Order Management Permissions</b></label>
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
                          </div> -->

                          <!-- Account Management Permissions -->
                          <!-- <label for="permissions"><b>File Management Permissions</b></label>
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
                          </div> -->

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