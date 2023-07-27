
<?php
    include "c_header.php";
?>
<?php 
        session_start();
        if(isset($_SESSION) && array_key_exists("flash_message", $_SESSION)){
            echo '<script>alert("Registered Successfully");</script>';
            unset($_SESSION["flash_message"]);
        }
    ?>
    <!-- HOME -->
    <div class="home">
        <div id="banner">
            <h1>YOUR ONE-STOP FLAVORFUL SHOP</h1>
            <h2>MILK TEA • FRUIT TEA • MANGO GRAHAM SHAKE • FRAPPE • ETC</h2>
            <a href="#" class="btn-Shopnow">SHOP NOW</a>
        </div>
        <div id="image-right-side">
                <img src="image/image-hand.png" alt="Hand holding JapCha">
        </div>
                
        <div class="form-container">
            <i class="uil uil-times form_close"></i>
            <div class="form login_form">
                <form action="Connect.php" method="post">
                    <h2>Login</h2>
                    <div class="input_box">
                        <input type="email" placeholder="Enter your email" required/>
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Enter your password" required/>
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check">
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot Password?</a>
                    </div>
                    <button class="btnLogin">Login Now</button>

                    <div class="login_signup">
                        Don't have an account? <a href="#" id="signup">Signup</a>
                    </div>
                </form>
            </div>
          
            <!-- Signup form -->
            <div class="form signup_form">
                <form action="signup_query.php" method="post">
                    <h2>Signup</h2>
                    <div class="input_box">
                        <input type="text" placeholder="Username" name="userName" required />
                        <i class="uil uil-user user" style="color: #707070; left: 0;"></i>
                    </div>
                    <div class="input_box">
                        <input type="email" placeholder="Enter your email"  name="email" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Create password" name="pass" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Confirm password" name="confirm_pass" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    <div class="input_box">
                        <input type="text" placeholder="Address" name="address" required />
                        <i class="uil uil-map-marker" style="color: #707070; left: 0;"></i>
                    </div>
                    <div class="input_box">
                        <input type="tel" placeholder="Phone number" name="contact" required />
                        <i class="uil uil-phone" style="color: #707070; left: 0;"></i>
                        <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                    </div>
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">I aggree to the <span style="color: #B4A30D; text-decoration: underline;">Term of Service</span> & 
                                <span style="color: #B4A30D; text-decoration: underline;">Privacy Policy</span></label>
                        </span>  
                    </div>
                    <!-- <input type="submit" class="btnLogin btn-primary"> -->
                    <button class="btnSignup">Signup Now</button>
                    <div class="login_signup">
                        Already have an account? <a href="#" id="login">Login</a>
                    </div>
                </form>
            </div>
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
                            <a href="#">
                                <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                            </a>
                        </div>
                        <div class="child">
                            <a href="#">
                                <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                            </a>
                        </div>
                        <div class="child">
                            <a href="#">
                                <img class="child-img" src="image/Mango-shake.png" alt="coffee image">
                            </a>
                        </div>
                        <div class="child">
                            <a href="#">
                                <img class="child-img"  src="image/Mango-shake.png" alt="coffee image">
                            </a>
                        </div>
                        <div class="child" >
                            <a href="#">
                                <img class="child-img"  src="image/Mango-shake.png" alt="coffee image">
                            </a>
                        </div>
                        <div class="child" >
                            <a href="#">
                                <img class="child-img"  src="image/Mango-shake.png" alt="coffee image">
                            </a>
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
                            <h2>What is JapCha?</h2>
                            <button class="btnCaretdown" onclick="showw()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                        </div>
                        <div class="paragraph-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                                cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                                quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <h2>What is JapCha?</h2>
                            <button class="btnCaretdown" onclick="showw2()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                        </div>
                        <div class="paragraph-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                                cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                                quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                        </div>
                    </div>
                    <div class="container-description">
                        <div class="description-japcha">
                            <h2>What is JapCha?</h2>
                            <button class="btnCaretdown" onclick="showw3()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                        </div>
                        <div class="paragraph-desc">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                                cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                                quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                        </div>
                    </div>
            </div>
            <div id="right-div">
                <div class="container-description">
                    <div class="description-japcha">
                        <h2 class="description">What is JapCha?</h2>
                        <button class="btnCaretdown" onclick="showw4()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                    </div>
                    <div class="paragraph-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                            cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                            quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                    </div>
                </div>
                <div class="container-description">
                    <div class="description-japcha">
                        <h2 class="description">What is JapCha?</h2>
                        <button class="btnCaretdown" onclick="showw5()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                    </div>
                    <div class="paragraph-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                            cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                            quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                    </div>
                   
                </div>
                <div class="container-description">
                    <div class="description-japcha">
                        <h2 class="description">What is JapCha?</h2>
                        <button class="btnCaretdown" onclick="showw6()"><i id="caret_down" class="fa fa-caret-down"></i></button>
                    </div>
                    <div class="paragraph-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores id reprehenderit 
                            cupiditate est mollitia magni voluptatibus animi totam fugit doloribus quia, perspiciatis 
                            quidem excepturi obcaecati quisquam fugiat veniam. Cumque, accusamus?</p>
                    </div>
                </div>
        </section>
     </main>

<?php
    include "c_footer.php";
?>