<?php

class UserLevel extends Dbh {

    public function setUserLevel($name,$dashboard_view, $dashboard_edit,$appointmentManagement_view,  $appointmentManagement_create, $appointmentManagement_edit, $appointmentManagement_delete,$accountManagement_view,  $accountManagement_create, $accountManagement_edit, $accountManagement_delete,$accountManagement_archive,  $accountManagement_ban, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO user_level (user_level,  dashboard_view, dashboard_edit, appointmentManagement_view ,  appointmentManagement_create ,  appointmentManagement_edit,  appointmentManagement_delete , accountManagement_view , accountManagement_create  ,  accountManagement_edit  ,  accountManagement_delete,  accountManagement_archive , accountManagement_ban , contentManagement_view  ,  contentManagement_create  ,  contentManagement_edit ,  contentManagement_delete, fileManagement_view, fileManagement_create ,  fileManagement_edit ,  fileManagement_delete ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

                // Execute the query
                if (!$stmt->execute(array($name,$dashboard_view, $dashboard_edit,$appointmentManagement_view,  $appointmentManagement_create, $appointmentManagement_edit, $appointmentManagement_delete,$accountManagement_view,  $accountManagement_create, $accountManagement_edit, $accountManagement_delete,$accountManagement_archive,  $accountManagement_ban, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete))) {
                    throw new Exception("User registration failed.");
                    header("location: ../back-end/userLevel.php?error=userregistrationfailed");
                   
                }

        $stmt = null;

            } catch (\Throwable $th) {
                //throw $th;
                header("location: ../back-end/userLevel.php?error=" . urlencode($th->getMessage()));
                exit();
            }
        
    }

    public function getUserlevel(){
        $stmt = $this->connect()->prepare('SELECT * FROM user_level ORDER BY userLevel_id ASC;');

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../back-end/userLevel.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            // header("location: ../back-end/userLevel.php?error=userlevelnotfound");
            exit();
        }

        $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $profileData;

    }

}