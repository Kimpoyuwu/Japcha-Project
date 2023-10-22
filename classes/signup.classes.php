<?php

class Signup extends Dbh {

    protected function setUser($username, $pwd, $pwdConfirm, $email, $address, $contactNum) {
            try {

                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                $stmt = $this->connect()->prepare('INSERT INTO customer_account (username,  password,  confirm_password, email,  customer_address,  contact_number) VALUES (?, ?, ?, ?, ?, ?)');

                // Execute the query
                if (!$stmt->execute(array($username, $hashedPwd, $pwdConfirm, $email, $address, $contactNum))) {
                    throw new Exception("User registration failed.");
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

    protected function checkUser($email) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT username FROM customer_account WHERE username = ? OR email = ?');
            
            // Execute the query
            if (!$stmt->execute(array($username, $email))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../index.php?error=Account does not exist");
                exit();

            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../index.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }


    // ADMIN
    
    protected function setAdmin($username, $email, $pwd, $userLevel, $contactNum) {
        try {

            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            $stmt = $this->connect()->prepare('INSERT INTO admin_account (username, email, password,   userLevel_id,  contact) VALUES (?, ?, ?, ?, ?)');

            // Execute the query
            if (!$stmt->execute(array($username, $email, $hashedPwd, $userLevel, $contactNum))) {
                throw new Exception("User registration failed.");
                header("location: ../back-end/adminAccount.php?error=userregistrationfailed");
                exit();
            }

            $stmt = null;

        } catch (Throwable $th) {
            //throw $th;
            header("location: ../back-end/adminAccount.php?error=shettwhathappened");
            exit();
        }
    
}

    protected function checkAdmin($username, $email) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT username FROM admin_account WHERE username = ? OR email = ?');
            
            // Execute the query
            if (!$stmt->execute(array($username, $email))) {
                // throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../adminAccount.php?error=Account does not exist");
                exit();
            }
            
            $resultCheck = ($stmt->rowCount() > 0) ? false : true;
            return $resultCheck;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../back-end/adminAccount.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    protected function getCustomerId($username){
        $stmt = $this->connect()->prepare('SELECT customer_id FROM customer_account WHERE username = ?;');

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../myProfile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../myProfile.php?error=profilenotfoundas");
            exit();
        }

        $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $profileData;

    }

    public function getAdminData(){
        $stmt = $this->connect()->prepare('SELECT ac.admin_id, ac.username, ac.email, ac.contact, usl.user_level_name FROM admin_account ac INNER JOIN user_level usl ON ac.userlevel_id = usl.userlevel_id WHERE ac.isDeleted != 1 ORDER BY ac.admin_id;');
    
            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../back-end/adminAccount.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../back-end/adminAccount.php?error=nocmsfound");
                exit();
            }
    
            $productData = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $productData;
    }
    
    public function getCustomerData() {
        $limit = 8; // Number of rows to fetch per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the URL parameter
        // Calculate the offset to determine which rows to fetch from the database
        $offset = ($page - 1) * $limit;
        
        try {
            // Calculate the total number of rows
            $countStmt = $this->connect()->query('SELECT COUNT(*) FROM customer_account');
            $total_rows = $countStmt->fetchColumn();
    
            $stmt = $this->connect()->prepare('SELECT customer_id, username, password, email, customer_address, contact_number FROM customer_account LIMIT :limit OFFSET :offset');
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            
            if (!$stmt->execute()) {
                // Handle database error here
                header("location: ../back-end/adminProducts.php?error=stmtfailed");
                exit();
            }
            
            if ($stmt->rowCount() == 0) {
                // Handle no records found here
                header("location: ../back-end/adminProducts.php?error=nocmsfound");
                exit();
            }
            
            $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Return data along with pagination variables
            return [
                'data' => $productData,
                'page' => $page,
                'total_rows' => $total_rows,
                'limit' => $limit,
            ];
        } catch (PDOException $e) {
            // Handle database exception here
            header("location: ../back-end/adminProducts.php?error=databaseerror");
            exit();
        }
    }
    
    
    
    


    // protected function setUser($username, $pwd, $pwdConfirm, $email, $address, $contactNum) {
    //     $stmt = $this->connect()->prepare('INSERT INTO customer_account (username,  password,  confirm_password, email,  customer_address,  contact_number) VALUES (?, ?, ?, ?, ?, ?)');
        
    //     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    //     if (!$stmt-> execute(array($username, $hashedPwd, $pwdConfirm, $email, $address, $contactNum))) {
    //         $stmt = null;
    //         header("location: ../index.php?error=stmtfailed");
    //         exit();
    //     }
        
    //    $stmt = null;
    // }



    // protected function checkUser($username, $email) {
    //     $stmt = $this->connect()->prepare('SELECT username FROM customer_account where username = ? OR email = ?;');
        
    //     if (!$stmt-> execute(array($username, $email))) {
    //         $stmt = null;
    //         header("location: ../index.php?error=stmtfailed");
    //         exit();
    //     }
        
    //     $resultCheck;
    //     if($stmt->rowCount() > 0) {
    //         $resultCheck = false;
    //     }
    //     else {
    //         $resultCheck = true;
    //     }
    //     return $resultCheck;
    // }

}