<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="customer.css">
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
    </style>
</head>
<body>
    <nav >
        <div id ="logo-img">
            <a href="#" class="logo__image">
                <img src="image/japcha_logo.png" alt="Japcha Logo">
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
                if (isset($_SESSION["email"])) 
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