<?php
class StatisticsModel extends Dbh {
    public function getProductsCount(){
        try {
            $count = 0;
            // Prepare the SQL query to count the products
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as total_count FROM product p WHERE p.isDeleted != 1 AND p.isHide != 1');
            
            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $result['total_count'];
            }
            return $count;

        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location:../back-end/adminStatistic.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function getCategoryCount(){
        try {
            $count = 0;
            // Prepare the SQL query to count the products
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as total_count FROM categories c WHERE c.isDeleted != 1');
            
            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $result['total_count'];
            }
            return $count;

        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location:../back-end/adminStatistic.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function getSizesCount(){
        try {
            $count = 0;
            // Prepare the SQL query to count the products
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as total_count FROM product_sizes ps WHERE ps.isDeleted != 1');
            
            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $result['total_count'];
            }
            return $count;

        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location:../back-end/adminStatistic.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function getAddonsCount(){
        try {
            $count = 0;
            // Prepare the SQL query to count the products
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as total_count FROM addons a WHERE a.isDeleted != 1 AND a.isHide != 1');
            
            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $result['total_count'];
            }
            return $count;

        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location:../back-end/adminStatistic.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function CountNewInserts() {
        try {
            date_default_timezone_set('Asia/Manila');
    
            // Get today's date
            $today = date('Y-m-d');
    
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND isActive = 1 OR (DATE(`order_date`) = :today AND `preparing` = 1 AND isActive = 1) OR (DATE(`order_date`) = :today AND `delivery` = 1  AND isActive = 1) OR (DATE(`order_date`) = :today AND `completed` = 1  AND isActive = 1) AND `cancel` != 1 AND `removed` != 1');
            
            $stmt->bindParam(':today', $today, PDO::PARAM_STR);
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['new_insert_count'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function CountOrderDeliveries() {
        try {
            date_default_timezone_set('Asia/Manila');
    
            // Get today's date
            $today = date('Y-m-d');
    
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND isActive = 1 AND `preparing` != 1 AND `delivery` = 1 AND `completed` != 1 AND `cancel` != 1 AND `removed` != 1');
            
            $stmt->bindParam(':today', $today, PDO::PARAM_STR);
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['new_insert_count'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
