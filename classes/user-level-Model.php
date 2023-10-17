<?php

class UserLevel extends Dbh {

    public function setUserLevel($name, $dashboard_view, $dashboard_edit,$orderManagement_view ,  $orderManagement_create, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete, $fileManagement_archive, $statisticsManagement_view, $statisticsManagement_create, $chatManagement_view, $chatManagement_create,   $marketingManagement_view,  $marketingManagement_create,  $marketingManagement_edit, $marketingManagement_delete,  $marketingManagement_archive ) {
            try {

                $stmt = $this->connect()->prepare('INSERT INTO user_level (user_level_name,  dashboard_view, dashboard_edit, orderManagement_view, orderManagement_create, contentManagement_view  ,  contentManagement_create  ,  contentManagement_edit ,  contentManagement_delete, fileManagement_view, fileManagement_create ,  fileManagement_edit ,  fileManagement_delete, fileManagement_archive, statisticsManagement_view, statisticsManagement_create, chatManagement_view, chatManagement_create,  marketingManagement_view,  marketingManagement_create,  marketingManagement_edit, marketingManagement_delete,  marketingManagement_archive) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)');

                // Execute the query
                if (!$stmt->execute(array($name, $dashboard_view, $dashboard_edit,$orderManagement_view ,  $orderManagement_create, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete, $fileManagement_archive, $statisticsManagement_view, $statisticsManagement_create, $chatManagement_view, $chatManagement_create,   $marketingManagement_view,  $marketingManagement_create,  $marketingManagement_edit, $marketingManagement_delete,  $marketingManagement_archive ))) {
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
        $stmt = $this->connect()->prepare('SELECT * FROM user_level WHERE isDeleted != 1 AND archive != 1 ORDER BY userlevel_id ASC LIMIT 7;');

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