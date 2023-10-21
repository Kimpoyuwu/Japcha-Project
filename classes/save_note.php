<?php
require "dbh.classes.php";
require "save_note_Model.php";
$samplemodel = new SampleModel();

if(isset($_POST['japcha_data'])){
    $japcha = $_POST['japchaInput']; // Assuming you are using { content: orders } in your AJAX request
    $save = $samplemodel->setContent($japcha);
    if ($save === false) {
        // Handle the database error here
        echo "Error saving content to the database";
        exit;
    }else{
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['order_data'])){
    $orders = $_POST['orderInput'];
    $savs = $samplemodel->setOrder($orders);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['socials_data'])){
    $social = $_POST['socialsInput'];
    $savs = $samplemodel->setSocials($social);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['policy_data'])){
    $policy = $_POST['policyInput'];
    $savs = $samplemodel->setPolicy($policy);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['location_data'])){
    $location = $_POST['locationInput'];
    $savs = $samplemodel->setLocation($location);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['contact_data'])){
    $contact = $_POST['contactInput'];
    $savs = $samplemodel->setContact($contact);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['title_data'])){
    $title_data = $_POST['titleInput'];
    echo 'connected';
    echo  $title_data;
    $savs = $samplemodel->setTitle($title_data);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}

if(isset($_POST['subtitle_data'])){
    $subtitle = $_POST['subtitleInput'];
    echo 'connected';
    echo $subtitle;
    $savs = $samplemodel->setSubtitle($subtitle);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../back-end/admin-cms.php");
        exit;
    }
}
if (isset($_POST['saveLink'])) {
    $fbLink = $_POST['fbLink'];
    $igLink = $_POST['igLink'];
    $ytLink = $_POST['ytLink'];

    $fbUpdateResult = $samplemodel->setFbLink($fbLink, $igLink, $ytLink );
    // $igUpdateResult = $samplemodel->setIgLink($igLink);
    // $ytUpdateResult = $samplemodel->setYtLink($ytLink);

    
}

