<?php
    include_once "adminHeader.php"
?>
<link rel="stylesheet" href="../assets/css/AdminMessage.css">

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
                <div class="sampleMessageCont">
                <p class = sampleMess>Sample Message</p>
                </div>

                <div class="chat-profile-Container">
                    <img src="../image/japcha_logo.png" alt="">
                </div>
            </div>

            <div class="client-chat-Container">

                <div class="client-profile-Container">
                    <img src="../image/sample1.png" alt="">
                </div>

                <div class="clientMessageCont">
                    <p>Sample Message </p>
                </div>
                
                
            </div>
        </div>


</div>

<?php
    include "adminFooter.php"
?>