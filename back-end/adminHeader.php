<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Admin.css">
    <link rel="stylesheet" href="../assets/css/AdminOrders.css">  
    <link rel="stylesheet" href="../assets/css/adminStat.css">
    <link rel="stylesheet" href="../assets/css/Global-CSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Document</title>
    
</head>

<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<?php
    if(isset($_SESSION["adminID"]) ){
 ?>
<nav>
    <div class="menu_logo">
    <div id="menu-icon">
    <button class="open" onclick="openNav()" ><i class="fa fa-bars menu" id="burger_menu"></i></button>
        </div>

        <div id ="logo-img">
            <a href="#">
                <img src="../image/japcha_log.png" alt="Japcha Logo">
            </a>
        </div>
    </div>
            <!-- <li>
            <button class="btnCaretdown" ><i id="caret_down" class="fa fa-caret-down"></i></button>
            </li> -->

</nav>
    <div class="sidebar" id="mySidebar"> 
         <ul class="nav-links">
         <?php
                    if(isset($_SESSION["dashboardview"]) && $_SESSION["dashboardview"] == 1){
                       
            
        ?>              <li>
                            <a href="AdminDashBoard.php">
                                <i class="fa fa-home icon"></i>
                                <span class="link_name">Dashboard</span>
                            </a>
                            <ul class="sub-menu blank">
                                <li><a class="link_name" href="AdminDashBoard.php">Dashboard</a></li>
                            </ul> 
                        </li>
        <?php
            }
        ?>

        <?php   
                    if(isset($_SESSION["file_view"]) && $_SESSION["file_view"] == 1){
                    
        ?>                      <li>
                                        <div class="icon-link">
                                            <a href="#">
                                                <i class="fa fa-folder" aria-hidden="true"></i>
                                                <span class="link_name">File Manager</span>
                                            </a>
                                            <i class="fa fa-caret-down arrow"></i>
                                        </div>
                                        <ul class="sub-menu">
                                            <li><a class="link_name" href="#">File Manager</a></li>
                                            <li><a href="CustomerAccount.php">Customer</a></li>
                                            <li><a href="adminAccount.php">Admin</a></li>
                                            <li><a href="userLevel.php">User Level</a></li>
                                            <li><a href="adminProducts.php">Products</a></li>
                                            <li><a href="admin-ProductSizes.php">Product Sizes</a></li>
                                            <li><a href="viewCategory.php">Category</a></li>
                                            <li><a href="admin-add-ons.php">Add-ons</a></li>
                                            <li><a href="admin-sizes.php">Sizes</a></li>
                                        </ul> 
                                 </li>
        <?php
            }
        ?>
        <?php
                if(isset($_SESSION["orderManagement_view"]) && $_SESSION["orderManagement_view"] == 1){
        ?>       
                <li>
                    <div class="icon-link">
                        <a href="AdminOrders.php">
                            <i class="fa fa-list"></i>
                            <span class="link_name">Orders</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Orders</a></li>
                        <li><a href="AdminOrders.php">Orders</a></li>
                        <li><a href="#">Archive</a></li>
                    </ul>  
                </li>
        <?php
            }
        ?>

        <?php
                if(isset($_SESSION["statisticsManagement_view"]) && $_SESSION["statisticsManagement_view"] == 1){
        ?>  
                <li>
                    <a href="adminStatistic.php">
                        <i class="fa fa-bar-chart"></i>
                        <span class="link_name">Statistics</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="adminStatistic.php">Statistics</a></li>
                    </ul> 
                </li>
                <li>
                    <a href="adminMessage.php">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        <span class="link_name">Message</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="adminMessage.php">Message</a></li>
                    </ul> 
                </li>
                <li>
                    <a href="ChatbotManagement.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span class="link_name">Chatbot</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="adminMessage.php">Chatbot</a></li>
                    </ul> 
                </li>
        <?php
            }
        ?>

               <?php
                if(isset($_SESSION["contentManagement_view"]) && $_SESSION["contentManagement_view"] == 1){
                  ?>
                        <li>
                                <a href="admin-cms.php">
                                    <i class="fa fa-tasks"></i>
                                    <span class="link_name">Content Management</span>
                                </a>
                                <ul class="sub-menu blank">
                                    <li><a class="link_name" href="admin-cms.php">Content Management</a></li>
                                </ul> 
                         </li>  
                <?php
                 }
               ?>

                <?php
                if(isset($_SESSION["marketingManagement_view"]) && $_SESSION["marketingManagement_view"] == 1){
                  ?>

                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <span class="link_name">Marketing</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Marketing</a></li>
                        <li><a href="AdminRating.php">Ratings Management</a></li>
                        <li><a href="CouponManagement.php">Coupon Management</a></li>
                        <li><a href="AnnouncementManagement.php">Announcement</a></li>
                    </ul>  
                </li>
                <?php
                 }
               ?>

            <li>
                <div class="profile-details">

                    <div class="profile-content">
                        <img src="../image/user.jpg" alt="profile">
                    </div>

                    <div class="name-job">
                        <div class="profile_name"><?php echo $_SESSION["uname"];?></div>
                      
                         <div class="job"><?php echo $_SESSION["userlvl"]; ?></div>
                           
                        
                    </div>
                    <a href="../includes/logout.inc.php">
                        <i class="fa fa-sign-out signout" style="color: white"></i>
                    </a>
                </div>
            </li>
            
        </ul>
    </div>

    <?php
            
        }
     ?>
<div class="table_container">