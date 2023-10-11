<?php
    include "adminHeader.php";
?>

<link rel="stylesheet" href="../assets/css/CMS.css">
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="cms-container">
    <div class="header mt-5">
        <div class="header-text">Manage Content</div>
    </div>

    <div class="buttonContainer">
        <button class="btnLanding" id="btnLanding"><a href="CmsLandingPage.php">Landing Page</a></button>
        <button class="AboutUs" id="AboutUs"><a href="CmsAboutUs.php">About Us</a></button>
        <button class="Social" id="SocialLink"><a href="copy.php">Social Media Link</a></button>
    </div>
    