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
}