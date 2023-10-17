<?php
    // require_once("dbh.classes.php");

class addSize extends Dbh {

    protected function setSize($size) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO product_sizes (size_name) VALUES (?)');

                // Execute the query
                if (!$stmt->execute(array($size))) {
                    throw new Exception("Failed to Add Size");
                    header("location: ../back-end/admin-sizes.php?error=addingcategoryfailed");
                   
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/admin-sizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }

    protected function updateNewSize($size, $sizeID) {
        try {

            $stmt = $this->connect()->prepare('UPDATE product_sizes SET size_name = ? WHERE size_id = ?');
    
            // Execute the query
            if (!$stmt->execute(array($size, $sizeID))) {
                throw new Exception("Failed to update size");
            }
    
            // Close the prepared statement
            $stmt = null;

        } catch (Exception $e) {
            //throw $th;
            header("location: ../back-end/admin-add-ons.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    
    }

    protected function checkSize($size) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT size_name FROM product_sizes WHERE size_name = ?');
            
            // Execute the query
            if (!$stmt->execute(array($size))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../back-end/admin-sizes.php?error=sizedoesnotexist");
                exit();

            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../back-end/admin-sizes.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

        protected function getSize($size_name) {
            try {

                $stmt = $this->connect()->prepare('SELECT size_name FROM product_sizes WHERE size_name = ?');

                // Execute the query
                if (!$stmt->execute(array($size))) {
                    throw new Exception("Failed to Add Size");
                    header("location: ../back-end/admin-sizes.php?error=addingcategoryfailed");
                
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/admin-sizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }
}