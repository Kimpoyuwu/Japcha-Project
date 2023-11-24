    <?php
    date_default_timezone_set('Asia/Manila');

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

        public function CountCompleteOrders() {
            try {
            
        
                // Get today's date
                $today = date('Y-m-d');
        
                $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND `completed` = 1');
                
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

        
                // Get today's date
                $today = date('Y-m-d');
        
                $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND `delivery` = 1');
                
                $stmt->bindParam(':today', $today, PDO::PARAM_STR);
                
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                return $result['new_insert_count'];
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        public function CountTotalOrderPresent() {
            try {
        
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

        public function CountTotalCompletedOrder() {
                try {
                    
                    $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE `completed` = 1');

                    
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    return $result['new_insert_count'];
                } catch (\Throwable $th) {
                    throw $th;
                }
            }

    public function CountTotalPrice() {
        try {
            $today = date('Y-m-d');
            $stmt = $this->connect()->prepare('SELECT total_price FROM `order` WHERE DATE(`order_date`) = :today  AND `completed` = 1 ');

            $stmt->bindParam(':today', $today, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $totalPrice = 0;

            foreach ($results as $row) {
                $totalPrice += $row['total_price'];
            }

            return $totalPrice;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function CountTotalPriceOverall() {
        try {
            $stmt = $this->connect()->prepare('SELECT SUM(total_price) FROM `order` WHERE  `completed` = 1');
    
            $stmt->execute();
            $totalPrice = $stmt->fetchColumn();
    
            return $totalPrice;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    

    public function CountProductSold() {
        try {
        
            $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `customer_orders` WHERE `delivered` = 1');
            
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['new_insert_count'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function CountTotalQuantityByFilter($filter) {
        try {
            // Define default date format and interval
            $dateFormat = "%Y-%m-%d";
            $interval = "1 DAY";

            // Modify date format and interval based on the selected filter
            switch ($filter) {
                case 'weeks':
                    $dateFormat = "%Y-W%u"; // ISO-8601 week format
                    $interval = "1 WEEK";
                    break;
                case 'months':
                    $dateFormat = "%Y-%m";
                    $interval = "1 MONTH";
                    break;
                case 'years':
                    $dateFormat = "%Y";
                    $interval = "1 YEAR";
                    break;
                // Add more cases as needed for other filters

                // Default case for days
                default:
                    break;
            }

            // Prepare the SQL query
            $stmt = $this->connect()->prepare("
            SELECT
                date_group,
                SUM(total_orders) AS total_orders,
                SUM(total_quantity) AS total_quantity,
                SUM(total_revenue) AS total_revenue
            FROM (
                SELECT
                    DATE_FORMAT(co.order_date, '$dateFormat') AS date_group,
                    COUNT(co.order_id) AS total_orders,
                    SUM(co.quantity) AS total_quantity,
                    0 AS total_revenue
                FROM
                    customer_orders co
                WHERE
                    co.delivered = 1
                GROUP BY
                    date_group
        
                UNION ALL
        
                SELECT
                    DATE_FORMAT(o.order_date, '$dateFormat') AS date_group, -- Use the same date as in the first part
                    0 AS total_orders,
                    0 AS total_quantity,
                    SUM(o.total_price) AS total_revenue
                FROM
                    `order` o
                WHERE
                    o.completed = 1
                GROUP BY
                    date_group
            ) AS aggregated_data
            GROUP BY
                date_group
            ORDER BY
                date_group;
        ");
        

            // Execute the query
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Format the data
            $data = [];
            foreach ($results as $row) {
                // Format the date based on the selected filter
                switch ($filter) {
                    case 'weeks':
                        $weekNumber = date('W', strtotime($row['date_group']));
                        $formattedDate = date('F', strtotime($row['date_group'])) . ' Week ' . $weekNumber;
                        break;
                    case 'years':
                        $formattedDate = date('Y', strtotime($row['date_group']));
                        break;
                    case 'months':
                        $formattedDate = date('F', strtotime($row['date_group']));
                        break;
                    default:
                        // For other filters, use the default format
                        $formattedDate = date('F j, Y', strtotime($row['date_group']));
                        break;
                }

                $data[] = ['y' => $formattedDate, 'quantity' => (int)$row['total_quantity'], 'order_count' => (int)$row['total_orders'], 'revenue' => (float)$row['total_revenue']];
            }

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    public function BestSellerProduct() {
        try {
            $stmt = $this->connect()->prepare('SELECT co.product_id, p.product_name, SUM(co.quantity) as total_quantity FROM `customer_orders`co INNER JOIN product p ON co.product_id = p.product_id WHERE co.`delivered` = 1 GROUP BY co.product_id ORDER BY total_quantity DESC LIMIT 4');

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function TotalOrderDaily() {
        try {
            $stmt = $this->connect()->prepare('SELECT COUNT(order_id) as total_orders, DATE_FORMAT(order_date, "%M %d %Y") as formatted_date FROM `order` WHERE `completed` = 1 GROUP BY formatted_date');

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function GetTotalPriceDaily() {
        try {
            $stmt = $this->connect()->prepare('SELECT SUM(total_price) as total_price, DATE_FORMAT(order_date, "%M %d %Y") as formatted_date FROM `order` WHERE `completed` = 1 GROUP BY formatted_date');

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function GetTotalProductSalesDaily() {
        try {
            $stmt = $this->connect()->prepare('SELECT product_name, SUM(quantity * product_price) as total_price, DATE_FORMAT(order_date, "%M %d %Y") as formatted_date FROM `customer_orders` WHERE `delivered` = 1 GROUP BY formatted_date, product_name');

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\Throwable $th) {
            throw $th;
        }
    }








    }
