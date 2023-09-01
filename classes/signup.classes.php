<?php

class Signup extends Dbh {

    protected function setUser($username, $pwd, $pwdConfirm, $email, $address, $contactNum) {
            try {

                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                $stmt = $this->connect()->prepare('INSERT INTO customer_account (username,  password,  confirm_password, email,  customer_address,  contact_number) VALUES (?, ?, ?, ?, ?, ?)');

                // Execute the query
                if (!$stmt->execute(array($username, $hashedPwd, $pwdConfirm, $email, $address, $contactNum))) {
                    throw new Exception("User registration failed.");
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../index.php?error=" . urlencode($e->getMessage()));
                 exit();
            }
        
    }

    protected function checkUser($username, $email) {
        try {
            // Prepare the SQL query
            $stmt = $this->connect()->prepare('SELECT username FROM customer_account WHERE username = ? OR email = ?');
            
            // Execute the query
            if (!$stmt->execute(array($username, $email))) {
                throw new Exception("User existence check failed.");
                $stmt = null;
                header("location: ../index.php?error=somethingwentwrong");
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