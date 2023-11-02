<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['checkout'])){
        
        $cartid = $_POST['cart_id'];
        echo '<pre>';
var_dump($cartid);
echo '</pre>';
    }
}