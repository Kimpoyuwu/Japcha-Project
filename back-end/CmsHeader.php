<?php
    include "adminHeader.php";
    require_once '../classes/dbh.classes.php';
    require_once '../classes/cms.classes.php';
    $cmsData = new Cms();
    $cms = $cmsData->getCms();
?>
<style>
   section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	background: #007b5e;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
 
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #eee;
    font-size: 20px;
}
</style>
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

    <!-- <div class="buttonContainer">
        <button class="btnLanding active" id="btnLanding" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Landing Page</button>
        <button class="AboutUs" id="AboutUs" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="true">About Us</button>
        <button class="Social" id="SocialLink"><a href="copy.php">Social Media Link</a></button>
    </div> -->
    <div class="CmsBodyContainer" >

         <div class="col-xs-12 " style="width: 100%;">
				<div>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Landing Page</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">About Us</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Media Link</a>	
					</div>
                </div>
                <form action="../classes/save_note.php" method="POST" enctype="multipart/form-data">
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" style="padding-right: 10px !important;">
                   
                        <?php
                            include "CmsLanding.php";
                      
                        
                        ?>
                          <?php
                            include "CmsAbout.php";
                        ?>
                         <?php
                            include "CmsMediaLink.php";
                        ?>
                  
				</div>
                 <?php
                    include 'CmsLandingModal.php';
                    ?>
                    <?php
                    include 'CmsAboutModal.php';
                    ?>
                </form>
			
		</div>
    </div>


    <script>
          $(document).ready(function () {
            $('#btnLanding').click(function () {
                // $(this).addClass('active');
                // console.log("Class 'active' added.");
                // window.location.href = 'CmsLandingPage.php';
            });
        });
    </script>

    