<style>
    .form-group {
        position: relative !important;
    }
    .form-group i{
        position: absolute;
    /* left: 0; */
        top: 20%;
        color: #c3baba !important;
    }
    .form-group input{
        border-top: none;
        border-right: none;
        border-left: none;
        padding-left: 1.5rem
    }
    .form-group input:focus {
        color: #495057;
        background-color: #fff;
        border-bottom-color: #005bb7 !important;
        /* outline: 0; */
        /* box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); */
        box-shadow: none !important;
    }
    .form-group input:focus + i {
        color: #80bdff !important;
    }

</style>
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
                    <div class="container-header mb-4">
                        <h2>Signup</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" required />
                                <i class="uil uil-user user" style="color: #707070; left: 0;"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" required />
                                <i class="uil uil-user user" style="color: #707070; left: 0;"></i>
                            </div>
                          
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Create password" name="pass" required />
                                <i class="uil uil-lock password"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm password" name="confirm_pass" required />
                                <i class="uil uil-lock password"></i>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" required />
                                <i class="uil uil-envelope-alt email"></i>
                            </div>

                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Default Address" name="address" required />
                                <i class="uil uil-map-marker" style="color: #707070; left: 0;"></i>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Postal Code" name="Postal" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="City" name="City" required />
                                    </div>
                                </div>
                                
                                <!-- <i class="uil uil-map-marker" style="color: #707070; left: 0;"></i> -->
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Region" name="Region" required />
                            </div>

                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Phone number (09XX-XXX-XXXX)" name="contact" required />
                                <i class="uil uil-phone" style="color: #707070; left: 0;"></i>
                            </div>
                        </div>
                    </div>
                   
                    <div class="container-footer">
                        <div class="option_field">
                            <span class="checkbox">
                                <input type="checkbox" id="terms" required>
                                <label for="terms">I aggree to the <span style="color: #B4A30D; text-decoration: underline;"><a href="terms_and_conditions.php" target="_blank">Term of Service</a></span> & 
                                    <span style="color: #B4A30D; text-decoration: underline;"><a href="terms_and_conditions.php" target="_blank">Privacy Policy</a></span></label>
                            </span>  
                        </div>
                        <button class="btnSignup btn" type="submit" name="signup_now">Signup Now</button>
                        <div class="login_signup">
                            Already have an account? <a href="#" id="login">Login</a>
                        </div>
                    </div>
                    <!-- <input type="submit" class="btnLogin btn-primary"> -->
                    
                </form>
            </div>
        </div>