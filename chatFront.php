<?php
include "c_header.php";
require_once "classes/chatbotFrontModel.php";
$chatbot = new chatbotFrontModel();
$getChatQuestions = $chatbot->getAllChatQuestions();
?>
    <link rel="stylesheet" href="frontChat.css">

<div class="chat-main-cont">

    <form action="" class="chat-form">


        <div class="chat-title-cont">
            <h2>CHAT WITH US</h2>
        </div>

        
        <div class="chat-area">
            
            <div class="chat-box-cont" id="scrollableContainer">

            <!-- container for chat area -->
            <div class="admin-chat-cont" style="margin-bottom: -10px;">
                <!-- admin icon -->
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <!-- admin message -->
                <div class="admin-message" id="admin-message">
                    <p>Hello and welcome to JapCha, your one-stop destination for delightful beverages and foods! How can we assist you today?</p>
                </div>

            </div>
            <div class="chat-bot-cont">
                
                <?php
                        $count = 1;
                        foreach (($getChatQuestions ?? []) as $gchatbot):
                ?>

                <div class="question-cont" data-chatbot-id="<?= $gchatbot['id']?>">
                
                    <p><?= $gchatbot['chatQuestion']?> </p>
                    <p style="display: none;"><?= $gchatbot['chatAnswer']?></p>
                    
                </div>
                

                <?php
                    $count++; 
                    endforeach;

                ?>


                
            </div>

            </div>
        </div>
        
        

        <div class="chat-input-cont">
            <input type="text" placeholder="(Type something)" name="" id="chat-input-text">
            <i class="fa fa-file-image-o" aria-hidden="true"></i>
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </div>

        
            
      
            
    </form>

</div>


<script>

    
    document.addEventListener('DOMContentLoaded', function () {
        var questionContainers = document.querySelectorAll('.question-cont');

        questionContainers.forEach(function (container) {
            container.addEventListener('click', function () {
                
                // Get the chat question and answer from the clicked container
                var chatQuestion = container.querySelector('p:nth-child(1)').textContent;
                var chatAnswer = container.querySelector('p:nth-child(2)').textContent;

                // Create a new client message container
                var clientChatContainer = document.createElement('div');
                clientChatContainer.className = 'client-chat-cont';

                // Create client icon
                var clientIcon = document.createElement('i');
                clientIcon.className = 'fa fa-user-circle-o';
                clientIcon.setAttribute('aria-hidden', 'true');
                clientChatContainer.appendChild(clientIcon);

                // Create client message
                var clientMessage = document.createElement('div');
                clientMessage.className = 'client-message';
                clientMessage.innerHTML = '<p>' + chatQuestion + '</p>';
                clientChatContainer.appendChild(clientMessage);

                // Append the client message container to the chat box
                document.querySelector('.chat-box-cont').appendChild(clientChatContainer);

                // Create a new admin message container
                var adminChatContainer = document.createElement('div');
                adminChatContainer.className = 'admin-chat-cont';

                // Create admin icon
                var adminIcon = document.createElement('i');
                adminIcon.className = 'fa fa-user-circle';
                adminIcon.setAttribute('aria-hidden', 'true');
                adminChatContainer.appendChild(adminIcon);

                // Create admin message
                var adminMessage = document.createElement('div');
                adminMessage.className = 'admin-message';
                adminMessage.innerHTML = '<p>' + chatAnswer + '</p>';
                adminChatContainer.appendChild(adminMessage);

                // Append the admin message container to the chat box
                document.querySelector('.chat-box-cont').appendChild(adminChatContainer);
                scrollToBottom();
            });
        });
    });
</script>

<script>
    // Get the scrollable container
const container = document.getElementById('scrollableContainer');


// Call the function to scroll to the bottom when the content loads
window.addEventListener('load', scrollToBottom);

// Call the function whenever new content is added to the container
// For example, after appending new content dynamically
// scrollToBottom();

function scrollToBottom() {
    var chatBox = document.querySelector('.chat-box-cont');
    chatBox.scrollTop = chatBox.scrollHeight;
}

window.addEventListener('load', scrollToBottom);

</script>





