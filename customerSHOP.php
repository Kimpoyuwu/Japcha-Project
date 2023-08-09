<?php
    include "c_header.php"; 
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
                <div id="product" class="product">
                    <a   href="#" style="text-decoration:none; color: black;">
                    <div id="prodHeader" class="prodHeader">
                        <img src="image/Mango-shake.png" alt="">
                    </div>
                    <div id="prodFooter" class="prodFooter">
                        <div class="nameProd">
                            <div class="productName">Mango Graham</div>
                            <div class="price">P120.00</div>
                        </div>
                        <button>Buy Now</button>
                    </div>
                    </a>
                </div>
   
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
        
            <div class="paginationContainer">
                <button class="btnPrev" onclick="backBtn()"><i class="fa fa-angle-right"></i>prev</button>
                <ul>
                   <li class="page active" value="1" onclick="activeLink()">1</li>
                   <li class="page" value="2" onclick="activeLink()">2</li>
                   <li class="page" value="3" onclick="activeLink()">3</li>
                </ul>
                <button class="btnNext" onclick="nextBtn()">next<i class="fa fa-angle-right"></i></button>
            </div>
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
        
        
        
    </script>
<?php
  include "c_footer.php";
?>