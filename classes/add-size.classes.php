<?php

class addSize extends Dbh {

    protected function setSize($size) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO size (size_name) VALUES (?)');

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

    protected function checkSize($size) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT size_name FROM size WHERE size_name = ?');
            
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
}