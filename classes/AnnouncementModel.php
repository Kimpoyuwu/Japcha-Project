<?php
    class AnnouncementModel extends Dbh{

        public function getAllAnnouncement(){

            try{
                $announcements = array();

                $stmt= $this->connect()->prepare('SELECT * FROM announcements ORDER BY id DESC');

                if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $announcements[] = $row;
                    }
                }

                return $announcements;
            } catch(\Throwable $a){
                error_log($a->getMessage());

                header("location: ../back-end/AnnouncementManagement.php?error =" . urlencode($a->getMessage()));
                exit();
            }
        }

        public function insertAnnouncement($formattedStartTime, $getAnnouncement, $getContent)
        {
            try {
                $stmt = $this->connect()->prepare('INSERT INTO announcements (announcement_date, announcement, content) VALUES (?, ?, ?)');

                if (!$stmt->execute(array($formattedStartTime, $getAnnouncement, $getContent))) {
                    throw new Exception("Failed to Add Announcement");
                    // The header function should be outside of this if block, after the catch block.
                }

                // You should close the statement before exiting the method.
                $stmt = null;

                // If the insertion is successful, you can redirect here.
                header("location: ../back-end/AnnouncementManagement.php?success=announcementadded");
                exit();
            } catch (\Throwable $th) {
                // Handle the exception and redirect with an error message.
                header("location: ../back-end/AnnouncementManagement.php?error=" . urlencode($th->getMessage()));
                exit();
            }
        }

        public function editAnnouncement($formattedStartTime, $editAnnouncement, $editContent, $couponID) {
            try {
                $stmt = $this->connect()->prepare('UPDATE announcements SET announcement_date=?, announcement=?, content=? WHERE id = ?');
        
                if (!$stmt->execute(array($formattedStartTime, $editAnnouncement, $editContent, $couponID))) {
                    throw new Exception("Failed to update Announcement");
                }
        
                // You should close the statement before exiting the method.
                $stmt = null;
        
                // If the update is successful, you can redirect here.
                header("location: ../back-end/AnnouncementManagement.php?success=announcementupdated");
                exit();
            } catch (Exception $e) {
                header("location: ../back-end/AnnouncementManagement.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
    }
