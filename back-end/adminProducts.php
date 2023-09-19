<?php
    include "adminHeader.php";
?>
<?php  include "../config/databaseConnection.php"; ?>
<?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "deletedsuccessfully") {
                echo '<script>alert("Deleted Successfully");</script>';
                unset($_GET['error']);
            }
        }
            
?>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/boostrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="adminSection">

    <div class="headerSection">
        <p>Product List</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
            <!-- <a href="#" id="addNew">Add new</a> -->
    </div>

    <div class="searchSection">
        <input type="text" placeholder = "Search">

        <select name="Category" class = "Category" id="Category">
            <option value="selectCategory">Category</option>
        </select>
    </div>

    <div class="productSection">
    <?php
        $sql = "SELECT * FROM product ORDER BY product_id DESC";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){ 
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $images = $row['image_url'];
                $price = $row['price'];
                ?>

        <div class="boxContainer">
            <div class="productCon"><img src="../upload/<?=$images?>" alt=""></div>
            <div class="productDescription">
                <span><?= $productName ?></span>
                <p>P<?= $price ?></p>
            </div>
                <div class="productAction">
                    <div class="editContainer" >
                        <img src="image/editIcon.png" alt="">
                        <a href="#" class ="Edit" data-product-id="<?php echo $productId;?>">Edit</a>
                    </div>
                    <div class="removeContainer">
                        <img src="image/removeIcon.png" alt="">
                        <a href="controller/remove.php?deleteid=<?php echo $productId; ?>" class ="Remove">Remove</a>

                    </div>
                        
                </div>
        </div>
    <?php } } ?>
    </div>
</div>

<?php if (isset($_GET['error'])): ?>

<?php $error = $_GET['error'];
    echo '<script>alert("'.$error.'");</script>'; ?>
    <p><?php echo $_GET['error']; ?></p>
<?php endif ?>
    <div class="modal1"> 
        <form class = "formProducts" action="../controller/addProducts.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="titleModal">
            <p>Add Product</p>    
            <img class ="closeButton" src="../image/close.png" alt="">
            </div>
         
            <div class="secondLayer">
                <div class="leftCont">  
                    <img id="imageData" src="" alt="">
                    <video id="videoData" src=""></video>
                    <input class = "file" type="file" accept ="image/*, video/*" name="product_image" onchange="readURL(this);" multiple required>    
                </div>

                <div class="rightCont">
                    <label for="productName">Product Name</label>
                    <input type="text"id ="productName" name="productname" require>
                    
                    <div class="descriptionContainer">
                        <label for="description">Description:</label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="categoryContainer">
                <label for="category">Category:</label>
                            <select name="category" required>
                                <option value="default">Category</option>
                                <?php
                                    include "config/databaseConnection.php";
                                    $query = "SELECT category_id, category_name FROM category";
                                    $result = mysqli_query($con, $query);
                                   
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoryId = $row['category_id'];
                                        $categoryName = $row['category_name'];
                                        echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                                    }
                                ?> 
                            </select>
            </div>
            <div class="containerForPQ">
                <div class="priceContainer">
                    <label for="price">Price:</label>
                    <input type="number" id="currency" name="price" step="0.01" min="0" placeholder="0.00" required>         
                </div>
                
                <div class="quantityContainer">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="currency" name="quantity" step="0" min="0" placeholder="0" required>
                </div>
            </div>
            <button name="submit" type="submit">Submit</button>
        </form>
    </div>
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-light" id="addNew" data-bs-dismiss="modal">Drinks</button>
        <button type="button" class="btn btn-light">Rice Meals</button>
        <button type="button" class="btn btn-light">Snacks</button>
      </div>
    </div>
  </div>
</div>
<!-- Vertically centered scrollable modal -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" >
        const addNewLink = document.getElementById('addNew');
        const modal = document.querySelector('.modal1');
        const closeButton = document.querySelector('.closeButton');
        const modalupdate = document.querySelector('.modalupdate');
        const updateButton = document.querySelector('.Edit');
        const closeupdate = document.querySelector('.closeButton-update');

        addNewLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'flex';
        modal.style.transition = 'all 0.5s ease';
    });

        closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    function readURL(input) {
         if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var fileType = input.files[0].type;

            if (fileType.startsWith('image/')) {
                // Handle image
                $('#imageData').attr('src', e.target.result);
            } else if (fileType.startsWith('video/')) {
                // Handle video
                // Replace '#videoData' with the appropriate video element or container
                $('#videoData').attr('src', e.target.result);
            } else {
                // Handle other types or display an error message
                console.log('Unsupported file type: ' + fileType);
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
    }
    </script> 

<?php
    include "adminFooter.php";

?>