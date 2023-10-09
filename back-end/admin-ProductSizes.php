<?php
    include "adminHeader.php";
    include_once "../config/databaseConnection.php";
?>
<link rel="stylesheet" href="../assets/css/AdminProductSizes.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<main class="tableAdmin">
        <div class="card-option">
            <div class="cardHeader">
                <h6>Product Sizing and Pricing</h6>
                <?php
                    if(isset($_SESSION["fileManagement_create"]) && $_SESSION["fileManagement_create"] == 1){
                ?>
                        <button type="button" class="btnAddAdmin"  data-tooltip="tooltip" data-placement="top" title="Edit"
                        data-toggle="modal" data-target="#edit" >Add Variation</button>
                <?php
                    }
                ?>
                
            </div>
        </div>
        <section class="table_body">
            <table action="Admin_user_management.php"  >
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1 && isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                echo'<th colspan="2">Action</th>';
                            }
                    ?>
                    
                  </tr>
                </thead>
                <tbody>
                <?php
                     $query = "SELECT ps.prodsizes_id, p.product_name, s.size_name, ps.price, ps.quantity FROM product_variation ps INNER JOIN product p ON ps.product_id = p.product_id  INNER JOIN product_sizes s ON ps.sizes_id = s.sizes_id ORDER BY p.product_name ASC";
                     $result = mysqli_query($con, $query);
                     $count = 1;
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $prodVariationID = $row['prodsizes_id'];
                          $productName = $row['product_name'];
                          $sizeName = $row['size_name'];
                          $price = $row['price'];
                          $quantity = $row['quantity'];


                     ?>
                    <tr>
                        <td><?=$count?></td>
                        <td><?=$productName?></td>
                        <td><?=$sizeName?></td>
                        <td><?=$price?></td>
                        <td><?=$quantity?></td>
                        <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                        ?>
                                <!-- <td><button class='edit' onclick="variationEdit($prodVariationID)">Edit</button></td> -->
                                <td><div class="btnCon">
                                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit"
                                    data-toggle="modal" data-target="#edit" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                
                        <?php
                            }
            
                            if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                        ?>
                                    <button class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Delete"
                                        data-toggle="modal" data-target="#confirm<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td></div>
                        <?php
                            }
                        ?>
                        
                    </tr>
                    <?php $count=$count+1;} } ?>
                </tbody>
                
              </table>
        </section>
    </main>

    <!--triggers can't click outside element when modal is open -->
 
    <?php include "AddProductSize.php" ?>
    <?php include "EditProductSize.php" ?>

    <script>
                    let popup = document.getElementById("addAdminPopup");
            // let overlay = document.getElementById("modalOverlay");
            function openAddAdmin()
            {
                popup.classList.add("open-form");
            //    modalOverlay.style.display = "block";
            }
            function closeAddAdmin()
            {
            popup.classList.remove("open-form");
            //   modalOverlay.style.display = "none";
            }
            // function closeModal(event) {
            // if (event.target === modalOverlay || event.key === "Escape") {
            // closePopup();
            // }
            // }

            // Listen for clicks on the modal overlay

            // Listen for keydown events to close the modal when "Escape" key is pressed
            // document.addEventListener("keydown", closeModal);
    </script>
    <!-- Modal script -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../assets/js/aJax.js"></script>
<?php
    include "adminFooter.php";

?>