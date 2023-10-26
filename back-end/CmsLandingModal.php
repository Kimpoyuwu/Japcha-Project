<!-- TITLE -->
<div class="modal fade bd-example-modal-lg" id="title" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Title</h5>
            <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <textarea name="titleInput" id="titleModal"><?= $cms['title_data']?></textarea>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="">Close</button>
            <button type="submit" class="btn btn-primary" name="title_data">Save title</button>
        </div>

    </div>
  </div>
</div>

<!-- subtitle MODAL -->
<div class="modal fade bd-example-modal-lg" id="subtitle" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Subtitle</h5>
            <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <textarea name="subtitleInput" id="subtitleModal"><?= $cms['subtitle']?></textarea>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="subtitle_data">Save changes</button>
        </div>

    </div>
  </div>
</div>

<!-- Logo MODAL -->
<div class="modal fade bd-example-modal-lg" id="logo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <label for="product_image">Logo:</label>
            <input class="form-control-file" type="file" accept="image/*, video/*" name="product_image" id="product_image">
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>

    </div>
  </div>
</div>


<!-- landing image  MODAL -->
<div class="modal fade bd-example-modal-lg" id="landingImage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="form_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <label for="product_image">Logo:</label>
            <input class="form-control-file" type="file" accept="image/*, video/*" name="product_image" id="product_image">
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>

    </div>
  </div>
</div>



<script>
    $(document).ready(function () {
            initializeSummernote('#titleModal');
            initializeSummernote('#subtitleModal');
            
        });

   
</script>
