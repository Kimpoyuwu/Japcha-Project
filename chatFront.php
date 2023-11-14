<?php
include "c_header.php";
include "classes/chatbotFrontModel.php";
$chatbot = new chatbotFrontModel();
$getChatQuestions = $chatbot->getAllChatQuestions();
?>
<link rel="stylesheet" href="frontChat.css">


<div class="chat-main-cont">

    <form action="" class="chat-form">


        <div class="chat-title-cont">
            <h2>CHAT WITH US</h2>
        </div>

        <div class="chat-box-cont">


            <div class="admin-chat-cont">
                <!-- admin icon -->
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <!-- admin message -->
                <div class="admin-message" id="admin-message">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eligendi nemo provident, consequatur beatae aperiam consequuntur repudiandae fugiat rerum quas asperiores natus aliquid, quibusdam voluptas exercitationem odio omnis. Similique, beatae.</p>
                </div>

            </div>

            <div class="client-chat-cont">
                <!-- client icon -->
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <!-- client message -->
                <div class="client-message" id="client-message">
                    <p>Lorem ipsum dolor?</p>
                </div>
            </div>

        </div>

        <div class="chat-input-cont">
            <input type="text" placeholder="(Type something)" name="" id="chat-input-text">
            <i class="fa fa-file-image-o" aria-hidden="true"></i>
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </div>

        
            
        <div class="chat-bot-cont">
            
            <?php
                    $count = 1;
                    foreach (($getChatQuestions ?? []) as $gchatbot):
            ?>

            <div class="question-cont" data-chatbot-id="<?= $gchatbot['id']?>">
               
                    <p><?= $gchatbot['chatQuestion']?></p>
                
            </div>

            <?php
                $count++; 
                endforeach;

            ?>
            
        </div>
            
    </form>

</div>

