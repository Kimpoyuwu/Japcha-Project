<?php
    include "c_header.php"; 
    include_once "config/databaseConnection.php"; 
    // include "classes/dbh.classes.php";
 
?>

    <div class="shopContainer">
            <div class="filterContainer">
                <div class="filter">
                    <!-- <h2>Sort and Filter</h2> -->
                    <select name="filterField" class = "filterField" id="filterField">
                        <option value="">Filter</option>
                    </select>
                </div>
            </div>

        <div class="productContainer">

            <div id="itemContainer" class="itemContainer">
            <?php
  
                foreach ($products as $product):
                 $productid = $product['product_id']
                // $_SESSION['prodid'] = $product['product_id'];
                // $_SESSION['prodname'] = $product['product_name'];
            ?>
              
                <div id="product" class="product">
                    <a   href="ProductDetails.php?productid=<?= $productid ?>" style="text-decoration:none; color: black;">
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
                        <button type="submit" data-target="">Buy Now</button>
                    </div>
                    </a>
                </div>
                
                <?php 
               
                // $_SESSION['prodid'] = $product['product_id'];

                // } } 
                endforeach;
                ?>      
   
            </div>
 
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->
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
        
        
    </script>
<?php
  include "c_footer.php";
?>