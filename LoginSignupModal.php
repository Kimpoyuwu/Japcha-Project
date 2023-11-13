<div class="form-container">
            <i class="uil uil-times form_close"></i>
            <div class="form login_form">
                <form action="includes/login.inc.php" method="POST">
                    <h2>Login</h2>
                    <div class="input_box">
                        <input type="text" placeholder="Enter your email" name="email" required/>
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Enter your password" name="pass" required/>
                        <i class="uil uil-lock password"></i>
                        <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                    </div>
                    <!-- <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check">
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot Password?</a>
                    </div> -->
                    <button class="btnLogin" type="submit" name="submit">Login Now</button>

                    <div class="login_signup">
                        Don't have an account? <a href="#" id="signup">Signup</a>
                    </div>
                </form>
            </div>
          
            <!-- Signup form MODAL -->
            <div class="form signup_form">
                <form action="includes/signup.inc.php" method="POST">
                    <h2>Signup</h2>
                    <div class="input_box">
                        <input type="text" placeholder="Fullname" name="userName" required />
                        <i class="uil uil-user user" style="color: #707070; left: 0;"></i>
                    </div>
                    <div class="input_box">
                        <input type="email" placeholder="Enter your email"  name="email" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Create password" name="pass" required />
                        <i class="uil uil-lock password"></i>
                        <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Confirm password" name="confirm_pass" required />
                        <i class="uil uil-lock password"></i>
                        <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                    </div>
                    <div class="input_box">
                        <input type="text" placeholder="Default Address" name="address" required />
                        <i class="uil uil-map-marker" style="color: #707070; left: 0;"></i>
                    </div>
                    <div class="input_box">
                        <input type="tel" placeholder="Phone number" name="contact" required />
                        <i class="uil uil-phone" style="color: #707070; left: 0;"></i>
                        <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                    </div>
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">I aggree to the <span style="color: #B4A30D; text-decoration: underline;"><a href="terms_and_conditions.php" target="_blank">Term of Service</a></span> & 
                                <span style="color: #B4A30D; text-decoration: underline;"><a href="terms_and_conditions.php" target="_blank">Privacy Policy</a></span></label>
                        </span>  
                    </div>
                    <!-- <input type="submit" class="btnLogin btn-primary"> -->
                    <button class="btnSignup" type="submit" name="signup_now">Signup Now</button>
                    <div class="login_signup">
                        Already have an account? <a href="#" id="login">Login</a>
                    </div>
                </form>
            </div>
        </div>