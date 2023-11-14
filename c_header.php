
<?php
    session_start();
?>
<?php
    require "classes/dbh.classes.php";
    require "classes/cms.classes.php";
    $cms = new Cms();
    $data = $cms->getCms();
    include "classes/ProductsModel.php";
    $productModel = new ProductModel();
    // $products = $productModel->getProductShake();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="image/japcha_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="Customer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Document</title>
    <style>
        body{
            background-color: #f4f1ec !important;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #d6e9c6;
        }
      
        .cart-drawer {
            position: fixed;
            top: 0;
            right: -100%; 
            width: 700px; 
            height: 100%;
            background-color: #fff;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease;
            overflow-y: auto; 
            z-index: 999; 
    }
        .cart-drawer.open {
            right: 0;
        }
        .cart-content {
            padding: 20px;
        }

        .bottonCheckout{
            margin-left: 310px;
        }

        .h1{
            font-weight: 10000;
        }

        .card-img-top {
            transition: transform 0.3s;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .h2{
            margin-top: 50px;
        }

        .container{
            margin-top: 20px;
        }
        .cartCONT{
            margin-top: 0px !important;
            margin-left: 0px !important;
            padding-left: 15px !important;
        }

        .Shopping {
            height: 180px;
            border-radius: 16px;
            background: #EFC900;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;

            display: flex;
            align-items: center;
            justify-content: center;

            padding-top: 10px;
            padding-bottom: 10px;

            margin-right: 20px;
        }

        .row{
            margin-bottom: 0 !important;
        }

        .card-header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border: none; 
        }

        .btn-link {
            border: none; 
            text-decoration: underline;
            background: transparent; 
        }

        .card-title {
            border: none; 
            margin: 0; 
        }
       #cart-toggle{
            width: auto !important;
       }
       #search-icon{
        position: relative;
       }
        #search-icon .badge-top {
        position: absolute;
        top: 0;
        right: 3px;
        font-size: 10px;
        }
        .cart{
            position: relative;
        }
        .cart .badge-top {
        position: absolute;
        top: 0;
        right: 3px;
        font-size: 10px;
        }
    </style>
