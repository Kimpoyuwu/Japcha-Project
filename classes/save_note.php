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

if(isset($_POST['update_logo'])){
    if(isset($_FILES['logoInput'])) {
        $file = $_FILES['logoInput'];

        // Check if there was no error during the file upload
        if($file['error'] === 0) {
            $fileType = $file['type'];

            // Define allowed image MIME types
            $allowedImageTypes = array('image/jpeg', 'image/png', 'image/gif');

            if (in_array($fileType, $allowedImageTypes)) {
                // The uploaded file is an image
                echo 'File is an image. You can process it here.';
                $uploadDirectory = '../upload-content/';
                $uploadPath = $uploadDirectory . $_FILES['logoInput']['name'];
                $tmp_name = $_FILES['logoInput']['tmp_name'];
                move_uploaded_file($tmp_name, $uploadPath);

                $logo_name = $_FILES['logoInput']['name'];
                $savs = $samplemodel->setLogo($logo_name);

                if ($savs === false) {
                    // Handle the database error here
                    echo "Error saving order to the database";
                } else {
                    // Specify the directory to move the file to
                }
            } else {
                echo 'File is not an image. Please upload a valid image.';
            }
        } else {
            echo 'Error during file upload. Please try again.';
        }
    } else {
        echo 'No file was uploaded.';
    }
}

if(isset($_POST['update_landing_img'])){
    if(isset($_FILES['Landing_image'])) {
        $file = $_FILES['Landing_image'];

        // Check if there was no error during the file upload
        if($file['error'] === 0) {
            $fileType = $file['type'];

            // Define allowed image MIME types
            $allowedImageTypes = array('image/jpeg', 'image/png', 'image/gif');

            if (in_array($fileType, $allowedImageTypes)) {
                // The uploaded file is an image
                echo 'File is an image. You can process it here.';
                $uploadDirectory = '../upload-content/';
                $uploadPath = $uploadDirectory . $_FILES['Landing_image']['name'];
                $tmp_name = $_FILES['Landing_image']['tmp_name'];
                move_uploaded_file($tmp_name, $uploadPath);
                
                $landing_img = $_FILES['Landing_image']['name'];
                $savs = $samplemodel->setLandingImage($landing_img);

                if ($savs === false) {
                    // Handle the database error here
                    echo "Error saving order to the database";
                } else {
                    // Specify the directory to move the file to
                }
            } else {
                echo 'File is not an image. Please upload a valid image.';
            }
        } else {
            echo 'Error during file upload. Please try again.';
        }
    } else {
        echo 'No file was uploaded.';
    }
}




if (isset($_POST['saveLink'])) {
    $fbLink = $_POST['fbLink'];
    $igLink = $_POST['igLink'];
    $ytLink = $_POST['ytLink'];

    $fbUpdateResult = $samplemodel->setFbLink($fbLink, $igLink, $ytLink );
    
}

