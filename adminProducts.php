<?php
    include "adminHeader.php";
?>
<?php  include "config/databaseConnection.php"; ?>
    <link rel="stylesheet" href="assets/css/admin.css">
<div class="adminSection">

    <div class="headerSection">
        <p>Product List</p>
            <a href="#" id="addNew">Add new</a>

    </div>

    <div class="searchSection">
        <input type="text" placeholder = "Search">

        <select name="Category" class = "Category" id="Category">
            <option value="selectCategory">Category</option>
        </select>
    </div>

    <div class="productSection">
    <?php
        $sql = "SELECT * FROM product ORDER BY product_id DESC";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){ 
                $productName = $row['product_name'];
                $images = $row['image_url'];
                $price = $row['price'];
                ?>

        <div class="boxContainer">
            <div class="productCon"><img src="upload/<?=$images?>" alt=""></div>
            <div class="productDescription">
                <span><?= $productName ?></span>
                <p>P<?= $price ?></p>
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
    <?php } } ?>


        

        

        

    </div>
</div>
<?php if (isset($_GET['error'])): ?>

<?php $error = $_GET['error'];
    // echo '<script>alert("'.$error.'");</script>'; ?>
<!-- <p><?php echo $_GET['error']; ?></p> -->

<?php endif ?>


    <div class="modal"> 
        <form class = "formProducts" action="controller/addProducts.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="titleModal">
            <p>Add Product</p>    
            <img class ="closeButton" src="image/close.png" alt="">
            </div>
         
            <div class="secondLayer">
                <div class="leftCont">  
                    <img id="imageData" src="" alt="">
                    <input class = "file" type="file" accept ="image/*" name="product_image" onchange="readURL(this);" value=""required>    
                </div>

                <div class="rightCont">
                    <label for="productName">Product Name</label>
                    <input type="text"id ="productName" name="productname" require>
                    <label for="label">Label</label>
                    <input type="text" name="label" id="label">
                    <label for="addOns">Add-ons:</label>
                    <div class="optionCont">
                        <div class="leftOption">
                            <div class="firstOption">
                                <input type="checkbox" name="addons[]" value="pearl" id="pearl">
                                <p>Pearl</p>
                            </div>
                            <div class="secondOption">
                                <input type="checkbox" name="addons[]" value="nata" id="nata">
                                <p>Nata</p>
                            </div>
                            
                        </div>
                        <div class="rightOption">
                             <div class="thirdOption">
                                <input type="checkbox" name="addons[]" value="rainbowJelly" id="rainbowJelly">
                                <p>Rainbow Jelly</p>
                            </div>
                            <div class="fourthOption">
                                <input type="checkbox" name="addons[]" value="coffeeJelly" id="coffeeJelly">
                                <p>Coffee Jelly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="descriptionContainer">
                <label for="description">Description:</label>
                <input type="text" name="description">
            </div>
            <div class="categoryContainer">
                <label for="category">Category:</label>
                            <select name="category" required>
                                <option value="default">Category</option>
                                <?php
                                    include "config/databaseConnection.php";
                                    $query = "SELECT category_id, category_name FROM category";
                                    $result = mysqli_query($con, $query);
                                   
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoryId = $row['category_id'];
                                        $categoryName = $row['category_name'];
                                        echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                                    }
                                ?> 
                            </select>
            </div>
            <div class="containerForPQ">
                <div class="priceContainer">
                    <label for="price">Price:</label>
                    <input type="number" id="currency" name="price" step="0.01" min="0" placeholder="0.00" required>         
                </div>
                
                <div class="quantityContainer">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="currency" name="quantity" step="0" min="0" placeholder="0" required>
                </div>
            </div>
            <button name="submit" type="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" >
        const addNewLink = document.getElementById('addNew');
        const modal = document.querySelector('.modal');
        const closeButton = document.querySelector('.closeButton');

        addNewLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'flex';
    });

        closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageData').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script> 

<?php
    include "adminFooter.php";

?>