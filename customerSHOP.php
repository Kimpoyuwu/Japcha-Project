<?php
    include "c_header.php"; 
    include_once "config/databaseConnection.php"; 
    // include "classes/dbh.classes.php";
    $products = $productModel->getProductShake();
?>

    <div class="shopContainer">
            <div class="filterContainer">
                <div class="filter">
                    <!-- <h2>Sort and Filter</h2> -->
                    <select name="filterField" class = "filterField" id="filterByCategory">
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
            </div>

        <div class="productContainer">
            <form action="ProductDetails.php" method="POST">

            <div id="itemContainer" class="itemContainer">
            <?php
  
                foreach ($products as $product):
                 $productid = $product['product_id']
            ?>
              
                <div id="product" class="product">
                    <!-- <a   href="ProductDetails.php?productid=" style="text-decoration:none; color: black;"> -->
                    <input type="hidden" name="productid" value="<?= $productid ?>">
                    <div id="prodHeader" class="prodHeader">
                        <!-- <img src="upload/" alt=""> -->
                        <?php
                    // Assuming $images contains the file path to the image or video
                    if (strpos($product['image_url'], '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls style="max-width: 100%">
                        <source src="upload/<?= $product['image_url']?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="upload/<?= $product['image_url']?>" alt="" style="max-width: 100%" >
                    <?php
                        }
                    ?>
                        
                    </div>
                    <div id="prodFooter" class="prodFooter">
                        <div class="nameProd">
                            <div class="productName"><?= $product['product_name']?></div>
                            <!-- <div class="price">P</div> -->
                        </div>
                        <button type="submit" name="buynow" value="<?= $productid ?>">Buy Now</button>
                    </div>
                    </a>
                </div>
                
                <?php 
               
                // $_SESSION['prodid'] = $product['product_id'];

                // } } 
                endforeach;
                ?>      
   
            </div>
 

            </form>
        </div>
        
            <!-- <div class="paginationContainer">
                <button class="btnPrev" onclick="backBtn()"><i class="fa fa-angle-right"></i>prev</button>
                <ul>
                   <li class="page active" value="1" onclick="activeLink()">1</li>
                   <li class="page" value="2" onclick="activeLink()">2</li>
                   <li class="page" value="3" onclick="activeLink()">3</li>
                </ul>
                <button class="btnNext" onclick="nextBtn()">next<i class="fa fa-angle-right"></i></button>
            </div> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let page = document.getElementsByClassName("page");
        let currentValue = 1;

        function activeLink(){
            for(l of page){
                l.classList.remove("active");
            }
            event.target.classList.add("active");
            currentValue = event.target.value;
        }
        function backBtn(){
            if(currentValue > 1){
                for(l of page){
                    l.classList.remove("active");
                }
                currentValue--;
                page[currentValue-1].classList.add("active");
            }
        }
        function nextBtn(){
            if(currentValue < 3){
                for(l of page){
                    l.classList.remove("active");
                }
                currentValue++;
                page[currentValue-1].classList.add("active");
            }
        }
    //     document.getElementById("itemContainer").addEventListener("click", function() {

    //         var pid = $productid;
    //     window.location.href = "ProductDetails.php?productid="+pid; 
        
    // });
        
    $(document).ready(function() {
    $("#filterByCategory").change(function() {
        var selectedCategory = $(this).val();
        console.log(selectedCategory);
        // Make an AJAX request to fetch content based on the selected category
        $.ajax({
            url: 'classes/SortByCategoryFunctionFrontEnd.php', // Replace with the actual URL to fetch data
            method: 'POST',
            data: { category: selectedCategory },
            success: function(response) {
                $(".productContainer").html(response);
            }
        });
    });
});
    </script>

<?php
  include "c_footer.php";
?>