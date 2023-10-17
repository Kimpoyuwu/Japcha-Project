<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="ProductDetails_Front.css">
<?php
    include "c_header.php";
?>
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
    <div class="row">
        <div class="col-md-4">
            <div class="Productbg">
                <img src="image/Mango-shake.png" alt="img" class="img-fluid mango">
            </div>
            <h3 class="desctitle">Details:</h3>
                <p class="prodDesc">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown 
                    printer took a galley of type and scrambled it to make a type specimen book
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
                <h2 class="prodName">Mango Graham</h2>
                <h2 class="pprice">₱120.00</h2>
                <h3 class="adsTitle">Add ons:</h3>
            <form>
                <div class="form-check">
                    <input type="radio" id="pearl" name="addons" value="pearl" class="form-check-input">
                    <label class="form-check-label" for="pearl">Pearls</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="blkpearl" name="addons" value="blkpearl" class="form-check-input">
                    <label class="form-check-label" for="blkpearl">Black Pearl</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="crmCheese" name="addons" value="crmCheese" class="form-check-input">
                    <label class="form-check-label" for="crmCheese">Cream Cheese</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="nata" name="addons" value="nata" class="form-check-input">
                    <label class="form-check-label" for="nata">Nata</label>
                </div>
                </form>
                
            </div>
            </div>
            
            <div class="btncont">
                <button class="btn btn-primary btnAddtoCart" style="background-color: #FAFAFA; border-color: #FFD600;"><a href="#id" class="add text-black">Add To Cart</a></button>
                <button class="btn btn-success buyNow"><a href="#id" class="buy text-black" id="buynow">Buy Now</a></button>
                <script>
                    document.getElementById("buynow").addEventListener("click", function() {
                        window.location.href = "orderCheckout.php"; 
                    });
                </script>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

