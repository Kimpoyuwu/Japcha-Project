<?php
class Order extends Dbh {

    public function setOrder($getOrderNumber, $customerid, $prodid, $product_name, $product_price, $sizesid, $size_name, $subtotal, $quantity, $addons_id, $addons_name, $addons_price, $product_remark) {
        try {
            $stmt = $this->connect()->prepare('INSERT INTO `customer_orders` (`orders_id`, `customer_id`, `product_id`, `product_name`, `product_price`, `sizes_id`, `size_name`, `subtotal`, `quantity`, `addons_id`, `addons_name`, `addons_price`, `product_remark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    
            // Assuming addons_id can be NULL
            $addons_id_value = ($addons_id !== "") ? $addons_id : null;
    
            $stmt->bindValue(1, $getOrderNumber, PDO::PARAM_INT);
            $stmt->bindValue(2, $customerid, PDO::PARAM_INT);
            $stmt->bindValue(3, $prodid, PDO::PARAM_INT);
            $stmt->bindValue(4, $product_name, PDO::PARAM_STR);
            $stmt->bindValue(5, $product_price, PDO::PARAM_STR);
            $stmt->bindValue(6, $sizesid, PDO::PARAM_INT);
            $stmt->bindValue(7, $size_name, PDO::PARAM_STR);
            $stmt->bindValue(8, $subtotal, PDO::PARAM_STR);
            $stmt->bindValue(9, $quantity, PDO::PARAM_INT);
            
            // Bind addons_id accordingly
            if ($addons_id_value !== null) {
                $stmt->bindValue(10, $addons_id_value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(10, null, PDO::PARAM_NULL);
            }
    
            $stmt->bindValue(11, $addons_name, PDO::PARAM_STR);
            $stmt->bindValue(12, $addons_price, PDO::PARAM_STR);
            $stmt->bindValue(13, $product_remark, PDO::PARAM_STR);
    
            // Execute the query
            $success = $stmt->execute();
    
            // Check if the query was successful
            if (!$success) {
                throw new Exception("Order failed.");
            }
    
            return true;
    
        } catch (\Throwable $th) {
            // Log or handle the exception appropriately
            error_log("Error in setOrder: " . $th->getMessage());
            return false;
        }
    }
    
    

    public function getOrdersV2() {
        try {

            $orders = array();
            $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `df`, `total_price`, `remark` FROM `order` WHERE preparing != 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1 ORDER BY order_id ASC');

            // Execute the query
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $orders[] = $row;
                }
            }
            $stmt->closeCursor();
            return $orders;
        
        } catch (\Throwable $th) {
            //throw $th;
            header("location: ../index.php?error=" . urlencode($th->getMessage()));
            exit();
        }
    
}

public function getOrderNumberByCustomer($customerid) {
    try {
        $orders = array();
        $totalPrices = array();
        $count = 0;

        $stmt = $this->connect()->prepare('SELECT `order_id`, `total_price` FROM `order` WHERE customer_id = ? AND preparing != 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch all order_ids and total_prices directly into arrays
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $orders[] = $row['order_id'];
                $totalPrices[] = $row['total_price'];
            }

            $count = count($orders);
        }

        return array('orders' => $orders, 'total_prices' => $totalPrices, 'count' => $count);

    } catch (\Throwable $th) {
        // Log the error or rethrow the exception for higher-level handling
        error_log('Error in getOrderNumberByCustomer: ' . $th->getMessage());

        // Rethrow the exception
        throw $th;
    }
}

