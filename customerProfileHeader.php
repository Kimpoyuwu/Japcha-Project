<?php
    include "c_header.php";
    // include_once "config/databaseConnection.php";

?>
<div class="profileContainer">
    <div class="profile">
        <div class="profileHeader">
            <div class="profilePic">
                <img src="image/sample1.png" alt="">
            </div>
            <div class="username">
                <div class="profile_name">
                    <?php
                        // echo $_SESSION["username"];
                    ?>
                </div>
            </div>
        </div>
        <div class="manageProfile">
            <div class="myprofile">
                <h2><a href="myProfile.php">My Profile</a></h2>
            </div>
            <div class="editAccount">
                <ul>
                    <li><a href="customerManageAccount.php">Manage Account</a></li>
                    <li><a href="addressBook.php">Address Book</a></li>
                </ul>
            </div>
        </div>
        <div class="manageOrder">
            <div class="orderManagement">
                <h2>Order Management</h2>
            </div>
            <div class="orderLinks">
                <ul>
                    <li><a href="orderHistory.php">Order History</a></li>
                    <li><a href="myReviews.php">My Reviews</a></li>
                </ul>
            </div>
        </div>
    </div>
 