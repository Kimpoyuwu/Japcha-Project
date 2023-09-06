<?php

class Cms extends Dbh {

    protected function getCms($cusomterId){
        $stmt = $this->connect()->prepare('SELECT * FROM cms ORDER BY cms_id LIMIT 1;');

        if(!$stmt->execute(array($cusomterId))) {
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: index.php?error=nocmsfound");
            exit();
        }

        $profileData = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $profileData;

    }

    protected function setCms($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact){
        $stmt = $this->connect()->prepare('UPDATE profiles SET profile_about = ?, profille_introtitle = ?, profile_introtext = ? WHERE customer_id = ?;');

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $cusomterId))) {
            $stmt = null;
            header("location: ../cms.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

    protected function setCms($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact){
        $stmt = $this->connect()->prepare('INSERT INTO cms (cms_logo, cms_imgage_url, cms_bg_url, cms_title, cms_subtitle, cms_japcha, cms_how_to_order, cms_socials, cms_policy, cms_location, cms_contact_us) VALUES (?,?,?,?,?,?,?,?,?,?,?);');

        if(!$stmt->execute(array($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact))) {
            $stmt = null;
            header("location: ../cms.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }
}