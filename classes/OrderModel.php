<?php

class Order extends Dbh {

    public function setOrder($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $_id, $remark) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO customer_orders (customer_id, product_id, sizes_id, subtotal, price, quantity, addons_id, remark ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

                // Execute the query
                if (!$stmt->execute(array($customerid, $prodid, $sizesid, $subtotal, $price, $quantity, $_id, $remark))) {
                    throw new Exception("order failed.");
                    header("location: ../index.php?error=userregistrationfailed");
                    exit();
                }
                

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
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
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark`FROM `customer_orders` WHERE accepted = 1 AND shipping != 1 AND delivered != 1 ORDER BY order_id ASC');

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


public function getOrder($orderID) {
    try {
        $stmt = $this->connect()->prepare('SELECT `order_id`, `customer_id`, `product_id`, `sizes_id`, `subtotal`, `price`, `quantity`, `address`, `addons_id`, `remark` FROM `customer_orders` WHERE order_id = ? AND accepted != 1 AND preparing != 1 AND shipping != 1 AND delivered != 1 ORDER BY order_id DESC');

        // Execute the query
        if ($stmt->execute([$orderID])) {
            // Fetch the single row
            $order = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor(); // Close the cursor explicitly

            return $order; // Return the single row
        }
    } catch (\Throwable $th) {
        // Handle the exception or log an error
        header("location: ../back-end/AdminOrders.php?error=" . urlencode($th->getMessage()));
        exit();
    }

    return null; // Return null in case of an error or no data found
}

public function getData($productid, $sizesid, $customerid) {
    try {
        $stmt = $this->connect()->prepare('SELECT p.product_name, p.image_url, ps.size_name, ca.username, ca.customer_address, ca.email FROM `customer_orders` co INNER JOIN `product` p  ON co.product_id = p.product_id INNER JOIN `product_sizes` ps ON co.sizes_id = ps.sizes_id INNER JOIN customer_account ca ON co.customer_id = ca.customer_id WHERE co.product_id = ? AND co.sizes_id = ? AND co.customer_id = ?');

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
       
            $stmt = $this->connect()->prepare('SELECT addons_id, addons_name FROM addons WHERE addons_id = ?');

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


}