public function getOrderNumberByCustomerPreparing($customerid) {
    try {
        $orders = array();
        $totalPrices = array();
        $count = 0;

        $stmt = $this->connect()->prepare('SELECT `order_id`, `total_price` FROM `order` WHERE customer_id = ? AND preparing = 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch all order_ids and total_prices directly into arrays
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $orders[] = $row['order_id'];
                $totalPrices[] = $row['total_price'];
            }

            $count = count($orders);
        }

        return array('orders' => $orders, 'total_prices' => $totalPrices, 'count' => $count);

    } catch (\Throwable $th) {
        // Log the error or rethrow the exception for higher-level handling
        error_log('Error in getOrderNumberByCustomer: ' . $th->getMessage());

        // Rethrow the exception
        throw $th;
    }
}
public function getOrderNumberByCustomerDelivery($customerid) {
    try {
        $orders = array();
        $totalPrices = array();
        $count = 0;

        $stmt = $this->connect()->prepare('SELECT `order_id`, `total_price` FROM `order` WHERE customer_id = ? AND preparing != 1 AND delivery = 1 AND completed != 1 AND cancel != 1 AND removed != 1');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch all order_ids and total_prices directly into arrays
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $orders[] = $row['order_id'];
                $totalPrices[] = $row['total_price'];
            }

            $count = count($orders);
        }

        return array('orders' => $orders, 'total_prices' => $totalPrices, 'count' => $count);

    } catch (\Throwable $th) {
        // Log the error or rethrow the exception for higher-level handling
        error_log('Error in getOrderNumberByCustomer: ' . $th->getMessage());

        // Rethrow the exception
        throw $th;
    }
}
public function getOrderNumberByCustomerComplete($customerid) {
    try {
        $orders = array();
        $totalPrices = array();
        $count = 0;

        $stmt = $this->connect()->prepare('SELECT `order_id`, `total_price` FROM `order` WHERE customer_id = ? AND preparing != 1 AND delivery != 1 AND completed = 1 AND cancel != 1 AND removed != 1');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch all order_ids and total_prices directly into arrays
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $orders[] = $row['order_id'];
                $totalPrices[] = $row['total_price'];
            }

            $count = count($orders);
        }

        return array('orders' => $orders, 'total_prices' => $totalPrices, 'count' => $count);

    } catch (\Throwable $th) {
        // Log the error or rethrow the exception for higher-level handling
        error_log('Error in getOrderNumberByCustomer: ' . $th->getMessage());

        // Rethrow the exception
        throw $th;
    }
}

