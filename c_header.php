<?php
    session_start();
?>
<?php
    require "classes/dbh.classes.php";
    require "classes/cms.classes.php";

    include_once "classes/profileinfo.classes.php";
    include_once "classes/profileinfo-cntrl.classes.php";
    $cms = new Cms();
    $data = $cms->getCms();
    include_once "classes/ProductsModel.php";
    $productModel = new ProductModel();
    $products = $productModel->getAllProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="Customer.css">
    <!-- <link rel="stylesheet" href="../Japcha-Project/assets/css/addToCart.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Document</title>
    <style>
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #d6e9c6;
        }
        .navBar{
            display: flex !important;
        }
    </style>
</head>
<body>
    <nav class="navBar">
        <div id ="logo-img">
            <a href="index.php" class="logo__image">
              <img src="image/<?php echo $data['logo_url']; ?>" alt="sss">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <ul class="navigation__main_ul">
            <li>
                <a class="" href="index.php">Home</a>
            </li>
            <div class="subnav">
                <button class="subnavbtn">Shop <i class="fa fa-caret-down"></i></button>
                <!-- <li>
                    <a href="customerSHOP.php">Shop</a>
                </li> -->
                <div class="subnav-content">
                    <ul class="navigation__links_ul">
                        <a href="customerSHOP.php" title>Shake</a>
                        <a href="" title>Frappe</a>
                        <a href="" title>Milktea</a>
                        <a href="" title>Cheesetea</a>
                        <a href="" title>Fruit Tea</a>
                        <a href="" title>Lemonade</a>
                        <a href="" title>Coffee</a>
                        <a href="" title>Rocksalt CreamCheese</a>
                        <a href="" title>Wings & Fries</a>
                        <a href="" title>Rice Meal</a>
                        <a href="" title>Rice Bowl</a>
                        <a href="" title>Pasta</a>
                        <a href="" title>Burger and Sandwiches</a>
                        <a href="" >Fries and Snacks</a>
                        <a href="" title>Salad</a>
                    </ul>
                </div>
            </div>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Chat</a>
            </li>
            <li>
                <a href="#">Order</a>
            </li>
            <li>
                <div id="search-icon">
                    <i class="fa fa-bell bell"></i>
                </div>
            </li>
            <li>
                <div id="shopping-cart-icon">
                    <i class="fa fa-shopping-cart cart"></i>
                </div>
            </li>
            <?php
                if (isset($_SESSION["userid"])) 
                {
            
            ?>

                    <li><div id="user-icon"><a href="myProfile.php"><i class='fa fa-user-circle user'></a></i></div></li>
                    <li><a href="includes/logout.inc.php">Logout</a></li>

            <?php
                }
                else 
                {
            ?>
                    <li><button class="button" id="form-open">Login</button></li>
            <?php 
                }
            ?>
        </ul>
    </nav>
<!-- 
    <div class="addCart-maincont" id="addCart-maincont">
            <form action="" >
                <div class="cart-close-cont">
                <i class="fa fa-times" aria-hidden="true"></i>
                </div>

                <div class="cart-title-cont">
                    <h2>SHOPPING CART</h2>
                </div>

                <div class="cart-orders-cont">
                    <div class="cart-product-cont">
                        <div class="cart-product-bg">
                            <img src="../Japcha-Project/image/macha-oreo.png" alt="">
                        </div>
                    </div>

                    <div class="cart-product-desc">
                        <div class="cart-top-desc">
                            <p class ="cart-prod-name" id ="cart-prod-name">Mango Shake</p>
                            <a href="" class="cart-remove">Remove</a>
                        </div>
                        
                        <div class="cart-bottom-desc">
                            <p class ="cart-prod-price" id ="cart-prod-price">100.00</p>
                            <input type="number" name="cart-quantity" id="cart-quantity" min="1" step="1" value="1" required style="width:20%; height: 20%;">
                        </div>

                    </div>
                </div>
                
                <div class="cart-subtotal-cont">

                    <div class="subtotal-cart-tag">
                        <h2>Subtotal:</h2>
                    </div>

                    <div class="cart-sub-cont">
                        
                        <p class = "cart-subprice" id = "cart-subprice">₱350.00</p>
                        <p class = "cart-desc" id = "cart-desc">Shipping fee and other add-ons will be calculated at checkout.</p>
                        <button type="submit" class="cart-submit">Checkout</button>
                    </div>

                </div>
            </form>

        </div> -->

   