<?php

require_once "../classes/dbh.classes.php";
require_once "../classes/StatisticsModel.php";
$Stat = new StatisticsModel();

if(isset($_GET['product'])){
    $productCount = $Stat->getProductsCount();

    echo json_encode(['count' => $productCount]);
}

if(isset($_GET['order'])){
    $countOrder = $Stat->CountNewInserts();

    echo json_encode(['countOrder' => $countOrder]);
}

if(isset($_GET['deliveries'])){
    $CountDeliver = $Stat->CountNewInserts();

    echo json_encode(['CountDeliver' => $CountDeliver]);
}