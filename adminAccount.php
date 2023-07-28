<?php
    include "adminHeader.php";
?>

<main class="tableAdmin">
        <div class="card-option">
            <div class="cardHeader">
                <h6>Admin Account</h6>
                <button type="button" onclick="openAddAdmin()" class="btnAddAdmin">Add Account</button>
            </div>
        </div>

        <section class="table_header">
            <!-- <h1>Admin Account</h1> -->
            <input type="search" class="adminSearch" id="live_search" placeholder="Search....">
        </section>
        <section class="table_body">
            <table action="Admin_user_management.php"  >
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Profile</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>User Level</th>
                    <th>Contact No.</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                        include "adminDisplayResult/displayAdminAccount.php";
                   ?>
                </tbody>
                <?php
                        
                ?>
              </table>
        </section>
    </main>

    <!--triggers can't click outside element when modal is open -->
            <div class="form signup_form" id="addAdminPopup">
                <button class="form_close" onclick="closeAddAdmin()"><i class="uil uil-times"></i></button>
                <div class="formBody">
                    <form action="controller/addAdminAccount.php" method="post">
                        <h2>Signup</h2>
                        <div class="input_box">
                            <label for="username">Username:</label>
                            <input type="text" placeholder="Username" name="userName" required />
                            <i class="uil uil-user user" style="color: #707070; left: 0;"></i>
                        </div>
                        <div class="input_box">
                            <label for="username">Email:</label>
                            <input type="email" placeholder="Enter your email"  name="email" required />
                            <i class="uil uil-envelope-alt email"></i>
                        </div>
                        <div class="input_box">
                            <label for="username">Password:</label>
                            <input type="password" placeholder="Create password" name="pass" required />
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>
                        <div class="input_box">
                            <label for="user_level">User Level:</label>
                            <select name="user_level" >
                                <option value="default">User Level</option>
                                <?php
                                    include "config/databaseConnection.php";
                                    $query = "SELECT category_id, category_name FROM category";
                                    $result = mysqli_query($con, $query);
                                   
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $categoryId = $row['category_id'];
                                        $categoryName = $row['category_name'];
                                        echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                                    }
                                ?> 
                            </select>
                        </div>
                        <div class="input_box">
                            <label for="username">Phone:</label>
                            <input type="tel" placeholder="Phone number" name="contact" required />
                            <i class="uil uil-phone phone" style="color: #707070; left: 0;"></i>
                            <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                        </div>
                        <!-- <input type="submit" class="btnLogin btn-primary"> -->
                        <button class="btnSignup">Signup</button>
                    </form>
                </div>
            </div>
    <!-- <script src="adminJS.js"></script> -->
    <script>
                    let popup = document.getElementById("addAdminPopup");
            // let overlay = document.getElementById("modalOverlay");
            function openAddAdmin()
            {
                popup.classList.add("open-form");
            //    modalOverlay.style.display = "block";
            }
            function closeAddAdmin()
            {
            popup.classList.remove("open-form");
            //   modalOverlay.style.display = "none";
            }
            function closeModal(event) {
            if (event.target === modalOverlay || event.key === "Escape") {
            closePopup();
            }
            }

            // Listen for clicks on the modal overlay
            modalOverlay.addEventListener("click", closeModal);

            // Listen for keydown events to close the modal when "Escape" key is pressed
            document.addEventListener("keydown", closeModal);
    </script>
    <!-- Modal script -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="aJax.js"></script>
<?php
    include "adminFooter.php";

?>