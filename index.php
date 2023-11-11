<?php
    include "c_header.php";
    include "classes/user-level-Model.php";
    include "classes/signup.classes.php";
    $UserLevel = new UserLevel();
    $adminData = new Signup();
?>

<?php 
        // session_start();
        if(isset($_SESSION) && array_key_exists("flash_message", $_SESSION)){
            echo '<script>alert("Registered Successfully");</script>';
            unset($_SESSION["flash_message"]);
        }
    ?>
    <?php

        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<script>alert("Fill in all the fields!");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "invaliduid") {
                echo '<script>alert("Choose a proper name!");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "invalidemail") {
                echo '<script>alert("Choose a proper email!");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "passworddoesnotmatch") {
                echo '<script>alert("Passwords does not match!");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo '<script>alert("Something went wrong!");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "usernametaken") {
                echo '<script>alert("Name already taken");</script>';
                unset($_GET['error']);
            }
            else if ($_GET["error"] == "none") {
                echo '<script>alert("You have successfully signed up");</script>';
                unset($_GET["error"]);
            }
            else if ($_GET["error"] == "wronglogin") {
                echo '<script>alert("Invalid email or password");</script>';
                unset($_GET["error"]);
            }
            else if ($_GET["error"] == "nonelogin") {
                echo '<script>alert("You have logged in");</script>';
                unset($_GET["error"]);
            }
            else if ($_GET["error"] == "usernotfound") {
                echo '<script>alert("User not found");</script>';
                unset($_GET["error"]);
            }
            else if ($_GET["error"] == "emailalreadyused") {
                echo '<script>alert("Email already taken");</script>';
                unset($_GET["error"]);
            }
            unset($_GET["error"]);
        }
        

    ?>

    <!-- HOME -->
    <div class="home">
        <div id="banner">
            <h1><?php echo $data['title_data']; ?></h1>
            <h2><?php echo $data['subtitle']; ?></h2>
            <a href="customerSHOP.php" class="btn-Shopnow">SHOP NOW</a>
        </div>
        <div id="image-right-side">
                <img src="upload-content/<?php echo $data['landing_image_url']; ?>" alt="Hand holding JapCha">
        </div>

        
    </div>
     <main>
        <a href="#" class="heading1">
            <h2 class="section-heading">TOP SELLERS</h2>
        </a>
        <section>
            <div class="main-scroll-div">
                <div>
                    <button class="icon" onclick="scrolll()"><i class="fa fa-angle-left"></i></button>
                </div>
                <div class="cover">
                    <div class="scroll-images">
                        <div class="child">
                            <div class="header">
                                <a href="#">
                                    <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                                </a>
                                <img class="hot" src="image/hot.png" alt="best seller">
                            </div>
                            <div class="body">
                                <div class="prodName">Sample Product</div>
                                <button>Buy Now</button>
                            </div>
                        </div>
                        <div class="child">
                            <div class="header">
                                <a href="#">
                                    <img class="child-img" src="image/dark-choco.png" alt="coffee image">
                                </a>
                                <img class="hot" src="image/hot.png" alt="best seller">
                            </div>
                            <div class="body">
                                <div class="prodName">Sample Product</div>
                                <button>Buy Now</button>
                            </div>
                        </div>
                        <div class="child">
                            <div class="header">
                                <a href="#">
                                    <img class="child-img" src="image/macha-oreo.png" alt="coffee image">
                                </a>
                                <img class="hot" src="image/hot.png" alt="best seller">
                            </div>
                            <div class="body">
                                <div class="prodName">Sample Product</div>
                                <button>Buy Now</button>
                            </div>
                        </div>
                        <div class="child">
                            <div class="header">
                                <a href="#">
                                    <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                                </a>
                                <img class="hot" src="image/hot.png" alt="best seller">
                            </div>
                            <div class="body">
                                <div class="prodName">Sample Product</div>
                                <button>Buy Now</button>
                            </div>
                        </div>
                        <div class="child">
                            <div class="header">
                                <a href="#">
                                    <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                                </a>
                                <img class="hot" src="image/hot.png" alt="best seller">
                            </div>
                            <div class="body">
                                <div class="prodName">Sample Product</div>
                                <button>Buy Now</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <button class="icon" onclick="scrollr()"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </section>
        <a href="#" class="heading1">
            <h2 class="section-heading">ABOUT US</h2>
        </a>
        <section id="about-us-container">
                <div id="left-div">
                    <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>What is JapCha?</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['japcha']; ?></div>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>How to Order</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['order_note']; ?></div>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>Our Socials</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['socials']; ?></div>
                        </div>
                    </div>
            </div>
            <div id="right-div">
            <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>Policy</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['policy']; ?></div>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>Our Location</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['location']; ?></div>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <div class="header">
                            <h2>Contact Us</h2>
                            <button class="btnCaretdown" onclick=""><i id="caret_down" class="fa fa-caret-down arrow"></i></button>
                            </div>
                            <div class="paragraph-desc"><?php echo $data['contact']; ?></div>
                        </div>
                    </div>
            </div>
        </section>
     </main>
     <script>
            let arrow = document.querySelectorAll(".arrow");
            let paragraph = document.querySelectorAll(".paragraph-desc");
            for (var i = 0; i< arrow.length; i++){
            arrow[i].addEventListener("click", (e)=>{
                console.log(e);
                let arrowParent = e.target.parentElement.parentElement.parentElement;
                console.log(arrowParent);
                arrowParent.classList.toggle("show");
            });
            }
     </script>
     
<?php
    include "c_footer.php";
?>