public function getOrderNumberOfCustomer($customerid, $totalprice) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id` FROM `order` WHERE customer_id = ? AND total_price = ? AND preparing != 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1');

        // Bind parameters
        $stmt->bindParam(1, $customerid);
        $stmt->bindParam(2, $totalprice);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the cursor
            $stmt->closeCursor();

            // Return the single value
            return $result['order_id'] ?? null;
        } else {
            return null; // or handle the case when the query fails
        }
    } catch (\Throwable $th) {
        // Handle exceptions, you may want to log the error or redirect to an error page
        header("location: ../index.php?errorsada=" . urlencode($th->getMessage()));
        exit();
    }
}


public function getOrderByCustomerV2($ordersid, $customerid) {
    try {
        $orders = array();
        $stmt = $this->connect()->prepare('SELECT co.`order_id`, co.`customer_id`, co.`product_id`, co.`product_name`, co.`product_price`, co.`sizes_id`, co.`size_name`, co.`subtotal`, co.`price`, co.`quantity`, co.`address`, co.`addons_id`, co.`addons_name`, co.`addons_price`, co.`product_remark`, p.image_url FROM `customer_orders` co INNER JOIN product p ON co.`product_id` = p.`product_id` WHERE co.orders_id = ? AND co.customer_id = ? AND co.accepted != 1 AND co.preparing != 1 AND co.shipping != 1 AND co.delivered != 1 AND co.removed != 1 AND co.cancel != 1');

        // Bind the parameters
        $stmt->bindParam(1, $ordersid, PDO::PARAM_INT);
        $stmt->bindParam(2, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }

        $stmt->closeCursor();
        return $orders;
    } catch (\Throwable $th) {
        // Handle exceptions appropriately, for now redirecting to an error page
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}

public function getOrderByCustomerPrepaing($ordersid, $customerid) {
    try {
        $orders = array();
        $stmt = $this->connect()->prepare('SELECT co.`order_id`, co.`customer_id`, co.`product_id`, co.`product_name`, co.`sizes_id`, co.`size_name`, co.`subtotal`, co.`price`, co.`quantity`, co.`address`, co.`addons_id`, co.`addons_name`, co.`addons_price`, co.`product_remark`, p.image_url FROM `customer_orders` co INNER JOIN product p ON co.`product_id` = p.`product_id` WHERE co.orders_id = ? AND co.customer_id = ? AND co.accepted != 1 AND co.preparing = 1 AND co.shipping != 1 AND co.delivered != 1 AND co.removed != 1 AND co.cancel != 1');

        // Bind the parameters
        $stmt->bindParam(1, $ordersid, PDO::PARAM_INT);
        $stmt->bindParam(2, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }

        $stmt->closeCursor();
        return $orders;
    } catch (\Throwable $th) {
        // Handle exceptions appropriately, for now redirecting to an error page
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}

public function getOrderByCustomerDelivery($ordersid, $customerid) {
    try {
        $orders = array();
        $stmt = $this->connect()->prepare('SELECT co.`order_id`, co.`customer_id`, co.`product_id`, co.`product_name`, co.`sizes_id`, co.`size_name`, co.`subtotal`, co.`price`, co.`quantity`, co.`address`, co.`addons_id`, co.`addons_name`, co.`addons_price`, co.`product_remark`, p.image_url FROM `customer_orders` co INNER JOIN product p ON co.`product_id` = p.`product_id` WHERE co.orders_id = ? AND co.customer_id = ? AND co.accepted != 1 AND co.preparing != 1 AND co.shipping = 1 AND co.delivered != 1 AND co.removed != 1 AND co.cancel != 1');

        // Bind the parameters
        $stmt->bindParam(1, $ordersid, PDO::PARAM_INT);
        $stmt->bindParam(2, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }

        $stmt->closeCursor();
        return $orders;
    } catch (\Throwable $th) {
        // Handle exceptions appropriately, for now redirecting to an error page
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}

public function getOrderByCustomerComplete($ordersid, $customerid) {
    try {
        $orders = array();
        $stmt = $this->connect()->prepare('SELECT co.`order_id`, co.`customer_id`, co.`product_id`, co.`product_name`, co.`sizes_id`, co.`size_name`, co.`subtotal`, co.`price`, co.`quantity`, co.`address`, co.`addons_id`, co.`addons_name`, co.`addons_price`, co.`product_remark`, p.image_url FROM `customer_orders` co INNER JOIN product p ON co.`product_id` = p.`product_id` WHERE co.orders_id = ? AND co.customer_id = ? AND co.accepted != 1 AND co.preparing != 1 AND co.shipping != 1 AND co.delivered = 1 AND co.removed != 1 AND co.cancel != 1');

        // Bind the parameters
        $stmt->bindParam(1, $ordersid, PDO::PARAM_INT);
        $stmt->bindParam(2, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }

        $stmt->closeCursor();
        return $orders;
    } catch (\Throwable $th) {
        // Handle exceptions appropriately, for now redirecting to an error page
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}


public function getOrderByCustomer($customerid) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark` FROM `customer_orders` WHERE customer_id = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 AND removed != 1 AND cancel != 1 ORDER BY order_id ASC');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // Fetch all rows at once into an array
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $orders;
        }

        $stmt->closeCursor();
        return array(); // Return an empty array if no data is found
    } catch (\Throwable $th) {
        // Handle exceptions appropriately, for now redirecting to an error page
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}



    public function getOrders() {
        try {

            $orders = array();
            $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark`FROM `customer_orders` WHERE accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 ORDER BY order_id ASC');

            // Execute the query
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $orders[] = $row;
                }
            }
            
            $stmt->closeCursor();
            return $orders;
        
        } catch (\Throwable $th) {
            //throw $th;
            header("location: ../index.php?error=" . urlencode($th->getMessage()));
            exit();
        }
    
}
public function getOrdersPreparing() {
    try {

        $orders = array();
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `df`, `total_price`, `remark`, `order_date` FROM `order` WHERE preparing = 1 AND delivery != 1 AND completed != 1  AND cancel != 1 ORDER BY order_id ASC');

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }
        
        $stmt->closeCursor();
        return $orders;
    
    } catch (\Throwable $th) {
        //throw $th;
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }

}

public function getOrdersDelivery() {
    try {

        $orders = array();
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `df`, `total_price`, `remark`, `order_date` FROM `order` WHERE delivery = 1 AND preparing != 1 AND completed != 1  AND cancel != 1 ORDER BY order_id ASC');

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }
        
        $stmt->closeCursor();
        return $orders;
    
    } catch (\Throwable $th) {
        //throw $th;
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }

}

public function getOrdersCompleted() {
    try {

        $orders = array();
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `df`, `total_price`, `remark`, `order_date` FROM `order` WHERE completed = 1 AND preparing != 1 AND delivery != 1  AND cancel != 1 AND removed != 1 ORDER BY order_id ASC');

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }
        
        $stmt->closeCursor();
        return $orders;
    
    } catch (\Throwable $th) {
        //throw $th;
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }

}


public function getOrder($orderid, $customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark` FROM `customer_orders` WHERE `orders_id` = ? AND `customer_id` = ? AND isActive = 1  AND `accepted` != 1 AND `preparing` != 1 AND `shipping` != 1 AND `delivered` != 1 AND `removed` != 1 ORDER BY `order_id` DESC');
        
        $stmt->bindValue(1, $orderid);
        $stmt->bindValue(2, $customer_Id);
        $stmt->execute();
        $order_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($order_data)) {
            return $order_data;
        } else {
            return false; // No matching data found
        }
    } catch (PDOException $e) {
        return false; // Error occurred
    }
}


