
<?php

    include "c_header.php";
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['buynow'])){

        $prodid = $_POST['buynow'];
        $getSpecificProduct =  $productModel->getProduct($prodid);
        foreach($getSpecificProduct as $prods):

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="ProductDetails_Front.css">

<style>

.container{
    margin-top: 180px;
    bottom: 500; 
    left: 0; 
    right: 0; 
    width: 100%; 
    height: 75vh;
    
}

.Productbg {
    background-color: #EFC900;
    padding: 1px;
    border-style: outset;
    max-width: 350px;
    align-self: flex-start;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
   
}


.btncont {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 100px; 
}


.textcont {
        padding: 20px; 
    }

    .btncont button {
        margin-bottom: 10px; 
    }


hr.new4 {
  border: 2px solid gray;
  width: 1200px;
}

.stars {
   display: inline-block;
   font-size: 24px;
        }

.stars input[type="radio"] {
            display: none;
        }

.stars label {
    font-size: 24px;
    padding: 5px;
    cursor: pointer;
    display: inline-block;
    width: 20px;
    text-align: center;
        }

.stars label:before {
    content: '\2605'; 
    display: block;
        }

.stars input[type="radio"]:checked ~ label:before {
    content: '\2605'; 
    color: gold;
        }

.filterStars {
    margin-bottom: 20px; 
    }

.col-md-9{
    padding-left: 300px;
    }

.starFilter{
    padding-right:
    }

.desctitle{
    margin-top: 20px;
    }

.prodDesc{
    margin-top: 20px;
    }

.pprice{
    color: 518BF7;
    }

.Productbg {border-style: outset;}

</style>
<!-- Product Details -->

<div class="container">
<form action="orderCheckout.php" method="POST">
    <div class="row">
      
        <div class="col-md-4">
            <div class="Productbg p-2">
            <input type="hidden" name ="prodImage" value="<?= $prods['image_url'] ?>">
            <input type="hidden" name ="prdID" id="hiddenProdId" value="<?= $prods['product_id'] ?>">
            <?php
                    // Assuming $images contains the file path to the image or video
                    if (strpos($prods['image_url'], '.mp4') !== false) {
                        // If $images contains '.mp4', it's a video
                        ?>
                        <video controls="false" style="max-width: 100%; max-height: 100%;">
                        <source src="upload/<?= $prods['image_url']?>" type="video/mp4">
                        <p>Your browser does not support the video tag</p>
                        </video>
                    <?php
                        } else {
                    ?>
                        <img src="upload/<?= $prods['image_url']?>" alt="" style="max-width: 100%; max-height: 100%;" >
                    <?php
                        }
                    ?>
            </div>
            <h3 class="desctitle">Details:</h3>
                <p class="prodDesc"><?= $prods['description'] ?>
                </p>
        
        </div>

        <div class="col-md-5">
        <div class="textcont">
        <div class="stars">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1"></label>
        </div>
                <h2 class="prodName"><?= $prods['product_name'] ?></h2>
                <input type="hidden" name ="prdname" value="<?= $prods['product_name'] ?>">
                <div class="body d-flex flex-column gap-2" id="dynamic">
                       
                            <div class="container-list d-flex flex-row gap-2" id="containerList"> 
                                <div class="con">
                                   
                                    <select class="form-control" name="sizes" id="sizeDropdown">
                                    <?php
                                    
                                    $getSize =  $productModel->getSizeVariation($prodid);
                                    $count=0;
                                    foreach($getSize as $varSize):  
                                      $varid =  $varSize['variation_id'];        
                                      $PrevSize =  $varSize['size_id'];
                                      $PrevPrice =  $varSize['price'];                   
                                    ?>
                                            <option selected  value="<?= $varSize['size_id']?>"><?= $varSize['size_name']?>
                    ₱<?= $varSize['price']?></option>
                                           
                                         <?php
                            $count++;
                                endforeach;
                                
                                ?>     
                                    </select>
                                  
                                </div>
                                <div class="list-group">
                                    <span id="priceDisplay"></span>
                                    <!-- <li class="list-group-item active">Cras justo odio</li> -->
                                </div>
                               
                                <!-- <div><input type="number" name="prices[]" class="form-control" value="" required></div>
                                <div><i class="fa fa-minus-circle delete" id="a" style="cursor:pointer;" aria-hidden="true"></i></div>
                                -->
                            </div>
                          
                        </div>
                <h3 class="adsTitle">Add ons:</h3>
            <form>
                <?php
                    include_once "classes/add-addons.classes.php";
                    $addonsModel = new addAddons();
                    $dataAdds =  $addonsModel->getAddons();
                    foreach($dataAdds as $addon):
                ?>
                <div class="form-check">
                    <input type="checkbox" id="pearl" name="addons" value="<?= $addon['addons_id'] ?>" class="form-check-input">
                    <label class="form-check-label" for="pearl"><?= $addon['addons_name'] ?></label>
                </div>
                <?php
                    endforeach;
                ?>
            </form>
                
            </div>
            </div>
            
            <div class="btncont">
            <?php
                if (isset($_SESSION["userid"])) 
                {
            
            ?>
                <input type="hidden" name="user" value="<?= $_SESSION["userid"] ?>">
                <button type="button" class="btn btn-primary btnAddtoCart" id="addToCartButton" style="background-color: #FAFAFA; border-color: #FFD600; color: black; font-weight: bold;">Add To Cart</button>
                <button type="submit" class="btn btn-success buyNow" id="buynow" name="buynow">Buy Now</button>
                <script>
                    document.getElementById("buynow").addEventListener("click", function() {
                        window.location.href = "orderCheckout.php"; 
                    });
                </script>
           <?php
                }
                else 
                {
            ?>
                <button class="btn btn-primary btnAddtoCart" style="background-color: #FAFAFA; border-color: #FFD600;"><a href="#id" class="add text-black">Add To Cart</a></button>
                <button type="button" class="btn btn-success buyNow">Buy Nows</button>
            <?php 
                }
            ?>
        </div>  
        <div class="col-md-5">
        <hr class="new4">
        </div>
        </div>
        <div class="col-md-20">
        <h3>Product Reviews</h3>
        </div>
        <div class="filterStars-md-9">
        <label for="starFilter">Filter: All Star <i class="fa-solid fa-sort fa-sm"></i></label>
        <select id="starFilter">
            <option value="0">All</option>
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
        </select>
        
    </div>
    </form>
    <div class="col-md-9 text-center">
    <h3 class="Reviews"> <img src="image/User.png" alt="Juan Dela Cruz" class="img-Profile"> Juan Dela Cruz <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i></h3>
    <p class="prodRev">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                    printer took a galley of type and scrambled it to make a type specimen book
    </p>
    </div>
    <div class="col-md-9 text-center">
    <h3 class="Reviews"> <img src="image/User.png" alt="Juan Dela Cruz" class="img-Profile"> Juan Dela Cruz <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i> <i class="fa-regular fa-star fa-2xs"></i></h3>
    <p class="prodRev">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                    printer took a galley of type and scrambled it to make a type specimen book
    </p>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>

    $(document).ready(function() {
    var priceSelect = $("#sizeDropdown");
    var priceDisplay = $("#priceDisplay");
    // var prodid = $("$hiddenProdId");
    var prodId = document.getElementById("hiddenProdId").value;
    var originalPriceOptions = priceDisplay.html();

    priceSelect.on("change", function() {
        var selectedPrice = $(this).val();
        // var selectedProd = $(this).val();

        priceDisplay.html(originalPriceOptions);

        if (selectedPrice) {
            $.ajax({
                url: "controller/DisplayPrice.php?category=" + selectedPrice + "&prodid=" + prodId,
                type: "GET",
                success: function(data) {
                    // console.log("Response Data: " + data);
                    priceDisplay.html(data);
                },
                error: function() {
                    priceDisplay.html("Error fetching price.");
                }
            });
        }
    });

    $('input[type="checkbox"]').click(function() {
        // Uncheck all checkboxes except the one that was clicked
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
});

</script>

<?php
endforeach;
}
}
?>

<script>
$(document).ready(function() {
    $("#addToCartButton").click(function() {
        // Gather data from form fields
        var user_id = $("input[name='user']").val();
        var prodid = $("input[name='prdID']").val();
        var size_id = $("#sizeDropdown").val();
        var addons_id = $("input[name='addons']:checked").val();

        if (addons_id === undefined) {
            addons_id = null; // Set to null when no addon is checked
        }

        // Create an object to send via AJAX
        var data = {
            customer_id: user_id,
            prod__id: prodid,
            size_id: size_id,
            addonsid: addons_id
        };

        console.log(data);

        // Send the data using AJAX
        $.ajax({
            type: "POST",
            url: "controller/AddToCartFunction.php", // Specify the URL to your server-side script
            data: data,
            success: function(response) {
                // Handle the response from the server, e.g., show a success message
                console.log(response);

                // Optionally, you can show an alert message with the response
                alert("Item added to cart! " + response.message);
            },
            error: function() {
                // Handle errors, e.g., show an error message
                alert("An error occurred while adding to the cart.");
            }
        });
    });
});
</script>
