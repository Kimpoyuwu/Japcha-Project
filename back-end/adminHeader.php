<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/AdminOrders.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Document</title>
    
</head>
<body>
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
                <li>
                    <a href="#">
                        <i class="fa fa-home icon"></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Dashboard</a></li>
                    </ul> 
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-users icon"></i>
                            <span class="link_name">File Manager</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">File Manager</a></li>
                        <li><a href="index.php">Customer</a></li>
                        <li><a href="adminAccount.php">Admin</a></li>
                        <li><a href="userLevel.php">User Level</a></li>
                        <li><a href="adminProducts.php">Products</a></li>
                        <li><a href="viewCategory.php">Category</a></li>
                        <li><a href="admin-add-ons.php">Add-ons</a></li>
                        <li><a href="admin-sizes.php">Sizes</a></li>
                    </ul> 
                </li>
                        
                <!-- <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-users icon"></i>
                            <span class="link_name">Account</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Account</a></li>
                        <li><a href="viewUsers.php">Customer</a></li>
                        <li><a href="adminAccount.php">Admin</a></li>
                        <li><a href="userLevel.php">User Level</a></li>
                        
                    </ul> 
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-th icon"></i>
                            <span class="link_name">Products</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Products</a></li>
                        <li><a href="/adminProducts.php">Products</a></li>
                        <li><a href="/viewCategory.php">Category</a></li>
                        <li><a href="#">Add-ons</a></li>
                    </ul>  
                </li> -->
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span class="link_name">Orders</span>
                        </a>
                        <i class="fa fa-caret-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Orders</a></li>
                        <li><a href="#">Orders</a></li>
                        <li><a href="#">Archive</a></li>
                    </ul>  
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span class="link_name">Statistics</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Statistics</a></li>
                    </ul> 
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comment"></i>
                        <span class="link_name">Message</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Message</a></li>
                    </ul> 
                </li>
                <li>
                    <a href="admin-cms.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="link_name">Content Management</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Content Management</a></li>
                    </ul> 
                </li>      
            <li>
                <div class="profile-details">

                    <div class="profile-content">
                        <img src="../image/user.jpg" alt="profile">
                    </div>

                    <div class="name-job">
                        <div class="profile_name">Adner Devila</div>
                        <div class="job">Web Developer</div>
                    </div>
                        <i class="fa fa-sign-out signout" style="color: white"></i>
                </div>
            </li>
        </ul>
    </div>
<div class="table_container">