<?php
require "dbh.classes.php";
require "save_note_Model.php";
$samplemodel = new SampleModel();

if(isset($_POST['content'])){
    $content = $_POST['content']; // Assuming you are using { content: orders } in your AJAX request
    $save = $samplemodel->setContent($content);
    if ($save === false) {
        // Handle the database error here
        echo "Error saving content to the database";
        exit;
    }
}

if(isset($_POST['order'])){
    $orders = $_POST['order'];
    $savs = $samplemodel->setOrder($orders);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['social'])){
    $social = $_POST['social'];
    $savs = $samplemodel->setSocials($social);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['policy'])){
    $policy = $_POST['policy'];
    $savs = $samplemodel->setPolicy($policy);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['location'])){
    $location = $_POST['location'];
    $savs = $samplemodel->setLocation($location);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['contact'])){
    $contact = $_POST['contact'];
    $savs = $samplemodel->setContact($contact);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['title_data'])){
    $title_data = $_POST['title_data'];
    $savs = $samplemodel->setTitle($title_data);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['subtitle'])){
    $subtitle = $_POST['subtitle'];
    $savs = $samplemodel->setSubtitle($subtitle);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}

if(isset($_POST['fbLink'])){
    $fbLink = $_POST['fbLink'];
    $savs = $samplemodel->setFbLink($fbLink);
    if ($savs === false) {
        // Handle the database error here
        echo "Error saving order to the database";
        exit;
    } else {
        // Redirect to another page after successful save
        header("Location: ../myProfile.php");
        exit;
    }
}