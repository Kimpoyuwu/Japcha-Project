<?php

    class SampleModel extends Dbh{

        public function setContent($content){
            try {
              
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET japcha = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($content))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setOrder($order){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET order_note = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($order))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setSocials($social){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET socials = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($social))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setPolicy($policy){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET policy = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($policy))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setLocation($loc){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET location = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($loc))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }
        public function setContact($contact){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE about_us SET contact = ? ');
                
                // Execute the query
                if(!$stmt->execute(array($contact))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setTitle($title_data){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE cms_landing_page SET title = ?');
                
                // Execute the query
                if(!$stmt->execute(array($title_data))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setSubtitle($subtitle){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE cms_landing_page SET subtitle = ?');
                
                // Execute the query
                if(!$stmt->execute(array($subtitle))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function setFbLink($fbLink){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE social_media_links SET fb_link = ?');
                
                // Execute the query
                if(!$stmt->execute(array($fbLink))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

     
        public function setYtLink($fbLink){
            try {
                
                // Prepare the SQL query
                $stmt = $this->connect()->prepare('UPDATE cms_landing_page SET subtitle = ?');
                
                // Execute the query
                if(!$stmt->execute(array($fbLink))) {
                    $stmt = null;
                    header("location: ../myProfile.php?error=stmtfailed");
                    exit();
                }
                $stmt = null;
            } catch (Exception $e) {
                // Log the error or handle it appropriately
                header("location: ../back-end/admin-ProductSizes.php?error=" . urlencode($e->getMessage()));
                exit();
            }
        }

        public function getContent(){
            $stmt = $this->connect()->prepare('SELECT * FROM about_us');

            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=nocmsfound");
                exit();
            }
    
            $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $profileData;
    
        }

        public function getContentLanding(){
            $stmt = $this->connect()->prepare('SELECT * FROM cms_landing_page');

            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=nocmsfound");
                exit();
            }
    
            $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $profileData;
    
        }

        public function getLinks(){
            $stmt = $this->connect()->prepare('SELECT * FROM social_media_links');

            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../back-end/admin-cms.php?error=nocmsfound");
                exit();
            }
    
            $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $profileData;
    
        }

    }