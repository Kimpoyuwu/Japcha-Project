<?php

class OrderController extends Order{

    private $customerid;
    private $prodid;
    private $sizesid;
    private $price;
    private $quantity;
    private $address;
    private $remark;
    private $status;



    public function __construct($customerid, $prodid, $sizesid, $price, $quantity, $address, $remark, $status){
        $this ->customerid = $customerid;
        $this ->prodid = $prodid;
        $this ->sizesid = $sizesid;
        $this ->price = $price;
        $this ->quantity = $quantity;
        $this ->address = $address;
        $this ->remark = $remark;
        $this ->status = $status;
        
    }

    public function orderProd(){
        // if($this->emptyInput() == false) 
        // {
        //     header("location: ../index.php?error=emptyinput");
        //     exit();
        // }

        $this->setOrder($this ->customerid,  $this ->prodid,  $this ->sizesid,  $this ->price, $this ->quantity,  $this ->address, $this ->remark, $this ->status);
    }

    // private function emptyInput(){
    //     $result;
    //     if(empty( $this ->username) || empty( $this ->pwd) || empty($this ->pwdConfirm) || empty( $this ->email) || empty(  $this ->address) || empty($this ->contactNum) ) 
    //     {
    //         $result = false;
    //     }
    //     else {
    //         $result = true;
    //     }
    //     return $result;
    // }


}