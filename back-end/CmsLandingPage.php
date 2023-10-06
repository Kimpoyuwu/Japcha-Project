
<?php
    require '../classes/dbh.classes.php';
    require '../classes/save_note_Model.php';
    require_once '../classes/save_note_View.php';
    $AboutUsInfo = new SampleView();
?>
<div class="CmsAboutUs-Container">
    <div class="headerAboutUs">Landing Page</div>
    <div class="EditFieldCon">
        <label for="title">Title</label>
        <textarea name="title" id="title"><?= $AboutUsInfo->fetchTitle(); ?></textarea>
        <button class="saveJapcha" id="saveTitle">Save</button>
    </div>
    <div class="EditFieldCon">
        <label for="Subtitle">Subtitle</label>
        <textarea name="Subtitle" id="Subtitle"><?= $AboutUsInfo->fetchSubtitle(); ?></textarea>
        <button class="saveJapcha" id="saveSubtitle">Save</button>
    </div>
    <div class="EditFieldCon">
        <form id="upload-form" enctype="multipart/form-data">
            <label for="Logo">Logo</label>
            <input type="file" id="file-input" name="file" accept ="image/*" >
            <button class="saveJapcha" id="saveLogo" type="submit">Save</button>
        </form>
        <div id="result"></div>
    </div>
    <div class="EditFieldCon">
        <form id="upload-form" enctype="multipart/form-data">
            <label for="img-landing">Landing Page Image</label>
            <input type="file" id="file-input" name="file" accept ="image/*" >
            <button class="saveJapcha" id="saveImage" type="submit">Save</button>
        </form>
        <div id="result"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
            initializeSummernote('#title');
            initializeSummernote('#Subtitle');
        });
</script>

<script src="../assets/js/summerNote.js"></script>