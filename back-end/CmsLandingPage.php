
<?php
    require '../classes/dbh.classes.php';
    require '../classes/save_note_Model.php';
    require_once '../classes/save_note_View.php';
    $AboutUsInfo = new SampleView();
?>
<?php
    include_once "CmsHeader.php";
?>
<style>
    h1{
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        padding: 0;
        color: white;
        margin-left: 90px;
        text-shadow: 2px 3px 1px rgba(0, 0, 0, 0.25);
        font-size: 64px;
    }
    h2{
        border-radius: 8px;
        padding: 0;
        font-family: 'Inter', sans-serif;
        font-size: 20px;
        color: #444444;
        margin-left: 90px;
        text-shadow: 2px 5px 4px rgba(0, 0, 0, 0.25);
    }
</style>
<div class="CmsBodyContainer" >
    <div class="CmsAboutUs-Container d-flex flex-column" style="background-color: #FDE402;">
        <div class="headerAboutUs p-3">Landing Page</div>
        <div class="EditFieldCon mt-5 mb-5">
        <form id="upload-form" enctype="multipart/form-data">
                <div class="label-con">
                    <label for="Title">Title:</label>
                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                    data-toggle="modal" data-target="#edit<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                
                </div>
            <div class="text-center">
                <h1>Your One Stop Flavor-Ful Shop</h1>
            </div>
            <!-- <textarea name="title" id="title"></textarea>
            <button class="saveJapcha" id="saveTitle">Save</button> -->
        </div>
        <div class="EditFieldCon mt-5 mb-5">
                <div class="label-con">
                    <label for="subtitle">Subtitle:</label>
                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                    data-toggle="modal" data-target="#edit<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                
                </div>
                <div class="text-center">
                    <h2>MILK TEA • FRUIT TEA • MANGO GRAHAM CAKE • FRAPPE • ETC</h2>
                </div>
            <!-- <textarea name="Subtitle" id="Subtitle"></textarea>
            <button class="saveJapcha" id="saveSubtitle">Save</button> -->
        </div>
        <div class="EditFieldCon mt-5 mb-5">
           
                <div class="label-con">
                    <label for="Logo">Logo:</label>
                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                    data-toggle="modal" data-target="#edit<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                
                </div>

                <div class="text-center">
                    <img src="../image/japcha_logo.png" alt="japcha_logo.png" class="img-fluid">
                </div>         
                <!-- <input type="file" id="file-input" name="file" accept ="image/*" >
                <button class="saveJapcha" id="saveLogo" type="submit">Save</button> -->
            </form>
            <div id="result"></div>
        </div>
        <div class="EditFieldCon mt-5 mb-5">
            
                <div class="label-con">
                    <label for="landingPage">Landing Page Image:</label>
                    <button class="btn btn-secondary" data-tooltip="tooltip" data-placement="top" title="Edit Userlevel"
                    data-toggle="modal" data-target="#edit<?= $userlevel['userlevel_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                
                </div>
                <div class="text-center">
                    <img src="../image/image-hand.png" alt="japcha_logo.png" class="img-fluid">
                </div>
                <!-- <input type="file" id="file-input" name="file" accept ="image/*" >
                <button class="saveJapcha" id="saveImage" type="submit">Save</button> -->
            </form>
            <div id="result"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            initializeSummernote('#title');
            initializeSummernote('#Subtitle');
        });
</script>

<?php
    include_once "CmsFooter.php";
?>