<?php

//Retrieve the data in viewCategory
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //  // Get the form data
    //  //filter for retrieval of data
    // //  $coupon = htmlspecialchars($_POST["c_name"], ENT_QUOTES, 'UTF-8');

    // // instantiate signupContr class
    
    // include "../classes/add-category-cntrl.classes.php";
    // $addCategory = new AddCategoryContr($category);

    // // Runnig error handlers and user signup
    // $addCategory-> addCategory();
    

    // // Going back to front page
    
    
    if (isset($_POST['saveAddButton'])) {
        echo "Connected";
        $getCouponCode = htmlspecialchars($_POST["couponCode"], ENT_QUOTES, 'UTF-8');
        $getOfferName = htmlspecialchars($_POST["offerName"], ENT_QUOTES, 'UTF-8');
        $getDiscount = htmlspecialchars($_POST["discount"], ENT_QUOTES, 'UTF-8');
        $getQuantity = htmlspecialchars($_POST["Quantity"], ENT_QUOTES, 'UTF-8');
        $getStartTime = htmlspecialchars($_POST["StartTime"], ENT_QUOTES, 'UTF-8');
        $getEndTime = htmlspecialchars($_POST["EndTime"], ENT_QUOTES, 'UTF-8');
        $formattedStartTime = date("Y-m-d H:i:s", strtotime($getStartTime));
        $formattedEndTime = date("Y-m-d H:i:s", strtotime($getEndTime));

        include "../classes/dbh.classes.php";
        include "../classes/CouponModel.php";
        $insertCoupon = new CouponModel();
        $insertCoupon->insertCoupon($getCouponCode,$getOfferName,$getDiscount,$getQuantity,$formattedStartTime,$formattedEndTime);
        
        header("location: ../back-end/CouponManagement.php?error=none");
        exit();

    }

    if (isset($_POST['updateButton'])) {
        echo "Connected";
        $editCouponCode = htmlspecialchars($_POST["editCouponCode"], ENT_QUOTES, 'UTF-8');
        $editOfferName = htmlspecialchars($_POST["editOfferName"], ENT_QUOTES, 'UTF-8');
        $editDiscount = htmlspecialchars($_POST["editDiscount"], ENT_QUOTES, 'UTF-8');
        $editQuantity = htmlspecialchars($_POST["editQuantity"], ENT_QUOTES, 'UTF-8');
        $editStartTime = htmlspecialchars($_POST["editStartTime"], ENT_QUOTES, 'UTF-8');
        $editEndTime = htmlspecialchars($_POST["editEndTime"], ENT_QUOTES, 'UTF-8');
        $formattedStartTime = date("Y-m-d H:i:s", strtotime($editStartTime));
        $formattedEndTime = date("Y-m-d H:i:s", strtotime($editEndTime));
        $couponID = htmlspecialchars($_POST["couponID"], ENT_QUOTES, 'UTF-8');

        include "../classes/dbh.classes.php";
        include "../classes/CouponModel.php";

        $editCoupon= new CouponModel();
        $editCoupon->editCoupon($editCouponCode,$editOfferName,$editDiscount,$editQuantity,$formattedStartTime,$formattedEndTime,$couponID);
        
        header("location: ../back-end/CouponManagement.php?error=none");
        exit();

    }

}
