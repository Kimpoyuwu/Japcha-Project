<?php
    include "adminHeader.php";
    include_once "../config/databaseConnection.php";
?>
<link rel="stylesheet" href="../assets/css/AdminProductSizes.css">
<main class="tableAdmin">
        <div class="card-option">
            <div class="cardHeader">
                <h6>Product Sizing and Pricing</h6>
                <button type="button" onclick="openAddAdmin()" class="btnAddAdmin">Add Variation</button>
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
                     $query = "SELECT ps.ProductSizes_id, p.product_name, s.size_name, ps.price, ps.quantity FROM product_sizes ps INNER JOIN product p ON ps.product_id = p.product_id  INNER JOIN size s ON ps.size_id = s.size_id ORDER BY p.product_name ASC";
                     $result = mysqli_query($con, $query);
                     $count = 1;
                     if (mysqli_num_rows($result) > 0) {
                         // Looping through each row and displaying the data
                         while ($row = mysqli_fetch_assoc($result)) {
                          $prodVariationID = $row['ProductSizes_id'];
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
                                echo '<td><button class="remove"><a style="text-decoration: none; color:#b30021;" href="#">Remove</a></button></td>';
                            }
                            if(isset($_SESSION["fileManagement_edit"]) && $_SESSION["fileManagement_edit"] == 1){
                                echo "<td><button class='edit' onclick=\"variationEdit($prodVariationID)\">Edit</button></td>";
                            }
                        ?>
                        
                    </tr>
                    <?php $count=$count+1;} } ?>
                </tbody>
                
              </table>
        </section>
    </main>

    <!--triggers can't click outside element when modal is open -->

            <div class="form signup_form" id="addAdminPopup">
                <button class="form_close" onclick="closeAddAdmin()"><i class="uil uil-times"></i></button>
                <div class="formBody">
                    <form action="../includes/ProductSizes.inc.php" method="post">
                        <h2>Product Size and Price Variation</h2>
                        <div class="input_box">
                            <label for="product">Product:</label>
                            <select name="product" >
                                <option value="default" selected disabled style="font-style: italic; color:gray;">Select Product</option>
                                    <?php
                                      
                                        $query = "SELECT product_id, product_name FROM product";
                                        $result = mysqli_query($con, $query);
                                    
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $ProductId = $row['product_id'];
                                            $ProductName = $row['product_name'];
                                            echo '<option value="' . $ProductId . '">' . $ProductName . '</option>';
                                        }
                                    ?> 
                            </select>
                        </div>
                        <div class="input_box">
                            <label for="size">Size:</label>
                            <select name="size">
                                <option value="default" selected disabled style="font-style: italic; color:gray;">Select Size</option>
                                    <?php
                                        $query = "SELECT size_id, size_name FROM size";
                                        $result = mysqli_query($con, $query);
                                    
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $SizeId = $row['size_id'];
                                            $SizeName = $row['size_name'];
                                            echo '<option value="' . $SizeId . '">' . $SizeName . '</option>';
                                        }
                                    ?> 
                            </select>
                        </div>
                        <div class="input_box">
                            <label for="price">Price:</label>
                            <input type="number"  name="price" step="0.01" min="0" placeholder="0.00" required />            
                        </div>
                        <div class="input_box">
                            <label for="quantity">Quantity:</label>
                            <input type="number"  name="quantity" step="0" min="0" placeholder="0" required />
                        </div>
                        <!-- <input type="submit" class="btnLogin btn-primary"> -->
                        <button class="btnSignup" type="submit" name="submit">Add Variation</button>
                    </form>
                </div>
            </div>



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