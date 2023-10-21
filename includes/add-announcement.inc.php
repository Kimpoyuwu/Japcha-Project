<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST['saveButton'])){

        echo"Connected";

        $getDate = htmlspecialchars($_POST["editStartTime"], ENT_QUOTES, 'UTF-8');
        $getAnnouncement = htmlspecialchars($_POST["editTitle"], ENT_QUOTES, 'UTF-8');
        $getContent = htmlspecialchars($_POST["editContent"], ENT_QUOTES, 'UTF-8');
        $formattedStartTime = date("Y-m-d H:i:s", strtotime($getDate));

        include "../classes/dbh.classes.php";
        include "../classes/AnnouncementModel.php";
        $insertAnnouncement = new AnnouncementModel();
        $insertAnnouncement->insertAnnouncement($formattedStartTime,$getAnnouncement,$getContent);

        header("location: ../back-end/AnnouncementManagement.php?error=none");
        exit();
    }

    if (isset($_POST['updateButton'])) {
        echo "Consnected";
        $editDate = htmlspecialchars($_POST["editStartTime"], ENT_QUOTES, 'UTF-8');
        $editAnnouncement = htmlspecialchars($_POST["editTitle"], ENT_QUOTES, 'UTF-8');
        $editContent = htmlspecialchars($_POST["editContent"], ENT_QUOTES, 'UTF-8');
        $formattedStartTime = date("Y-m-d H:i:s", strtotime($editDate));
        $couponID = htmlspecialchars($_POST["couponID"], ENT_QUOTES, 'UTF-8');

        include "../classes/dbh.classes.php";
        include "../classes/AnnouncementModel.php";

        $AnnouncementModel= new AnnouncementModel();
        $AnnouncementModel->editAnnouncement($formattedStartTime,$editAnnouncement,$editContent,$couponID);
        header("location: ../back-end/CouponManagement.php?error=none");
        exit();

    }


}
