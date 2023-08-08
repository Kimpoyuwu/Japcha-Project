<?php
    include "adminHeader.php";
?>
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

    <div class="modal"> 
        <form class = "formProducts"action="">
            <div class="titleModal">
            <p>Add Product</p>
            <img class ="closeButton" src="image/closeButton.png" alt="">
            </div>
         
            <div class="secondLayer">
                <div class="leftCont">    
                    <img src="image/uploadImage.png" alt="">
                    <input class = "file" type="file" accept ="image/*">    
                </div>

                <div class="rightCont">
                    <label for="productName">Product Name</label>
                    <input type="text"id ="productName">
                    <label for="label">Label</label>
                    <input type="text" id="label">
                    <label for="addOns">Add-ons:</label>
                    <div class="optionCont">
                        <div class="leftOption">
                            <div class="firstOption">
                                <input type="checkbox" id="pearl">
                                <p>Pearl</p>
                            </div>
                            <div class="secondOption">
                                <input type="checkbox" id="nata">
                                <p>Nata</p>
                            </div>
                            
                        </div>
                        <div class="rightOption">
                             <div class="thirdOption">
                                <input type="checkbox" id="rainbowJelly">
                                <p>Rainbow Jelly</p>
                            </div>
                            <div class="fourthOption">
                                <input type="checkbox" id="coffeeJelly">
                                <p>Coffee Jelly</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <script>
        const addNewLink = document.getElementById('addNew');
        const modal = document.querySelector('.modal');
        const closeButton = document.querySelector('.closeButton');

        addNewLink.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

        closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });             
    </script> 

<?php
    include "adminFooter.php";

?>