</head>
<body>
    <nav style="display: flex !important;">
        <div id ="logo-img">
            <a href="index.php" class="logo__image">
              <img src="upload-content/<?php echo $data['logo_url']; ?>" alt="sss">
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
                <a class="subnavbtn" href="customerSHOP.php">Shop</a>
                <!-- <li>
                    <a href="customerSHOP.php">Shop</a>
                </li> -->
                <!-- <div class="subnav-content">
                    <ul class="navigation__links_ul">
                        <a href="customerSHOP.php" title>Shake</a>
                        <a href="ShopFrappe.php" title>Frappe</a>
                        <a href="ShopMilktea.php" title>Milktea</a>
                        <a href="ShopCheesetea.php" title>Cheesetea</a>
                        <a href="ShopFruittea.php" title>Fruit Tea</a>
                        <a href="ShopLemonade.php" title>Lemonade</a>
                        <a href="ShopCoffee.php" title>Coffee</a>
                        <a href="ShopCreamcheese.php" title>Rocksalt CreamCheese</a>
                        <a href="ShopWingsFries.php" title>Wings & Fries</a>
                        <a href="ShopRiceMeal.php" title>Rice Meal</a>
                        <a href="ShopRiceBowl.php" title>Rice Bowl</a>
                        <a href="ShopPasta.php" title>Pasta</a>
                        <a href="ShopBurgerSandwich.php" title>Burger and Sandwiches</a>
                        <a href="#" >Fries and Snacks</a>
                        <a href="ShopSalad.php" title>Salad</a>
                    </ul>
                </div> -->
            </div>
            <li>
                <a href="index.php#about-us" class="scroll-link">About</a>
            </li>
            <li>
                <a href="chatFront.php">Chat</a>
            </li>
            <?php
                if (isset($_SESSION["userid"])) 
                {
                    $customerId = $_SESSION["userid"];
            ?>
            <li style="position: relative;">
                <a href="orderstatus.php"  id="insertCounter">Order<span class="badge badge-danger" style="position: absolute; top:0; right:3px; font-size: 10px;"></span></a>
            </li>

            <script>
                var customerid = <?php echo json_encode($customerId); ?>;
                
                function checkForNewInserts(customerId) {
                    var xhr = new XMLHttpRequest();

                    xhr.open('GET', 'controller/CountNewInsertedOrderFrontEnd.php?customerid=' + customerId, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            document.getElementById('insertCounter').innerHTML = 'Orders <span class="badge badge-danger" style="position: absolute; top:0; right:3px; font-size: 10px;">' + response.new_insert_count + '</span>';
                        }
                    };

                    xhr.send();
                }

                // Initial check
                checkForNewInserts(customerid);

                // Periodically check for new inserts (e.g., every 5 seconds)
                setInterval(function () {
                    checkForNewInserts(customerid);
                }, 5000);
            </script>
            <?php
                }
                
            ?>
            <li>
                <div id="search-icon">
                    <i class="fa fa-bell bell"></i>
                    <span class="badge badge-danger badge-top">9</span>
                </div>
            </li>
            
            </div>
        

            
            <?php
                if (isset($_SESSION["userid"])) 
                {
            
            ?>
                    <li>
                        <div class="cart">
                            <button class="btn" id="cart-toggle" style="background-color: transparent;"><i class="fa-solid fa-cart-shopping fa-lg"></i></button><span class="badge badge-danger badge-top">2</span>
                        </div>
                    </li>
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
    <?php
if(isset($_SESSION["order_placed"])){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 5%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
    Order Placed Successfully
    <button type="button" class="btn btn-link close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
 unset($_SESSION["order_placed"]);
 }
?>

<!-- LOGIN FORM MODAL -->
        <?php include_once "LoginSignupModal.php";?>
<!-- CART -->
        <?php include_once "AddToCart.php";?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="assets/js/customer.js"></script> -->
<script>
$(document).ready(function() {
    // Get the customer ID from the input element or your session
    var customerId = <?= $_SESSION["userid"] ?>; // Replace with the actual way you store the customer ID
    // Function to fetch and update content
    function fetchAndUpdateContent() {
        // Perform an Ajax request to fetch product data
        $.ajax({
            type: 'GET',
            url: 'controller/fetch_product_cart.php',
            data: { customer_id: customerId },
            success: function(data) {
                // Update the product container with new data
                // var total = 0;
                // data.forEach(function(product) {
                //     total += parseFloat(product.subtotal);
                // });

                // $('#totalPrice').text('Sub Total: ₱' + total.toFixed(2));

                updateContent(data);
            },
            error: function(xhr, status, error) {
                console.log('Error fetching product data:', error);
            }
        });
    }

    // Function to update the product container with new data
 // Function to update the product container with new data
function updateContent(data) {
    // Initialize an empty product content variable
    var productContent = '';
    var total = 0; 
    // Iterate over each product and append its HTML content
    data.forEach(function(product) {
        // Assuming product.price and product.quantity are numeric values
        var price = parseFloat(product.price);
        var quantity = parseInt(product.quantity);

        // Calculate subtotal
        var subtotal = price * quantity;
        total += subtotal;

        productContent += `
            <div class="col-md-4 Shopping">
                <img src="${product.image_url}" class="card-img-top" alt="Product Image" style="height: 100px; width: 70px;">
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">${product.product_name}
                        <input type="hidden" name="p_name[]" value="${product.product_name}">
                        <input type="hidden" name="p__id" value="${product.product_id}">
                        <input type="hidden" name="cart_id" value="${product.cartids}">
                        <button type="button" class="btn btn-link" style="float: right; border: none; text-decoration: underline;">Remove</button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <p class="form-control-static" style="float: left;">${product.sizename}</p>
                                <input type="hidden" name="size_name[]" value="${product.sizename}">
                            </div>
                            <div class="col-sm-6">
                                <p class="form-control-static" style="float: left;"><span style="color: blue;">Addons:</span> ${product.addonsname}</p>
                                <input type="hidden" name="addons_name[]" value="${product.addonsname}">
                            </div>
                            <div class="col-sm-6">
                                <p class="form-control-static price" style="float: left;">₱ ${product.price}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="form-control-static quantity" style="float: left;"><span style="color: blue;">Quantity:</span> ${product.quantity}</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="form-control-static subtotal" style="float: left;"><span style="color: blue;">Subtotal:</span> ₱ ${subtotal.toFixed(2)}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    // Update the container with the new content
    $('#productContainer').html(productContent);
    $('#totalPrice').text('Sub Total: ₱' + total.toFixed(2));
}


         // Assuming you want two decimal places

//     $('#checkoutButton').click(function() {
//     // Initialize arrays to store cart items
//     var cartIds = [];
//     var quantities = [];

//     // Loop through each product and capture the values
//     $('#productContainer .card').each(function() {
//         var cartId = $(this).find('input[name="cart_id"]').val();
//         var quantity = $(this).find('input[name="quantity"]').val();

//         // Add the values to their respective arrays
//         cartIds.push(cartId);
//         quantities.push(quantity);
//     });

//     console.log(cartIds);
//     console.log(customerId); // Make sure customerId is defined and holds the correct value
//     console.log(quantities);

//     // Send the data to the PHP file using AJAX
//     $.ajax({
//     type: 'POST',
//     url: 'includes/CheckoutCart.php',
//     contentType: 'application/json',
//     data: JSON.stringify({
//         cartIds: cartIds,
//         customerIds: customerId,
//         quantities: quantities
//     }),
//     dataType: 'html', // Set the dataType to 'html'
//     success: function(response) {
//         // This will contain the HTML response from the server
//         // You can insert it into your page as needed
//         $('#yourTargetElement').html(response); // Replace #yourTargetElement with the actual target element
//     },
//     error: function(xhr, status, error) {
//         console.log('Error:', error);
//     }
// });


//     // Optionally, you can use window.location.href to redirect to another page
//     window.location.href = 'includes/CheckoutCart.php'; // Redirect to the PHP file
// });




    // Attach a click event handler to the button
    $('#cart-toggle').click(function() {
        // Fetch and update content when the button is clicked
        fetchAndUpdateContent();
    });

    // Initial fetch and update when the page loads
    fetchAndUpdateContent();


function removeProductFromCart(customerId, cart_id) {
    // Perform an Ajax request to update the cart with isRemove set to true
    $.ajax({
        type: 'POST',
        url: 'controller/update_remove_cart.php', // Replace with the URL for your update script
        data: {
            customer_id: customerId,
            cartid: cart_id,
        },
        success: function(response) {
            // If the update is successful, you can refresh the cart content
            if (response.success) {
                fetchAndUpdateContent();
            } else {
                console.log('Failed to update the cart.');
            }
        },
        error: function(xhr, status, error) {
            console.log('Error updating the cart:', error);
        }
    });
}

    // Attach a click event handler to the "Remove" button
$('#productContainer').on('click', '.btn-link', function() {
    var productContainer = $(this).closest('.card');
    var productId = productContainer.find('input[name="p__id"]').val(); // Get the product ID
    var cart_id = productContainer.find('input[name="cart_id"]').val(); 
    console.log(productContainer);
    console.log(productId);
    console.log(cart_id);
    // console.log(customerId);
    // Call the removeProductFromCart function
    removeProductFromCart(customerId, cart_id);
});
        

});



</script>





<script>
    // JavaScript to toggle the cart drawer
    const cartToggle = document.getElementById('cart-toggle');
    const cartDrawer = document.getElementById('cart-drawer');
    const backToPreviousButton = document.getElementById('back-to-previous');

    cartToggle.addEventListener('click', () => {
        cartDrawer.classList.toggle('open');
    });

    backToPreviousButton.addEventListener('click', () => {
        cartDrawer.classList.remove('open');
    });
</script>
<script>
        $(document).ready(function() {
            // Smooth scrolling for anchor links
            $(".scroll-link").on('click', function(event) {
                // Check if the link is pointing to the current page
                if (this.pathname === window.location.pathname) {
                    if (this.hash !== "") {
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function(){
                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    }
                } else {
                    // If the link is pointing to another page, navigate to that page
                    window.location.href = this.href;
                }
            });
        });
    </script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
