<?php
    include "customerProfileHeader.php";
?>
<div class="rightContainer">
    <div class="ManageAccountSection"><h2>Manage Account</h2></div>
        <div class="containerFormSection">
            <form action="" autocomplete="off">
                <label for="fullname">Fullname</label>
                <input type="text" name="fullname" value="Adner Devila" readonly>
                <label for="email">Email</label>
                <input type="text" name="email" value="sample@gmail.com" readonly>
                <label for="contact">Contact No.</label>
                <input type="tel" name="contact" value="1234567789" readonly>
                <div class="button">
                    <button><a href="editProfile.php">Edit Profile</a></button>
                    <button><a href="changePasswordProfile.php">Change Password</a></button>
                </div>
            </form>
        </div>
</div>
   
<?php
    include "customerProfileFooter.php";
?>