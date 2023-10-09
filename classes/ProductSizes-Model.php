<?php

class addProductSizes extends Dbh {

    protected function setProductSizes($product, $size, $price, $quantity) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO product_variation (product_id, sizes_id, price, quantity) VALUES (?,?,?,?)');

                // Execute the query
                if (!$stmt->execute(array($product, $size, $price, $quantity))) {
                    throw new Exception("Failed to Add Category");
                    header("location: ../back-end/admin-ProductSizes.php?error=addingcategoryfailed");
                   
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }
//     protected function updateNewCategory($category, $categoryID) {
//         try {

//             $stmt = $this->connect()->prepare('UPDATE category SET category_name = ? WHERE category_id = ?');
    
//             // Execute the query
//             if (!$stmt->execute(array($category, $categoryID))) {
//                 throw new Exception("Failed to update category");
//             }
    
//             // Close the prepared statement
//             $stmt = null;

//         } catch (Exception $e) {
//             //throw $th;
//             header("location: ../back-end/viewCategory.php?error=" . urlencode($e->getMessage()));
//             exit();
//         }
    
// }

    protected function checkProductSize($product, $size) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT product_id FROM product_variation WHERE product_id=? AND sizes_id = ?');
            
            // Execute the query
            if (!$stmt->execute(array($product, $size))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../back-end/admin-ProductSizes.php?error=categorydoesnotexist");
                exit();

            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
}