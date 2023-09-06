<?php

class CmsContr extends Cms {

    private $cmsLogo;
    private $cmsImage;
    private $cms_bg
    private $cms_title;
    private $cms_subtitle;
    private $cms_japcha;
    private $cms_how_to_order;
    private $cms_socials;
    private $cms_policy;
    private $cms_location;
    private $cms_contact;

    
    public function __construct($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact){
        $this->cmsLogo = $cmsLogo;
        $this->cmsImage = $cmsImage;
        $this->cms_bg = $cms_bg;
        $this->cms_title = $cms_title;
        $this->cms_subtitle = $cms_subtitle;
        $this->cms_japcha = $cms_japcha;
        $this->cms_how_to_order = $cms_how_to_order;
        $this->cms_socials = $cms_socials;
        $this->cms_policy = $cms_policy;
        $this->cms_location = $cms_location;
        $this->cms_contact = $cms_contact;
    }

    public function defaultProfileInfo(){
        $cmsLogo = "Something";
        $cmsImage = "Something About";
        $cms_bg = "Something bout you";
        $cms_title = "Something";
        $cms_subtitle = "Something About";
        $cms_japcha = "Something bout you";
        $cms_how_to_order = "Something";
        $cms_socials = "Something About";
        $cms_policy = "Something bout you";
        $cms_location = "Something";
        $cms_contact = "Something About";

        $this->setCms($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact);
    }

    public function updateProfileInfo($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact){
        // Error Handlers
        if($this->emptyInputCheck($cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact) == true){
            header("location: ../cms.php?error=emptyinput");
            exit();
        }



        // Update profile info
        $this->setNewProfileInfo($cmsLogo, $cmsImage, $cms_bg, $cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact);

    }

    private function emptyInputCheck($cms_title, $cms_subtitle, $cms_japcha, $cms_how_to_order, $cms_socials, $cms_policy, $cms_location, $cms_contact){
        $result;
        if(empty( $this ->cms_title) || empty( $this ->cms_subtitle) || empty( $this ->cms_japcha) || empty( $this ->cms_how_to_order) || empty( $this ->cms_socials) || empty( $this ->cms_policy) || empty( $this ->cms_location) || empty( $this ->cms_contact) ) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    
}