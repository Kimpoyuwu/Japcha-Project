<?php
    include "c_header.php";
    include "classes/user-level-Model.php";
    include "classes/signup.classes.php";
    $UserLevel = new UserLevel();
    $adminData = new Signup();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JapCha</title>
</head>
<body>
    

<style>

    #carouselExampleIndicators{
        background-image: url("image/bg-sample2.jpg");
        background-color: #cccccc;
    }
</style>

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
<!-- The Alert (styled like a modal) -->

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
        <section style="position: relative;">
            <div class="main-scroll-div">
                <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel" >
                    
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active p-5">
                            <div class="row justify-content-center gap-4">
                                <div class="col-sm-3">
                                    <div class="card">

                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="card">
                    
                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="card">

                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item p-5">
                            <div class="row justify-content-center gap-4">
                                <div class="col-sm-3">
                                    <div class="card">

                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="card">
                    
                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="card">

                                        <div class="card-header" style="background-color: #EFC900;">
                                            <img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap">
                                                                            </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="color: black !important;"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
                    <span class="carousel-control-next-icon" aria-hidden="true" style="color: black !important;"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>


        <section  id="about-us">

       
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

</body>
</html>