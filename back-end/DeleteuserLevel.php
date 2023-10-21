<?php
    foreach ($userlevels as $userlevel):
?>
<!-- Confirm Modal -->
    <div class="modal fade justify-content-center align-items-center" id="delete<?= $userlevel['userlevel_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete <?= $userlevel['user_level_name'] ?> ?</h5>
                        <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
               
                    <div class="alert alert-danger mb-0" role="alert">
                        Do you want to delete <?= $userlevel['user_level_name'] ?> userlevel?
                    </div>
      
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a style="text-decoration: none; color:#ffffff;" href="../controller/RemoveUserlevel.php?deleteidul=<?=$userlevel['userlevel_id']?>">Yes</a></button>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach;
?>