<form class = "formProducts1" action="../includes/Product.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="titleModal">
            <p>Add Combo</p>    
            <img class ="closeButton2" id="closeModal2" src="../image/close.png" alt="">
            </div>
         
            <div class="secondLayer">
                <div class="leftCont1">  
                    <label for="product">Product 1:</label>
                            <select name="product1" >
                                <option value="default" selected disabled style="font-style: italic; color:gray;">Select Product</option>
                                    <?php
                                      
                                      $productModel = new ProductModel();
                                      $products = $productModel->getAllProducts();
                                      foreach ($products as $product):
                                    ?>
                                           <option value="<?= $product['product_id']?>"><?= $product['product_name']?></option>
                                        <?php
                                        endforeach;
                                    ?> 
                            </select>

                    <label for="product">Product 2:</label>
                            <select name="product2" >
                                <option value="default" selected disabled style="font-style: italic; color:gray;">Select Product</option>
                                    <?php
                                      
                                      $productModel = new ProductModel();
                                      $products = $productModel->getAllProducts();
                                      foreach ($products as $product):
                                    ?>
                                           <option value="<?= $product['product_id']?>"><?= $product['product_name']?></option>
                                        <?php
                                        endforeach;
                                    ?> 
                            </select>
                </div>
            </div>
            <div class="rightCont">
                    <label for="comboName">Combo Name:</label>
                    <input type="text"id ="comboName" name="comboName" require>
                    
                    <div class="descriptionContainer">
                        <label for="description">Description:</label>
                        <textarea name="description" id="" cols="30" rows="2"></textarea>
                    </div>
            </div>
            
            <div class="categoryContainer">
                <label for="category">Category:</label>
                            <select name="category" required>
                                <!-- <option value="default">Category</option> -->
                                <?php
                                    $query = "SELECT category_id, category_name FROM category where category_id = 00020";
                                    $result = mysqli_query($con, $query);
                                   
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoryId = $row['category_id'];
                                        $categoryName = $row['category_name'];
                                        echo '<option value="' . $categoryId . '" selected>' . $categoryName . '</option>';
                                    }
                                ?> 
                            </select>
            </div>
            <button name="submit" type="submit">Submit</button>
        </form>