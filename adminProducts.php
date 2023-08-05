<?php
    include "adminHeader.php";
?>
    <!-- <link rel="stylesheet" href="assets/css/adminProducts.css"> -->
<div class="adminSection">
    <div class="headerSection">
        <p>Product List</p>
            <a href="#">Add new</a>

    </div>

    <div class="searchSection">
        <input type="text" placeholder = "Search">

        <select name="Category" class = "Category" id="Category">
            <option value="selectCategory">Category</option>
        </select>
    </div>

    <div class="productSection">
        <div class="boxContainer">
            <img src="image/sampleimage.png" alt="">
            <div class="productDescription">
                <span>Product Name</span>
                <p>P100</p>
            </div>
                <div class="productAction">
                    <div class="editContainer">
                        <img src="image/editIcon.png" alt="">
                        <a href="" class ="Edit">Edit</a>

                    </div>
                    <div class="removeContainer">
                        <img src="image/removeIcon.png" alt="">
                        <a href="" class ="Remove">Remove</a>

                    </div>
                        
                </div>
        </div>

        <div class="boxContainer">
            <img src="image/sampleimage.png" alt="">
            <div class="productDescription">
                <span>Product Name</span>
                <p>P100</p>
            </div>
                <div class="productAction">
                    <div class="editContainer">
                        <img src="image/editIcon.png" alt="">
                        <a href="" class ="Edit">Edit</a>

                    </div>
                    <div class="removeContainer">
                        <img src="image/removeIcon.png" alt="">
                        <a href="" class ="Remove">Remove</a>

                    </div>
                        
                </div>
        </div>

        <div class="boxContainer">
            <img src="image/sampleimage.png" alt="">
            <div class="productDescription">
                <span>Product Name</span>
                <p>P100</p>
            </div>
                <div class="productAction">
                    <div class="editContainer">
                        <img src="image/editIcon.png" alt="">
                        <a href="" class ="Edit">Edit</a>

                    </div>
                    <div class="removeContainer">
                        <img src="image/removeIcon.png" alt="">
                        <a href="" class ="Remove">Remove</a>

                    </div>
                        
                </div>
        </div>

        <div class="boxContainer">
            <img src="image/sampleimage.png" alt="">
            <div class="productDescription">
                <span>Product Name</span>
                <p>P100</p>
            </div>
                <div class="productAction">
                    <div class="editContainer">
                        <img src="image/editIcon.png" alt="">
                        <a href="" class ="Edit">Edit</a>

                    </div>
                    <div class="removeContainer">
                        <img src="image/removeIcon.png" alt="">
                        <a href="" class ="Remove">Remove</a>

                    </div>
                        
                </div>
        </div>

        

        

        

    </div>
</div>

<?php
    include "adminFooter.php";

?>