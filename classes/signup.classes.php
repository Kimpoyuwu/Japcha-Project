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

            $stmt = $this->connect()->prepare('INSERT INTO admin_account (username, email, password,   user_level,  contact) VALUES (?, ?, ?, ?, ?)');

            // Execute the query
            if (!$stmt->execute(array($username, $email, $hashedPwd, $userLevel, $contactNum))) {
                throw new Exception("User registration failed.");
                header("location: ../back-end/adminAccount.php?error=userregistrationfailed");
               
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