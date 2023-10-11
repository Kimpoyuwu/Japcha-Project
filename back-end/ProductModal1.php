<style>
    #mediaPreview img,
    #mediaPreview video {
        max-width: 100%;
    }
</style>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="formProducts" id="formProducts" action="../controller/addProducts.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <div class="form-group">
                        <label for="productname">Product Name:</label>
                        <input type="text" class="form-control" id="productname" name="productname" required>
                    </div>

                    <div class="form-group">
                        <label for="product_image">Product Image:</label>
                        <input class="form-control-file" type="file" accept="image/*, video/*" name="product_image" id="product_image" required>
                    </div>
                    <div class="form-group">
                        <div id="mediaPreview" style="max-width: 100%;"></div>
                        <!-- <img id="imagePreview" class="img-thumbnail"  /> -->
                    </div>
                   
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="2" style="resize:none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" required>
                            <option value="default" selected disabled style="font-style: italic; color:gray;">Category</option>
                            <?php
                            $query = "SELECT category_id, category_name FROM categories WHERE category_id != 5";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $categoryId = $row['category_id'];
                                $categoryName = $row['category_name'];
                                echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // JavaScript to preview the selected image
    document.getElementById("product_image").addEventListener("change", function () {
    var fileInput = this;
    var mediaPreview = document.getElementById("mediaPreview");

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var fileType = fileInput.files[0].type;
            if (fileType.startsWith('image/')) {
                // Handle image
                mediaPreview.innerHTML = ''; // Clear previous content
                var imageElement = document.createElement('img');
                imageElement.src = e.target.result;
                mediaPreview.appendChild(imageElement);
            } else if (fileType.startsWith('video/')) {
                // Handle video
                mediaPreview.innerHTML = ''; // Clear previous content
                var videoElement = document.createElement('video');
                videoElement.setAttribute('controls', '');
                var sourceElement = document.createElement('source');
                sourceElement.src = e.target.result;
                sourceElement.type = fileType;
                videoElement.appendChild(sourceElement);
                mediaPreview.appendChild(videoElement);
            } else {
                // Handle other types
                mediaPreview.innerHTML = 'Unsupported file type: ' + fileType;
                // You can throw an exception or display an error message here.
                console.log('Unsupported file type: ' + fileType);
            }
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});

</script>
