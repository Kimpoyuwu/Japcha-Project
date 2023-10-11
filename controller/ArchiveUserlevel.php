<?php

include '../classes/dbh.classes.php';

class userlvlController extends Dbh {
    public function deleteUl() {
        if (isset($_GET['archiveul'])) {
            $id = $_GET['archiveul'];

            if ($id == 1) {
                // Set a session message indicating that user level with userlevel_id 1 cannot be deleted
                session_start();
                $_SESSION["cantarchive"] = "This userlevel cannot be archive.";
                header("location: ../back-end/userLevel.php");
                exit();
            }

            // Modify the SQL query to perform a soft delete by updating the isDeleted column
            $stmt = $this->connect()->prepare('UPDATE user_level SET archive = 1 WHERE userlevel_id = ?');

            if (!$stmt) {
                // Handle SQL query preparation error
                header("location: ../back-end/userLevel.php?error=stmtpreparefailed");
                exit();
            }

            if (!$stmt->execute(array($id))) {
                // Handle SQL query execution error
                $stmt = null;
                header("location: ../back-end/userLevel.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }
    }
}

// Create an object of the class and call the method
$controller = new userlvlController();
$controller->deleteUl();

session_start();

if (isset($_GET["error"])) {
    if ($_GET["error"] === "stmtpreparefailed") {
        $_SESSION["ErrorMessage"] = "Statement preparation failed.";
    } elseif ($_GET["error"] === "stmtfailed") {
        $_SESSION["ErrorMessage"] = "Statement execution failed.";
    }
}

$_SESSION["archiveSucess"] = "Archive Successfully";

header("location: ../back-end/userLevel.php");
exit();
