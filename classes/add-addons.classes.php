<?php

class addAddons extends Dbh {

    protected function setAddons($addons) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO addons (addons_name) VALUES (?)');

                // Execute the query
                if (!$stmt->execute(array($addons))) {
                    throw new Exception("Failed to Add Size");
                    header("location: ../back-end/admin-add-ons.php?error=addingaddonsfailed");
                   
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/admin-add-ons.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }

    protected function checkAddons($addons) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT addons_name FROM addons WHERE addons_name = ?');
            
            // Execute the query
            if (!$stmt->execute(array($addons))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../back-end/admin-add-ons.php?error=addonsdoesnotexist");
                exit();

            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;

        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../back-end/admin-add-ons.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
    protected function updateNewAddons($addons, $addonsID) {
        try {

            $stmt = $this->connect()->prepare('UPDATE addons SET addons_name = ? WHERE addons_id = ?');
    
            // Execute the query
            if (!$stmt->execute(array($addons, $addonsID))) {
                throw new Exception("Failed to update addons");
            }
    
            // Close the prepared statement
            $stmt = null;

        } catch (Exception $e) {
            //throw $th;
            header("location: ../back-end/admin-add-ons.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    
}
        public function getAddons(){
            try {
                $addons = array();
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('SELECT * FROM addons');
        
                // Execute the query
                if ($stmt->execute()) { // Pass the product_id as an array
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $addons[] = $row;
                    }
                }
                return $addons;
        
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location:../customerSHOP.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
}