<?php

class Order extends Dbh {

    public function setOrder($customerid, $prodid, $sizesid, $subtotal, $totalprice, $quantity, $addson_id, $remark) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO customer_orders (customer_id, product_id, sizes_id, subtotal, price, quantity, addons_id, remark ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

                // Execute the query
                if (!$stmt->execute(array($customerid, $prodid, $sizesid, $subtotal, $totalprice, $quantity, $addson_id, $remark))) {
                    throw new Exception("order failed.");
                    header("location: ../index.php?error=userregistrationfailed");
                    exit();
                    return false;
                }
                

                // $stmt = null;
                return true;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../index.php?error=" . urlencode($th->getMessage()));
                exit();
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
        $count = 0;

        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `df`, `total_price`, `remark` FROM `order` WHERE customer_id = ? AND preparing != 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1 ORDER BY order_id ASC');

        // Bind the parameter
        $stmt->bindParam(1, $customerid, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
                $count++;
            }
        }

        $stmt->closeCursor();
        return array('orders' => $orders, 'count' => $count);

    } catch (\Throwable $th) {
        // Handle the exception (e.g., redirect or log the error)
        header("location: ../index.php?error=" . urlencode($th->getMessage()));
        exit();
    }
}

public function getOrderNumberOfCustomer($customerid, $totalprice){
    try {

        $orders = array();
        $stmt = $this->connect()->prepare('SELECT `order_id` FROM `order` WHERE customer_id = ? AND total_price = ? AND preparing != 1 AND delivery != 1 AND completed != 1 AND cancel != 1 AND removed != 1 ORDER BY order_id ASC');

        // Execute the query
        if ($stmt->execute([$customerid, $totalprice])) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
        }
        $stmt->closeCursor();
        return $orders;
    
    } catch (\Throwable $th) {
        //throw $th;
        header("location: ../index.php?errorsada=" . urlencode($th->getMessage()));
        exit();
    }

}


public function getOrderByCustomer($customerid) {
    try {
        $orders = array();
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE customer_id = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 AND removed != 1 AND cancel != 1 ORDER BY order_id ASC');

        // Execute the query with parameters
        if ($stmt->execute([$customerid])) {
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


    public function getOrders() {
        try {

            $orders = array();
            $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark`FROM `customer_orders` WHERE accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 ORDER BY order_id ASC');

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


public function getOrder($customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 AND removed != 1 ORDER BY order_id DESC');
        
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

public function getOrderPrearpingFrontEnd($customer_Id) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing = 1 AND shipping != 1 AND delivered != 1 AND removed != 1 ORDER BY order_id DESC');
        
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
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing != 1 AND shipping = 1 AND delivered != 1 AND removed != 1 ORDER BY order_id DESC');
        
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
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE `customer_id` = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND `delivered` = 1 AND removed != 1 ORDER BY order_id DESC');
        
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
        $stmt = $this->connect()->prepare('SELECT p.product_name, p.image_url, ps.size_name, ca.username, ca.customer_address, ca.email FROM `customer_orders` co INNER JOIN `product` p  ON co.product_id = p.product_id INNER JOIN `product_sizes` ps ON co.sizes_id = ps.sizes_id INNER JOIN customer_account ca ON co.customer_id = ca.customer_id WHERE co.product_id = ? AND co.sizes_id = ? AND co.customer_id = ? AND co.accepted != 1 AND co.preparing != 1 AND co.shipping != 1 AND co.delivered != 1 AND co.cancel != 1 AND co.removed != 1');

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

        public function AcceptOrderV2($customerid){
            try {

                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET preparing = 1  WHERE customer_id = ? AND shipping != 1 AND delivered != 1 AND  cancel != 1 AND removed != 1');

                // Execute the query
                if (!$stmt->execute(array($customerid))) {
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

        public function DeliverOrder($customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET shipping = 1, preparing = 0 WHERE customer_id = ? AND preparing = 1 AND delivered != 1 AND cancel != 1');
        
                // Execute the query
                if (!$stmt->execute(array($customerid))) {
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

        public function CompleteOrder($customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET delivered = 1, shipping = 0 WHERE customer_id = ? AND shipping = 1 AND preparing != 1 AND shipping != 1');
        
                // Execute the query
                if (!$stmt->execute(array($customerid))) {
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

        public function RemoveOrder($customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET cancel = 1, preparing = 0 WHERE customer_id = ? AND preparing = 1 AND delivered != 1 AND shipping != 1');
        
                // Execute the query
                if (!$stmt->execute(array($customerid))) {
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

        public function DeleteOrder($customerid) {
            try {
                $stmt = $this->connect()->prepare('UPDATE `customer_orders` SET removed = 1, delivered = 0 WHERE customer_id = ? AND preparing != 1 AND delivered = 1 AND shipping != 1 AND cancel != 1');
        
                // Execute the query
                if (!$stmt->execute(array($customerid))) {
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

                $stmt = $this->connect()->prepare('UPDATE `order` SET removed = 1, completed = 0 WHERE order_id = ? AND preparing != 1 AND completed = 1 AND delivery != 1 AND cancel != 1');

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
                $stmt = $this->connect()->prepare('INSERT INTO `customer_orders` (`customer_id`, `product_id`, `sizes_id`, `subtotal`, `quantity`, `addons_id`) VALUES (?,?,?,?,?,?)');
        
                if ($stmt) { // Check if the statement was prepared successfully
                    foreach ($InsertOrder as $orderData) {
                        $stmt->bindValue(1, $orderData['customer_id']);
                        $stmt->bindValue(2, $orderData['product_id']);
                        $stmt->bindValue(3, $orderData['sizes_id']);
                        $stmt->bindValue(4, $orderData['subtotal']); 
                        $stmt->bindValue(5, $orderData['quantity']);
                        
                        if ($orderData['addons_id'] === "") {
                            $stmt->bindValue(6, null, PDO::PARAM_NULL);
                        } else {
                            $stmt->bindValue(6, $orderData['addons_id'], PDO::PARAM_INT); // Assuming addons_id is an integer
                        }
            
                        // $stmt->bindValue(6, $orderData['addons_id'], PDO::PARAM_NULL);// Use PDO::PARAM_NULL for null values
                        
                        if (!$stmt->execute()) {
                            return false; // Failed to insert
                        }
                    }
        
                    return true; // Successfully inserted
                } else {
                    return false; // Failed to prepare the statement
                }
            } catch (\Throwable $th) {
                return false; // Failed to insert and caught an exception
            }
        }
        


}