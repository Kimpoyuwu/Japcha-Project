<?php

include '../classes/dbh.classes.php';

class adminctrl extends Dbh{
    public function deleteAdmin() {
        if (isset($_GET['deleteidadmin'])){
            $id = $_GET['deleteidadmin'];

            $stmt = $this->connect()->prepare('DELETE FROM admin_account WHERE admin_id = ?');

            if (!$stmt->execute(array($id))) {
                $stmt = null;
                header("location: ../adminProducts.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }
        
    }
}

// Create an object of the class and call the method
$controller = new adminctrl();
$controller->deleteAdmin();
header("location: ../adminAccount.php?error=deletedsuccessfully");

