<?php

    class ProductModel extends Dbh{

        public function getAllProducts(){
            try {
                $products = array();
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('SELECT p.*, c.* FROM product p INNER JOIN categories c ON p.category_id = c.category_id ORDER BY product_id DESC');
                
                // Execute the query
                if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $products[] = $row;
                    }
                }
                return $products;

            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/adminProducts.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        public function getSizeVariation($product_id){
            try {
                $products = array();
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('SELECT v.*, ps.* FROM variation v INNER JOIN product_sizes ps ON v.size_id = ps.sizes_id WHERE v.product_id = ?');
        
                // Execute the query
                if ($stmt->execute([$product_id])) { // Pass the product_id as an array
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $products[] = $row;
                    }
                }
                return $products;
        
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/adminProducts.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        
        public function getProductsByCategory($category){
            try {
                $products = array();
                // Prepare the SQL query
                $stmt = $this->connect()->prepare("SELECT * FROM product WHERE category_id = ? ORDER BY product_id DESC");
        
                // Execute the query with the category ID wrapped in an array
                if ($stmt->execute([$category])) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $products[] = $row;
                    }
                }
                return $products;
        
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/adminProducts.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        
        public function getProductName(){
            $stmt = $this->connect()->prepare('SELECT product_id, product_name FROM product;');
    
            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../back-end/adminProducts.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../back-end/adminProducts.php?error=nocmsfound");
                exit();
            }
    
            $productData = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $productData;
        }

        protected function setComboProduct($comboName, $ComboDescription, $product1, $product2, $category){
            try {

                $stmt = $this->connect()->prepare('INSERT INTO combo_product (combo_name, combo_description, product_one_id, product_two_id, category_id) VALUES (?,?,?,?,?)');

                // Execute the query
                if (!$stmt->execute(array($comboName, $ComboDescription, $product1, $product2, $category))) {
                    throw new Exception("Failed to Add Category");
                    header("location: ../back-end/adminProducts.php?error=addingcategoryfailed");
                   
                }

                $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/adminProducts.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
    }