<?php
    foreach ($userlevels as $userlevel):
?>
<!-- Confirm Modal -->
    <div class="modal fade justify-content-center align-items-center" id="archive<?= $userlevel['userlevel_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Archive <?= $userlevel['user_level_name'] ?> ?</h5>
                        <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger mb-0" role="alert">
                        Do you want to archive <?= $userlevel['user_level_name'] ?> userlevel?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning"><a style="text-decoration: none; color:#ffffff;" href="../controller/ArchiveUserlevel.php?archiveul=<?=$userlevel['userlevel_id']?>">Yes</a></button>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach;
?>