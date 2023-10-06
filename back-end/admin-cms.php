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
    <div class="header">
        <div class="header-text">Manage Content</div>
    </div>

    <div class="buttonContainer">
        <button class="btnLanding" id="btnLanding">Landing Page</button>
        <button class="AboutUs" id="AboutUs">About Us</button>
        <button class="Social" id="SocialLink"><a href="copy.php">Social Media Link</a></button>
    </div>
    <div class="CmsBodyContainer">

    </div>
</div>

<script type="text/javascript">
    function showLogo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displaylogo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displayimage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function showBg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#displaybg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
<script src="../assets/js/cms-buttonFunction.js"></script>

<script src="../assets/js/summerNote.js"></script>
<?php
    include "adminFooter.php";

?>