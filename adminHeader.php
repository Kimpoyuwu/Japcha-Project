<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/adminCss.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Document</title>
    
</head>
<body>
<nav>
    <div class="menu_logo">
    <div id="menu-icon">
    <button class="open" onclick="openNav()" ><i class="fa fa-bars bars" id="burger_menu"></i></button>
        </div>

        <div id ="logo-img">
            <a href="#">
                <img src="image/japcha_log.png" alt="Japcha Logo">
            </a>
        </div>
    </div>
            <li>
            <button class="btnCaretdown" ><i id="caret_down" class="fa fa-caret-down"></i></button>
            </li>

    </nav>
    <div class="sidebar" id="mySidebar">
        <div class="menu-bar">
        <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class="fa fa-home icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="viewUsers.php">
                            <i class="fa fa-users icon"></i>
                            <span class="text nav-text">Customers</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="adminAccount.php">
                            <i class="fa fa-users icon"></i>
                            <span class="text nav-text">Admin</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="viewCategoryResult.php">
                            <i class="fa fa-th-large icon"></i>
                            <span class="text nav-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="#">
                            <i class="fa fa-th icon"></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="#">
                            <i class="fa fa-list icon"></i>
                            <span class="text nav-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="#">
                            <i class="fa fa-list icon"></i>
                            <span class="text nav-text">Statistics</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a class="redirecting" href="#">
                            <i class="fa fa-message icon"></i>
                            <span class="text nav-text">Message</span>
                        </a>
                    </li>
                </ul>
        </div>
    </div>
    <div class="table_container">