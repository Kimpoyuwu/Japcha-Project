<?php
    include "c_header.php"; 
    include_once "config/databaseConnection.php"; 
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
                $condition = 'Shake';
                $sql = "SELECT * FROM product WHERE category = '$condition' ORDER BY price DESC";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0){
                    while ($row = mysqli_fetch_assoc($res)){ 
                        $productName = $row['product_name'];
                        $images = $row['image_url'];
                        $price = $row['price'];?>
                        
                <div id="product" class="product">
                    <a   href="#" style="text-decoration:none; color: black;">
                    <div id="prodHeader" class="prodHeader">
                        <img src="upload/<?=$images?>" alt="">
                    </div>
                    <div id="prodFooter" class="prodFooter">
                        <div class="nameProd">
                            <div class="productName"><?=$productName?></div>
                            <div class="price">P<?=$price?></div>
                        </div>
                        <button>Buy Now</button>
                    </div>
                    </a>
                </div>   
                <?php } } ?>      
   
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
        document.getElementById("itemContainer").addEventListener("click", function() {
        window.location.href = "ProductDetails_Front.php"; 
        });
        
        
    </script>
<?php
  include "c_footer.php";
?>