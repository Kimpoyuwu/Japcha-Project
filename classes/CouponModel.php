<?php

class CouponModel extends Dbh{

    public function getAllCoupon(){
        
        
        try {
            // Your database code here

            $coupons = array();
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT * FROM coupons ORDER BY id DESC');
            
            // Execute the query
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $coupons[] = $row;
                }
            }
            
            
            return $coupons;
        } catch (\Throwable $c) {
           
            // Log the error to a file for debugging
            error_log($c->getMessage());
        
            // Redirect to an error page
            header("location: ../back-end/CouponManagement.php?error=" . urlencode($c->getMessage()));
            exit();
        }
    }

    public function insertCoupon($getCouponCode,$getOfferName,$getDiscount,$formattedStartTime,$formattedEndTime){
        try {

            $stmt = $this->connect()->prepare('INSERT INTO coupons (coupon_code,offer_name,discount_percentage,start_time,end_time) VALUES (?,?,?,?,?)');

            // Execute the query
            if (!$stmt->execute(array($getCouponCode,$getOfferName,$getDiscount,$formattedStartTime,$formattedEndTime))) {
                throw new Exception("Failed to Add Category");
                header("location: ../back-end/CouponManagement.php?error=addingcouponfailed");
               
            }

    $stmt = null;

        } catch (\Throwable $th) {
            //throw $th;
            header("location: ../back-end/CouponManagement.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function editCoupon($editCouponCode,$editOfferName,$editDiscount,$formattedStartTime,$formattedEndTime,$couponID) {
        try {

            $stmt = $this->connect()->prepare('UPDATE coupons SET coupon_code=?,offer_name=?,discount_percentage=?,start_time=?,end_time=? WHERE id = ?');
    
            // Execute the query
            if (!$stmt->execute(array($editCouponCode,$editOfferName,$editDiscount,$formattedStartTime,$formattedEndTime,$couponID))) {
                throw new Exception("Failed to update category");
            }
    
            // Close the prepared statement
            $stmt = null;

        } catch (Exception $e) {
            //throw $th;
            header("location: ../back-end/CouponManagement.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    
}
}
