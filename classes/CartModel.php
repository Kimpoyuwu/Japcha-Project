<?php

class CartModel extends Dbh {

    public function insertToCart($customer_id, $product_id, $size_id, $addons_id, $quantity, $subtotal) {
        try {
            $stmt = $this->connect()->prepare('INSERT INTO `cart`(`customer_id`, `product_id`, `size_id`, `addons_id`, `quantity`, `subtotal`) VALUES (?,?,?,?,?,?)');
    
            $stmt->bindValue(1, $customer_id);
            $stmt->bindValue(2, $product_id);
            $stmt->bindValue(3, $size_id);
            $stmt->bindValue(4, $addons_id, PDO::PARAM_NULL); // Use PDO::PARAM_NULL for null values
            $stmt->bindValue(5, $quantity);
            $stmt->bindValue(6, $subtotal);
    
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
    
            $stmt->bindValue(1, $customer_id);
            $stmt->bindValue(2, $product_id);
            $stmt->bindValue(3, $size_id);
            $stmt->bindValue(4, $addons_id, PDO::PARAM_NULL); // Use PDO::PARAM_NULL for null values
            $stmt->bindValue(5, $quantity);
            $stmt->bindValue(6, $subtotal);
    
            if ($stmt->execute()) {
                return true; // Successfully inserted
            } else {
                return false; // Failed to insert
            }
        } catch (\Throwable $th) {
            return false; // Failed to insert and caught an exception
        }
    }
    
    

    public function fetchCart($customer_id) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT `cart_id`, `customer_id`, `product_id`, `size_id`, `addons_id`, `quantity`, `subtotal` FROM `cart` WHERE customer_id = ? AND isCheckout != 1 AND isRemove != 1');
            
            // Execute the query with an array containing $customer_id
            if ($stmt->execute([$customer_id])) {
                $cartItems = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $cartItems[] = $row;
                }
                
                return $cartItems;
            } else {
                return false; // Failed to execute the query
            }
        } catch (\Throwable $th) {
            // Log the error to a file for debugging
            error_log($th->getMessage());
            
            // Redirect to an error page
            header("location: ../index.php?error=" . urlencode($th->getMessage()));
            exit();
        }
    }

    public function fetchCartDetails($product_id, $sizeid, $addonsid){
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT p.product_name, p.image_url, ps.size_name, ads.addons_name FROM cart c INNER JOIN product p ON c.product_id = p.product_id INNER JOIN product_sizes ps ON c.size_id = ps.sizes_id LEFT JOIN addons ads ON c.addons_id = ads.addons_id WHERE c.product_id = ? AND c.size_id = ? AND (c.addons_id = ? OR c.addons_id IS NULL)  AND c.isCheckout != 1 AND c.isRemove != 1');
            
            // Execute the query with an array containing $customer_id and $product_id
            if ($stmt->execute([$product_id, $sizeid, $addonsid])) {
                $cartItems = $stmt->fetch(PDO::FETCH_ASSOC);
                return $cartItems;
            } else {
                return false; // Failed to execute the query
            }
        } catch (\Throwable $th) {
            // Log the error to a file for debugging
            error_log($th->getMessage());
            
            // Redirect to an error page
            header("location: ../index.php?error=" . urlencode($th->getMessage()));
            exit();
        }
    }

    public function fetchPrice($sizeid, $product_id){
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT price FROM variation WHERE size_id = ? AND product_id = ?');
            
            // Execute the query with an array containing $customer_id and $product_id
            if ($stmt->execute([$sizeid, $product_id])) {
                $cartItems = $stmt->fetch(PDO::FETCH_ASSOC);
                return $cartItems;
            } else {
                return false; // Failed to execute the query
            }
        } catch (\Throwable $th) {
            // Log the error to a file for debugging
            error_log($th->getMessage());
            
            // Redirect to an error page
            header("location: ../index.php?error=" . urlencode($th->getMessage()));
            exit();
        }
    }
    

    public function RemoveFromCart($cartId, $customerId, $productId){
        try {

            $stmt = $this->connect()->prepare('UPDATE cart SET isRemove = 1 WHERE cart_id = ? And customer_id = ? AND product_id = ?');
    
            // Execute the query
            if (!$stmt->execute(array($cartId, $customerId, $productId))) {
                return false;
            }
                return true;
    
            // Close the prepared statement
            $stmt = null;

        } catch (Exception $e) {
            //throw $th;
            header("location: ../index.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
    
}

