<?php
    foreach ($userlevels as $userlevel):
?>
    <div class="modal fade" id="view<?= $userlevel['userlevel_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $userlevel['user_level_name'] ?></h5>
                        <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" enctype="multipart/form-data" method="POST"
                            id="userLevelForm">
                            <div class="scrollable-form">
        
                            <div class="form-group">
                                <label for="usname"><b>Name</b></label>
                                <input type="text" class="form-control" value="<?= $userlevel['user_level_name'] ?>" disabled>
                            </div>

                            <!-- Dashboard Permissions -->
                            <label for="permissions"><b>Dashboard Permissions</b></label>
                            <div class="form-group" id="dashboardPermissions">

                                <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="dashboard_view" name="permissions[dashboard][view]"<?php if ($userlevel['dashboard_view'] == true) echo 'checked'; ?>>

                                    <label class="form-check-label" for="dashboard_view">View</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="dashboard_edit"
                                        name="permissions[dashboard][edit]" <?php if ($userlevel['dashboard_edit'] == true) echo 'checked'; ?>>
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
                                        name="permissions[contentManagement][view]"<?php if ($userlevel['contentManagement_view'] == true) echo 'checked'; ?>>
                                    <label class="form-check-label" for="contentManagement_view">View</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="contentManagement_create"
                                        name="permissions[contentManagement][create]" <?php if ($userlevel['contentManagement_create'] == true) echo 'checked'; ?>>
                                    <label class="form-check-label" for="contentManagement_create">Create</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="contentManagement_edit"
                                        name="permissions[contentManagement][edit]"<?php if ($userlevel['contentManagement_edit'] == true) echo 'checked'; ?> >
                                    <label class="form-check-label" for="contentManagement_edit">Edit</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="contentManagement_delete"
                                        name="permissions[contentManagement][delete]"<?php if ($userlevel['contentManagement_delete'] == true) echo 'checked'; ?> >
                                    <label class="form-check-label" for="contentManagement_delete">Delete</label>
                                </div>
                            </div>

                            <!-- File Management Permissions -->
                            <label for="permissions"><b>File Management Permissions</b></label>
                            <div class="form-group" id="fileManagementPermissions">

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="fileManagement_view"
                                        name="permissions[fileManagement][view]"<?php if ($userlevel['fileManagement_view'] == true) echo 'checked'; ?>>
                                    <label class="form-check-label" for="fileManagement_view">View</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="fileManagement_create"
                                        name="permissions[fileManagement][create]"<?php if ($userlevel['fileManagement_create'] == true) echo 'checked'; ?> >
                                    <label class="form-check-label" for="fileManagement_create">Create</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="fileManagement_edit"
                                        name="permissions[fileManagement][edit]"<?php if ($userlevel['fileManagement_edit'] == true) echo 'checked'; ?> >
                                    <label class="form-check-label" for="fileManagement_edit">Edit</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="fileManagement_delete"
                                        name="permissions[fileManagement][delete]"<?php if ($userlevel['fileManagement_delete'] == true) echo 'checked'; ?> >
                                    <label class="form-check-label" for="fileManagement_delete">Delete</label>
                                </div>
                            </div>
                            
                        
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<script>
    // JavaScript to handle modal open and close events
    $('.modal').on('show.bs.modal', function (event) {
        var modal = $(this);
        modal.find(':checkbox').each(function () {
            // Store the original value in the data-original-value attribute
            $(this).attr('data-original-value', $(this).prop('checked') ? 'checked' : '');
        });
    });

    $('.modal').on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find(':checkbox').each(function () {
            // Restore the original value from the data-original-value attribute
            $(this).prop('checked', $(this).attr('data-original-value') === 'checked');
        });
    });
</script>
<?php
endforeach;
?>