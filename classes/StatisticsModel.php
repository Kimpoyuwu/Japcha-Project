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

}