public function getOrderPrearpingFrontEnd($customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing = 1 AND shipping != 1 AND delivered != 1 AND removed != 1 ORDER BY order_id DESC');
        
        $stmt->bindValue(1, $customer_Id);
        $stmt->execute();
        $order_data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll to get all matching rows

        if (!empty($order_data)) {
            return $order_data;
        } else {
            return false; // No matching data found
        }
    } catch (PDOException $e) {
        return false; // Error occurred
    }
}

public function getOrderDeliveryFrontEnd($customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing != 1 AND shipping = 1 AND delivered != 1 AND removed != 1 ORDER BY order_id DESC');
        
        $stmt->bindValue(1, $customer_Id);
        $stmt->execute();
        $order_data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll to get all matching rows

        if (!empty($order_data)) {
            return $order_data;
        } else {
            return false; // No matching data found
        }
    } catch (PDOException $e) {
        return false; // Error occurred
    }
}

public function getOrderCompletedFrontEnd($customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `product_remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND `delivered` = 1 AND removed != 1 ORDER BY order_id DESC');
        
        $stmt->bindValue(1, $customer_Id);
        $stmt->execute();
        $order_data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll to get all matching rows

        if (!empty($order_data)) {
            return $order_data;
        } else {
            return false; // No matching data found
        }
    } catch (PDOException $e) {
        return false; // Error occurred
    }
}
// public function getOrder($customerId) {
//     try {
//         $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE customer_id = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 ORDER BY order_id DESC');

//         // Execute the query
//         if ($stmt->execute([$customerId])) {
//             // Fetch the single row
//             $order = $stmt->fetch(PDO::FETCH_ASSOC);
//             $stmt->closeCursor(); // Close the cursor explicitly

//             return $order; // Return the single row
//         }
//     } catch (\Throwable $th) {
//         // Handle the exception or log an error
//         header("location: ../back-end/AdminOrders.php?error=" . urlencode($th->getMessage()));
//         exit();
//     }

//     return null; // Return null in case of an error or no data found
// }

public function getData($productid, $sizesid, $customerid) {
    try {
        $stmt = $this->connect()->prepare('SELECT p.product_name, p.image_url, ps.size_name, ca.username, ca.customer_address, ca.email FROM `customer_orders` co INNER JOIN `product` p  ON co.product_id = p.product_id INNER JOIN `product_sizes` ps ON co.sizes_id = ps.sizes_id INNER JOIN customer_account ca ON co.customer_id = ca.customer_id WHERE co.product_id = ? AND co.sizes_id = ? AND co.customer_id = ? AND isActive = 1 AND co.accepted != 1 AND co.preparing != 1 AND co.shipping != 1 AND co.delivered != 1 AND co.cancel != 1 AND co.removed != 1');

        // Execute the query
        if ($stmt->execute([$productid, $sizesid, $customerid])) {
            // Fetch the single row
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor(); // Close the cursor explicitly

            return $product; // Return the single row
        }
    } catch (\Throwable $th) {
        // Handle the exception or log an error
        header("location: ../back-end/AdminOrders.php?error=" . urlencode($th->getMessage()));
        exit();
    }

    return null; // Return null in case of an error or no data found
}
public function getAddons($addonsid){
    try {
       
            $stmt = $this->connect()->prepare('SELECT addons_id, addons_name, price FROM addons WHERE addons_id = ?');

            // Execute the query
            if ($stmt->execute([$addonsid])) {
                // Fetch the single row
                $addons = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor(); // Close the cursor explicitly

                return $addons; // Return the row with addons_id and addons_name
            }
        
    } catch (\Throwable $th) {
        // Handle the exception or log an error
        header("location: ../back-end/AdminOrders.php?error=" . urlencode($th->getMessage()));
        exit();
    }

    return null; // Return null in case of an error or no data found
}

public function getPriceBySize($sizeid, $prodid) {
    try {
        if (is_array($sizeid)) {
            $placeholders = str_repeat('?,', count($sizeid) - 1) . '?';
            $query = "SELECT price FROM variation WHERE size_id IN ($placeholders) AND product_id = ? AND isDeleted != 1";
        } else {
            $query = "SELECT price FROM variation WHERE size_id = ? AND product_id = ? AND isDeleted != 1";
        }

        $stmt = $this->connect()->prepare($query);

        // Execute the query
        $params = is_array($sizeid) ? array_merge($sizeid, [$prodid]) : [$sizeid, $prodid];
        if ($stmt->execute($params)) {
            // Fetch the price value directly (since it's a single value)
            $price = $stmt->fetchColumn();

            return $price;
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage(); // Handle the error appropriately
    }
}



public function getCustomerDetails($customerid){
    try {
       
            $stmt = $this->connect()->prepare('SELECT email, username, customer_address FROM customer_account WHERE customer_id = ?');

            // Execute the query
            if ($stmt->execute([$customerid])) {
                // Fetch the single row
                $customer = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor(); // Close the cursor explicitly

                return $customer; // Return the row with addons_id and addons_name
            }
        
    } catch (\Throwable $th) {
        // Handle the exception or log an error
        header("location: ../back-end/AdminOrders.php?error=" . urlencode($th->getMessage()));
        exit();
    }

    return null; // Return null in case of an error or no data found
}


        public function acceptOrder($order_id){
            try {

                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET accepted = 1, preparing = 1  WHERE order_id = ?');

                // Execute the query
                if (!$stmt->execute(array($order_id))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;

            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function AcceptOrderV2($orderid, $customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET preparing = 1 WHERE orders_id = ? AND customer_id = ? AND shipping != 1 AND delivered != 1 AND cancel != 1 AND removed != 1');
        
                // Execute the query
                if (!$stmt->execute(array($orderid, $customerid))) {
                    throw new Exception("Failed to update orders");
                }
        
                // Close the prepared statement
                $stmt = null;
        
            } catch (Exception $e) {
                // Handle the exception and log the error
                error_log("Error in AcceptOrderV2: " . $e->getMessage());
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        

        public function DeliverOrder($orderid, $customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET preparing = 0, shipping = 1 WHERE orders_id = :orderid AND customer_id = :customerid AND preparing = 1 AND delivered != 1 AND cancel != 1 AND shipping != 1');
        
                // Bind the parameters
                $stmt->bindParam(':orderid', $orderid);
                $stmt->bindParam(':customerid', $customerid);
        
                // Execute the query
                if (!$stmt->execute()) {
                    $errorInfo = $stmt->errorInfo();
                    error_log("Database error: " . $errorInfo[2]);
                    throw new Exception("Failed to update orders");
                }
        
                // Close the prepared statement
                $stmt = null;
        
                return true;
            } catch (Exception $e) {
                // Handle the exception and log the error
                error_log("Error in DeliverOrder: " . $e->getMessage());
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        

        public function CompleteOrder($orderid, $customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET shipping = 0, delivered = 1  WHERE orders_id = :orderid AND customer_id = :customerid AND shipping = 1 AND preparing != 1 AND cancel != 1 AND delivered != 1');
        
                // Bind the parameters
                $stmt->bindParam(':orderid', $orderid);
                $stmt->bindParam(':customerid', $customerid);
        
                // Execute the query
                if (!$stmt->execute()) {
                    $errorInfo = $stmt->errorInfo();
                    error_log("Database error: " . $errorInfo[2]);
                    throw new Exception("Failed to update orders");
                }
        
                // Close the prepared statement
                $stmt = null;
        
                return true;
            } catch (Exception $e) {
                // Handle the exception and log the error
                error_log("Error in DeliverOrder: " . $e->getMessage());
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        

        public function RemoveOrder($orderid, $customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET removed = 1, preparing = 0 WHERE orders_id = ? AND customer_id = ? AND preparing = 1 AND delivered != 1 AND shipping != 1 AND cancel != 1 AND removed != 1');
        
                // Execute the query
                if (!$stmt->execute(array($orderid, $customerid))) {
                    $errorInfo = $stmt->errorInfo();
                    error_log("Database error: " . $errorInfo[2]);
                    throw new Exception("Failed to update orders");
                }
        
                // Close the prepared statement
                $stmt = null;
        
                return true;
            } catch (Exception $e) {
                // Handle the exception and log the error
                error_log("Error in RemoveOrder: " . $e->getMessage());
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        

        public function DeleteOrder($orderid, $customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET removed = 1, isActive = 0 WHERE orders_id = ? AND customer_id = ? AND preparing != 1 AND delivered = 1 AND shipping != 1 AND cancel != 1 AND removed != 1');
        
                // Execute the query
                if (!$stmt->execute(array($orderid, $customerid))) {
                    $errorInfo = $stmt->errorInfo();
                    error_log("Database error: " . $errorInfo[2]);
                    throw new Exception("Failed to update orders");
                }
        
                // Close the prepared statement
                $stmt = null;
        
                return true;
            } catch (Exception $e) {
                // Handle the exception and log the error
                error_log("Error in DeleteOrder: " . $e->getMessage());
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        


        public function UpdatePrepareOrder($orderid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `order` SET preparing = 1  WHERE order_id = ? AND delivery != 1 AND completed != 1 AND cancel != 1');

                // Execute the query
                if (!$stmt->execute(array($orderid))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;
                return true;
            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        
        public function UpdateDeliverOrder($orderid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `order` SET delivery = 1, preparing = 0  WHERE order_id = ? AND preparing = 1 AND completed != 1 AND cancel != 1');

                // Execute the query
                if (!$stmt->execute(array($orderid))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;
                return true;
            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function UpdateCompleteOrder($orderid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `order` SET delivery = 0, completed = 1  WHERE order_id = ? AND preparing != 1 AND delivery = 1 AND cancel != 1');

                // Execute the query
                if (!$stmt->execute(array($orderid))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;
                return true;
            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function UpdateRemoveOrder($orderid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `order` SET cancel = 1, preparing = 0 WHERE order_id = ? AND preparing = 1 AND completed != 1 AND delivery != 1');

                // Execute the query
                if (!$stmt->execute(array($orderid))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;
                return true;
            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function UpdateDeleteOrder($orderid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `order` SET removed = 1, isActive = 0 WHERE order_id = ? AND preparing != 1 AND completed = 1 AND delivery != 1 AND cancel != 1 AND removed != 1');

                // Execute the query
                if (!$stmt->execute(array($orderid))) {
                    throw new Exception("Failed to update orders");
                }

                // Close the prepared statement
                $stmt = null;
                return true;
            } catch (Exception $e) {
                //throw $th;
                header("location: ../back-end/AdminOrders.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }


        public function insertToOrderHeader($userID, $totalprice, $remark){
            try {
                $stmt = $this->connect()->prepare('INSERT INTO `order` (`customer_id`, `total_price`, `remark`) VALUES (?,?,?)');
        
                $stmt->bindValue(1, $userID);
                $stmt->bindValue(2, $totalprice);
                $stmt->bindValue(3, $remark);
                if ($stmt->execute()) {
                    return true; // Successfully inserted
                } else {
                    return false; // Failed to insert
                }
            } catch (\Throwable $th) {
                return false; // Failed to insert and caught an exception
            }
        }

        public function insertMultipleOrder($InsertOrder) {
            try {
                $stmt = $this->connect()->prepare('INSERT INTO `customer_orders` (`orders_id`, `customer_id`, `product_id`, `product_name`, `product_price`, `sizes_id`, `size_name`, `subtotal`, `quantity`, `addons_id`, `addons_name`, `addons_price`, `product_remark`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
                if ($stmt) { // Check if the statement was prepared successfully
                    foreach ($InsertOrder as $orderData) {
                        $stmt->bindValue(1, $orderData['orders_id']);
                        $stmt->bindValue(2, $orderData['customer_id']);
                        $stmt->bindValue(3, $orderData['product_id']);
                        $stmt->bindValue(4, $orderData['product_name']);
                        $stmt->bindValue(5, $orderData['product_price']);
                        $stmt->bindValue(6, $orderData['sizes_id']);
                        $stmt->bindValue(7, $orderData['size_name']);
                        $stmt->bindValue(8, $orderData['subtotal']);
                        $stmt->bindValue(9, $orderData['quantity']);
        
                        if ($orderData['addons_id'] === "") {
                            $stmt->bindValue(10, null, PDO::PARAM_NULL);
                        } else {
                            $stmt->bindValue(10, $orderData['addons_id'], PDO::PARAM_INT); // Assuming addons_id is an integer
                        }
        
                        $stmt->bindValue(11, $orderData['addons_name']);
                        $stmt->bindValue(12, $orderData['addons_price']);
                        $stmt->bindValue(13, $orderData['product_remark']);
        
                        if (!$stmt->execute()) {
                            // Print or log the error details
                            $errorInfo = $stmt->errorInfo();
                            error_log("Error executing statement: " . $errorInfo[2]);
                            return false; // Failed to insert
                        }
                    }
                    
                    return true; // Successfully inserted
                } else {
                    return false; // Failed to prepare the statement
                }
            } catch (\Throwable $th) {
                // Print or log the exception details
                error_log("Exception caught: " . $th->getMessage());
                return false; // Failed to insert and caught an exception
            }
        }

        public function CountNewInserts() {
            try {
                date_default_timezone_set('Asia/Manila');
        
                // Get today's date
                $today = date('Y-m-d');
        
                $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND isActive = 1 AND `preparing` != 1 AND `delivery` != 1 AND `completed` != 1 AND `cancel` != 1 AND `removed` != 1');
                
                $stmt->bindParam(':today', $today, PDO::PARAM_STR);
                
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                return $result['new_insert_count'];
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        
        
        public function CountNewInsertsFrontEnd($customerid) {
            try {
                date_default_timezone_set('Asia/Manila');
        
                // Get today's date
                $today = date('Y-m-d');
        
                $stmt = $this->connect()->prepare('SELECT COUNT(*) as new_insert_count FROM `order` WHERE DATE(`order_date`) = :today AND customer_id = :customerid AND isActive = 1 AND `preparing` != 1 AND `delivery` != 1 AND `completed` != 1 AND `cancel` != 1 AND `removed` != 1');
        
                $stmt->bindParam(':today', $today, PDO::PARAM_STR);
                $stmt->bindParam(':customerid', $customerid, PDO::PARAM_INT);
        
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                return $result['new_insert_count'];
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        


}