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
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
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
               
               foreach ($products as $product):
        ?>
            
                <div class="card p-2" style="width: 18rem; height: 350px">
                    <div class="header d-flex justify-content-center p-2" style="height: 60%">
                    <?php
                    // Assuming $images contains the file path to the image or video
                    if (strpos($product['image_url'], '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls style="max-width: 100%">
                        <source src="../upload/<?= $product['image_url']?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="../upload/<?= $product['image_url']?>" alt="" style="max-width: 100%" >
                    <?php
                        }
                    ?>
                    </div>
                    <div class="card-body" style="height:40%">
                        <div class="body" style="height:50%">
                            <h5 class="card-title"><?= $product['product_name']?></h5>

                        </div>
                            
                        <div class="card-footer d-flex justify-content-center gap-2" style="background-color: transparent; height:50%;">
                        <?php
                            //    if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                            //         echo'<div class="editContainer" >
                            //                 <img src="../image/editIcon.png" alt="">
                            //                 <a href="#" class ="Edit" data-product-id=' . $product['product_id'] . '>Edit</a>
                            //             </div>';
                            //    }
                   
                            //    if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                            //         echo '<div class="removeContainer">
                            //                 <img src="../image/removeIcon.png" alt="">
                            //                 <a href="../controller/remove.php?deleteid=' . $product['product_id'] . '" class="Remove">Remove</a>
                            //              </div>';
                            
                            //     }
                        ?> 
                        <?php
                               if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                        ?>
                        <button class="btn btn-info" data-tooltip="tooltip" data-placement="top" title="View Userlevel"
                                    data-toggle="modal" data-target="#viewProd<?= $product['product_id']?>"><i class="fa fa-eye" aria-hidden="true"></i></button>

                                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                                    data-toggle="modal" data-target="#edit<?= $product['product_id']?>"><i class="fa fa-edit" aria-hidden="true"></i></button>

                                    <button class="btn btn-warning" data-tooltip="tooltip" data-placement="top" title="Archive Userlevel"
                                    data-toggle="modal" data-target="#archiveProduct<?= $product['product_id']?>"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>

                                    <button class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Delete Userlevel"
                                    data-toggle="modal" data-target="#deleteProduct<?= $product['product_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <?php
                                }
                        ?> 
                        </div>
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
            include "ViewProduct.php";
            include "EditProduct.php";
            include "DeleteProduct.php";
       ?>
       
    <?php
            include "ProductModal1.php";
       ?>
       <?php
            include "ProductModal2.php";
       ?>

<!-- <div class="container mt-4 d-flex" style="flex-direction: column;">
    <div class="header">
         <h1>Add Div Containers Horizontally</h1>
        <button class="btn btn-primary" id="addButton">Add</button>
    </div>
    <div class="body">
        <div class="container-list" id="containerList"></div>
    </div>
</div> -->

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

<script>
$(document).ready(function() {
    $("#Category").change(function() {
        var selectedCategory = $(this).val();

        // Make an AJAX request to fetch content based on the selected category
        $.ajax({
            url: '../classes/SortByCategoryFunction.php', // Replace with the actual URL to fetch data
            method: 'POST',
            data: { category: selectedCategory },
            success: function(response) {
                $(".productSection").html(response);
            }
        });
    });
});
</script>

    <?php
            
        }
     ?>
<?php
    include "adminFooter.php";

?>