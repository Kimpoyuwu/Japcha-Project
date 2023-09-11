<?php

class addCategory extends Dbh {

    protected function setCategory($category) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO category (category_name) VALUES (?)');

                // Execute the query
                if (!$stmt->execute(array($category))) {
                    throw new Exception("Failed to Add Category");
                    header("location: ../back-end/viewCategory.php?error=addingcategoryfailed");
                   
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/viewCategory.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }

    protected function checkCategory($category) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT category_name FROM category WHERE category_name = ?');
            
            // Execute the query
            if (!$stmt->execute(array($category))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../back-end/viewCategory.php?error=categorydoesnotexist");
                exit();

            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../back-end/viewCategory.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
}