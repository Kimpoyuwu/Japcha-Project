<?php
    include "adminHeader.php";
?>
<?php
    if(isset($_SESSION["adminID"]) ){
 ?>
<?php  
        include "../config/databaseConnection.php";
        include "../classes/dbh.classes.php";
        include "../classes/ProductsModel.php";
        
?>
<?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "deletedsuccessfully") {
                echo '<script>alert("Deleted Successfully");</script>';
                unset($_GET['error']);
            }
        }
            
?>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/AdminProductBootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="adminSection">

    <div class="headerSection">
        <p>Product List</p>
        <?php
          if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
                echo'<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>';
          }
        ?>
       
            <!-- <a href="#" id="addNew">Add new</a> -->
    </div>

    <div class="searchSection">
        <input type="text" placeholder = "Search">
        <select name="Category" class = "Category" id="Category">
            <option value="" selected >All Products</option>
                    <?php
                        $query = "SELECT category_id, category_name FROM categories";
                        $result = mysqli_query($con, $query);
                                   
                        while ($row = mysqli_fetch_assoc($result)) {
                        $categoryId = $row['category_id'];
                        $categoryName = $row['category_name'];
                        echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                    }
            ?> 
        </select>
    </div>

    <div class="productSection">
        <?php       
               $productModel = new ProductModel();
               $products = $productModel->getAllProducts();
               foreach ($products as $product):
        ?>
            <div class="boxContainer">
                <div class="productCon"><?php
                    // Assuming $images contains the file path to the image or video
                    if (strpos($product['image_url'], '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls>
                        <source src="../upload/<?= $product['image_url']?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="../upload/<?= $product['image_url']?>" alt="">
                    <?php
                        }
                    ?>
                </div>
                <div class="productDescription">
                    <span><?= $product['product_name']?></span>
                    <p>₱</p>
                </div>
                    <div class="productAction">
                    <?php
                               if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                    echo'<div class="editContainer" >
                                            <img src="../image/editIcon.png" alt="">
                                            <a href="#" class ="Edit" data-product-id=' . $product['product_id'] . '>Edit</a>
                                        </div>';
                               }
                   
                               if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                                    echo '<div class="removeContainer">
                                            <img src="../image/removeIcon.png" alt="">
                                            <a href="../controller/remove.php?deleteid=' . $product['product_id'] . '" class="Remove">Remove</a>
                                         </div>';
                            
                                }
                        ?> 
                    </div>
            </div>
            <?php 
            endforeach;
        ?>
    </div>
</div>

<?php 

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo '<script>alert("' . $error . '");</script>';
    echo '<p>' . $error . '</p>';
    unset($_GET['error']); // Optionally unset the parameter if needed
    $_SESSION['error'] = $error; // Store the error message in a session variable
}

// To clear the error message from the session after displaying it:
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}?>
    
    <!-- modal for drinks-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-light" id="#" data-bs-dismiss="modal" data-toggle="modal" data-target="#modal1">Product</button>
        <button type="button" class="btn btn-light"  id="#" data-bs-dismiss="modal" data-toggle="modal" data-target="#modal2">Combo</button>
      </div>
    </div>
  </div>
</div>
<!-- Vertically centered scrollable modal -->



<!-- MODAL FOR MEALS -->
    <?php
            include "ProductModal1.php";
       ?>
       <?php
            include "ProductModal2.php";
       ?>

<!--END MODAL FOR MEALS -->
<?php
if (isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1) {
    $showRemove = true;
} else {
    $showRemove = false;
}

if (isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1) {
    $showEdit = true;
} else {
    $showEdit = false;
}
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/admin-products.js">
    </script> 
    <script>
    var showRemove = <?php echo json_encode($showRemove); ?>;
    var showEdit = <?php echo json_encode($showEdit); ?>;
    </script>
    <?php
            
        }
     ?>
<?php
    include "adminFooter.php";

?>