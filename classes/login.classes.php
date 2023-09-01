<?php

class Login extends Dbh {
    
    protected function getUser($email, $pwd) {
        try {
            // Prepare SQL query using named placeholders
            $stmt = $this->connect()->prepare('SELECT customer_id, email, password FROM customer_account WHERE username = :username OR email = :email');
            $stmt->bindParam(':username', $email, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
            // Execute the query
            if (!$stmt->execute()) {
                throw new Exception("Statement execution failed.");
            }
    
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Check if a user with the provided email/username exists
            if ($userData === false) {
                throw new Exception("User not found.");
                header("location: ../index.php?error=usernotfoundsssss");
                exit();
            }
    
            // Verify the password
            $isPasswordValid = password_verify($pwd, $userData['password']);
            
            if (!$isPasswordValid) {
                throw new Exception("Wrong password.");
            }
    
            // Set session variables
            session_start();
            $_SESSION["userid"] = $userData["customer_id"];
            $_SESSION["email"] = $userData["email"];
    
            // Redirect to a success page or return user data as needed
            return $userData;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            header("location: ../index.php?error=" . urlencode($e->getMessage()));
            exit();
        } finally {
            // Clean up resources
            $stmt = null;
        }
    }
    // protected function getUser($email, $pwd) {
    //     $stmt = $this->connect()->prepare('SELECT password FROM customer_account WHERE username = ? or email = ?;');

    //     if (!$stmt-> execute(array($email, $pwd))) {
    //         $stmt = null;
    //         header("location: ../index.php?error=stmtfailed");
    //         exit();
    //     }

        
    //     $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     if(count($loginData ) == 0) {
    //         $stmt = null;
    //         header("location: ../index.php?error=usernotfoundsssss");
    //         exit();
    //     }
    //     return $loginData;

    //     $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOc);
    //     $checkPwd = password_verify($pwd, $pwdHashed[0]["password"]);

    //     if($checkPwd == false) {
    //         $stmt = null;
    //         header("location: ../index.php?error=wrongpassword");
    //         exit();
    //     }
    //     else if($checkPwd == true) {
    //         $stmt = $this->connect()->prepare('SELECT * FROM customer_account WHERE customer_id = ? OR email = ? AND password = ?;');

    //         if (!$stmt-> execute(array($email, $pwdHashed[0]['password']))) {
    //             $stmt = null;
    //             header("location: ../index.php?error=stmtfailed");
    //             exit();
    //         }

    //         $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         if(count($loginData ) == 0) {
    //             $stmt = null;
    //             header("location: ../index.php?error=usernotfound");
    //             exit();
    //         }
    //         return $loginData;

    //         // $user = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    //         session_start();
    //         $_SESSION["userid"] = $loginData[0]["customer_id"];
    //         $_SESSION["email"] = $loginData[0]["email"];

    //         var_dump($_SESSION["userid"]);

    //     }

    //     $stmt = null;
    // }


}