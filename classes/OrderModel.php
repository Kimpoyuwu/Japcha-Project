<?php

class Order extends Dbh {

    protected function setOrder($customerid, $prodid, $sizesid, $price, $quantity, $address, $remark, $status) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO customer_orders (customer_id, product_id, sizes_id, price, quantity, address, remark,  status) VALUES (?, ?, ?, ?, ?, ?, ? , ?)');

                // Execute the query
                if (!$stmt->execute(array($customerid, $prodid, $sizesid, $price, $quantity, $address, $remark, $status))) {
                    throw new Exception("order failed.");
                    header("location: ../index.php?error=userregistrationfailed");
                    exit();
                }
                

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../index.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        
    }

}