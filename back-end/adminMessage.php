<?php
    include_once "adminHeader.php"
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets../css/adminMessage.css">
    <title>Document</title>
</head>


<body>
<div class="mainContainer">
        <div class="leftCont">
            <div class="searchCont">
                <input type="text" placeholder="Search"name="Search" id="">
                <img src="../image/searchButton.png" alt="">
            </div>

            <div class="chatCont">
                <div class="profileCont">
                    <img src="../image/sample1.png" alt="">
                </div>

                <div class="messageCont">
                    <p class="name">Juan Dela Cruz</p>
                    <p class ="message">Sample Message..</p>
                </div>

                <div class="timeCont">
                    <p>Mon 10:29pm</p>
                </div>
            </div>

        </div>

        <div class="rightCont">


            <div class="inputCont">
                <img class = "clipButton" src="../image/clipButton.png" alt="">
                <input type="text" placeholder="Type here..." name=""id="">
                <img class = "sendButton" src="../image/sendButton.png" alt="">
            </div>

            <div class="convoCont">
                <div class="messCont">
                    <p>Sample Message</p>
                </div>
            </div>
        </div>


        

</div>

<?php
    include "adminFooter.php"
?>