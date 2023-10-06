<?php

class Login extends Dbh {
    
    public function getUser($email, $pwd) {
        try {
            // Prepare SQL query using named placeholders
            $stmt = $this->connect()->prepare('SELECT * FROM customer_account WHERE email = :email');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
            // Execute the query
            if (!$stmt->execute()) {
                // throw new Exception("Statement execution failed.");
                header("location: ../index.php?error=somethingwentwrong");
                exit();
            }
    
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Check if a user with the provided email/username exists
            if ($userData === false) {
                // throw new Exception("usernotfound.");
                return false;
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
            $_SESSION["username"] = $userData["username"];
            $_SESSION["contact"]  = $userData["contact_number"];
            $_SESSION["address"]  = $userData["customer_address"];
            
    
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
    public function adminLogin($email, $pwd) {
        try {
            // Prepare SQL query using named placeholders
            $stmt = $this->connect()->prepare('SELECT ac.admin_id, ac.email, ac.username, ac.contact, ac.password, ac.userlevel_id,  usl.userLevel_id, usl.dashboard_view, usl.user_level, usl.appointmentManagement_view, usl.appointmentManagement_delete, usl.contentManagement_view, usl.fileManagement_view, usl.fileManagement_create, usl.fileManagement_edit, usl.fileManagement_delete FROM admin_account ac INNER JOIN user_level usl ON ac.userlevel_id = usl.userlevel_id WHERE username = :username');
            $stmt->bindParam(':username', $email, PDO::PARAM_STR);
    
            // Execute the query
            if (!$stmt->execute()) {
                // throw new Exception("Statement execution failed.");
                header("location: ../index.php?error=somethingwentwrong");
                exit();
            }
    
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Check if a user with the provided email/username exists
            if ($userData === false) {
                // throw new Exception("usernotfound.");
                return false;
            }
    
            // Verify the password
            $isPasswordValid = password_verify($pwd, $userData['password']);
            
            if (!$isPasswordValid) {
                throw new Exception("Wrong password.");
            }
    
            // Set session variables
            session_start();
            $_SESSION["adminID"] = $userData["admin_id"];
            $_SESSION["email"] = $userData["email"];
            $_SESSION["username"] = $userData["username"];
            $_SESSION["contact"]  = $userData["contact"];
            $_SESSION["userlevel"]  = $userData["userLevel_id"];
            $_SESSION["userlvlname"]  = $userData["user_level"];

            $_SESSION["dashboardview"]  = $userData["dashboard_view"];
            $_SESSION["appointmentManagement_view"] = $userData["appointmentManagement_view"];
            $_SESSION["appointmentManagement_delete"] = $userData["appointmentManagement_delete"];
            $_SESSION["contentManagement_view"] = $userData["contentManagement_view"];

            // File management 
            $_SESSION["fileManagement_view"] = $userData["fileManagement_view"];
            $_SESSION["fileManagement_create"] = $userData["fileManagement_create"];
            $_SESSION["fileManagement_edit"] = $userData["fileManagement_edit"];
            $_SESSION["fileManagement_delete"] = $userData["fileManagement_delete"];
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