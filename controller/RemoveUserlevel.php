<?php

session_start();

include '../classes/dbh.classes.php';

class userlvlController extends Dbh {
    public function deleteUl() {
        if (isset($_GET['deleteidul'])) {
            $id = (int)$_GET['deleteidul'];
    
            if ($id == 1) {
                $_SESSION["ErrorMessage"] = "This userlevel cannot be deleted.";
            } else {
                try {
                    // Check if the userlevel_id is in the admin_account table
                    $checkStmt = $this->connect()->prepare('SELECT COUNT(*) FROM admin_account WHERE userlevel_id = ?');
                    $checkStmt->execute(array($id));
    
                    if ($checkStmt->fetchColumn() > 0) {
                        // Userlevel is in use, display the appropriate message
                        $_SESSION["ErrorMessage"] = "Unable to delete userlevel is currently active.";
                    } else {
                        // Userlevel is not in use, perform the soft delete
                        $updateStmt = $this->connect()->prepare('UPDATE user_level SET isDeleted = 1 WHERE userlevel_id = ?');
                        if ($updateStmt->execute(array($id))) {
                            $_SESSION["DeletedSuccess"] = "Deleted Successfully";
                        } else {
                            throw new Exception("Statement execution failed");
                        }
                    }
                } catch (Exception $e) {
                    $_SESSION["ErrorMessage"] = "Error: " . $e->getMessage();
                }
            }
        }
    
        header("location: ../back-end/userLevel.php");
        exit();
    }
    
    
}

// Create an object of the class and call the method
$controller = new userlvlController();
$controller->deleteUl();
