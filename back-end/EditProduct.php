<?php
     include_once "../config/databaseConnection.php";
?>
<style>
    #mediaPreview img,
    #mediaPreview video {
        max-width: 100%;
    }
    .container{
        border: none !important;
        box-shadow: none !important;

    }
    video{
        max-width: 100% !important;
    }
.productImage{
    width: 100% !important;
}
 /* Define the style for the disabled button */
.disabled-button {
    /* Change the background color to gray */
    color: gray !important;
    text-decoration: none !important; /* Change the text color to white */
    cursor: not-allowed !important; /* Change the cursor to indicate it's not clickable */
}

.modal{
    /* width: 700px !important; */
}
.con{
    width: 30% !important;
}

</style>
<?php foreach ($products as $product): 
  
    $prodid = $product['product_id'];
    $image = $product['image_url'];
    ?>

    <div class="modal fade" id="edit<?= $prodid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="formProducts" id="formProducts" action="../controller/addProducts.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        <div class="form-group">
                            <label for="productname<?= $prodid ?>">Product Name:</label>
                            <input type="text" class="form-control" id="productname<?= $prodid ?>" name="productname" required value="<?= $product['product_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" name="category" required>
                                <option value="<?= $product['category_id'] ?>" selected disabled style="font-style: italic; color: gray;"><?= $product['category_name'] ?></option>
                                <?php
                                $query = "SELECT category_id, category_name FROM categories WHERE category_id != " . $product['category_id'];
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $categoryId = $row['category_id'];
                                    $categoryName = $row['category_name'];
                                    echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_image<?= $prodid ?>">Product Image:</label>
                            <input class="form-control-file" type="file" accept="image/*, video/*" name="product_image" id="product_image<?= $prodid ?>">
                        </div>
                        <div class="form-group">
                            <div id="mediaPreview<?= $prodid ?>" class="mediaPreview" style="max-width: 100%;"></div>
                            <?php
        if (strpos($image, '.mp4') !== false) {
            // If $image contains '.mp4', it's a video
            ?>
                    <video id="productVideo<?= $prodid ?>" class="productVideo" controls style="max-width: 100%">
                        <source src="../upload/<?= $product['image_url']?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                    </video>
        <?php
        } else {
        ?>
            <img id="productImage<?= $prodid ?>" class="productImage" src="../upload/<?= $image ?>" alt="Product Image">
        <?php
        }
        ?>
                            
                          

                        </div>

                        <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="2" style="resize:none;" ><?= $product['description'] ?></textarea>
                    </div>
                    
                    <div class="container m-0 p-0 d-flex flex-column gap-2">
                        <div class="header">
                            <input type="button" class="btn btn-link p-0" id="addButton<?= $prodid ?>" value="Add Size">
                        </div>
                        <div class="body d-flex flex-column gap-2" id="dynamic<?= $prodid ?>">
                        <?php
                                    
                                    $getSize =  $productModel->getSizeVariation($prodid);
                                    $count=0;
                                    foreach($getSize as $varSize):                                    
                                    ?>
                            <div class="container-list d-flex flex-row gap-2" id="containerList"> 
                                    
                                <div class="con">
                                   
                                    <select class="form-control" name="sizes[]">
                                        
                                            <option selected  value="<?= $varSize['size_id']?>"><?= $varSize['size_name']?></option>
                                            <?php
                                           $query = "SELECT sizes_id, size_name FROM product_sizes WHERE sizes_id != " . $varSize['size_id'];

                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $SizeId = $row['sizes_id'];
                                                $SizeName = $row['size_name'];
                                                echo '<option  value="' . $SizeId . '">' . $SizeName . '</option>';
                                            }
                                        ?>
                                            
                                    </select>
                                </div>
                                <div><input type="number" name="prices[]" class="form-control" value="<?= $varSize['price']?>" required></div>
                                <div><i class="fa fa-minus-circle delete" id="a" style="cursor:pointer;" aria-hidden="true"></i></div>
                               
                            </div>
                            <?php
                            $count++;
                                endforeach;
                                
                                ?>
                        </div>
                    </div>
                    

                    </div>
                    <div class="modal-footer">
                        <button name="editProd" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
   document.getElementById("product_image<?= $prodid ?>").addEventListener("change", function () {
    var fileInput = this;
    var mediaPreview = document.getElementById("mediaPreview<?= $prodid ?>");
    var productImage = document.getElementById("productImage<?= $prodid ?>");
    var productVideo = document.getElementById("productVideo<?= $prodid ?>");

    // Clear the mediaPreview element (remove its children)
    while (mediaPreview.firstChild) {
        mediaPreview.removeChild(mediaPreview.firstChild);
    }

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var fileType = fileInput.files[0].type;

            if (fileType.startsWith('image/')) {
                // Handle images
                var newImage = document.createElement('img');
                newImage.src = e.target.result;
                newImage.style.maxWidth = '100%';
                mediaPreview.appendChild(newImage);
            } else if (fileType.startsWith('video/')) {
                // Handle videos
                var videoElement = document.createElement('video');
                videoElement.setAttribute('controls', '');
                var sourceElement = document.createElement('source');
                sourceElement.src = e.target.result;
                sourceElement.type = fileType;
                videoElement.appendChild(sourceElement);
                mediaPreview.appendChild(videoElement);
            } else {
                // Handle other file types or display an error message
                mediaPreview.innerHTML = 'Unsupported file type: ' + fileType;
                console.log('Unsupported file type: ' + fileType);
            }
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});


$(document).ready(function() {
    var count<?= $prodid ?> = <?= $count ?>;
        var i = count<?= $prodid ?> + 1;
        var row;

        function getMaxRow() {
        $.ajax({
            url: '../controller/get_max_size_row.php', // Replace with the actual PHP file
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                row = parseInt(data.maxRow, 10) || 3; // Use the fetched 'maxRow' or default to 3
                toggleAddButton(); // Initial toggle of the Add button
            },
            error: function() {
                console.error("Failed to fetch the maximum row value.");
            }
        });
    }

        function toggleAddButton() {
            if (i > row) {
                $("#addButton<?= $prodid ?>").prop("disabled", true);
                $("#addButton<?= $prodid ?>").addClass("disabled-button");
            } else {
                $("#addButton<?= $prodid ?>").prop("disabled", false);
                $("#addButton<?= $prodid ?>").removeClass("disabled-button");
            }
        }
        getMaxRow();
        $("#addButton<?= $prodid ?>").click(function() {
            if (i < row) {
                i++;
                var selectOptions = '';
                $.ajax({
                    url: '../controller/get_size.php', // Replace with the actual PHP file to fetch sizes
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(function(option) {
                            selectOptions += '<option value="' + option.sizes_id + '">' + option.size_name + '</option>';
                        });

                        $('#dynamic<?= $prodid ?>').append(
                            '<div class="container-list d-flex flex-row gap-2" id="containerList' + i + '">' +
                            '<div class="con"><select class="form-control" name="sizes[]">' + selectOptions + '</select></div>' +
                            '<div><input type="number" name="prices[]" class="form-control" required></div>' +
                            '<div><i class="fa fa-minus-circle delete" id="' + i + '" style="cursor:pointer;" aria-hidden="true"></i></div>' +
                            '</div>'
                        );
                        toggleAddButton();
                    },
                    error: function() {
                        console.error("Failed to fetch sizes.");
                    }
                });
            }
        });

        $(document).on('click', '.delete', function() {
            var row_id = $(this).attr("id");
            $('#containerList' + row_id + '').remove();
            i--;
            toggleAddButton();
        });

        toggleAddButton();
    });


    </script>
<?php endforeach; ?>
