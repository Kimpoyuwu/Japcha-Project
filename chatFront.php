
<?php
    require_once "classes/dbh.classes.php";
?>
<?php
include "./classes/chatbotFrontModel.php";
$chatbot = new chatbotFrontModel();
$getChatQuestions = $chatbot->getAllChatQuestions();
?>
    <link rel="stylesheet" href="frontChat.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="chat-main-cont">

    <div class="chat-form">

        
        <div class="chat-area" id="chatArea">

            <div class="chat-title-cont">
                <h2>CHAT WITH US</h2>
            </div>
            
            <div class="chat-box-cont" id="scrollableContainer" ">
                
                <!-- container for chat area -->
                <div class="client-chat-cont">
                    <!-- client icon -->
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <!-- client message -->
                    <div class="client-message" id="client-message">
                        <p>Hello and welcome to JapCha, your one-stop destination for delightful beverages and foods! How can we assist you today?</p>
                    </div>
                </div>

                
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
            
            <div class="chat-input-cont">
                <textarea name="message" id="messageInput" placeholder="Type a Message"></textarea> 
                <button type="button" id="submitBtn">
                    <img src="image/send-alt-svgrepo-com.svg" alt="">
                </button>
                
            </div>

        
        </div>
        
            
    </div>

    <div class="msg-icon-cont" id="msg-icon">
            <img src="image/message-circle-text-solid-svgrepo-com.svg" alt="nameasd">
    </div> 
    

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
    window.addEventListener('load', scrollToBottom);

    function scrollToBottom() {
        var chatBox = document.querySelector('.chat-box-cont');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    window.addEventListener('load', scrollToBottom);

    document.addEventListener('DOMContentLoaded', function () {
    const sendButton = document.querySelector('.chat-input-cont img');
    const chatInput = document.getElementById('chat-input');
    const chatBoxCont = document.querySelector('.chat-box-cont');

    sendButton.addEventListener('click', function () {
        sendMessage();
    });

    function sendMessage() {
        const message = chatInput.value.trim();

        if (message !== '') {
            const clientChatContainer = document.createElement('div');
            clientChatContainer.className = 'client-chat-cont';

            const clientIcon = document.createElement('i');
            clientIcon.className = 'fa fa-user-circle-o';
            clientIcon.setAttribute('aria-hidden', 'true');
            clientChatContainer.appendChild(clientIcon);

            const clientMessage = document.createElement('div');
            clientMessage.className = 'client-message';
            clientMessage.innerHTML = '<p>' + message + '</p>';
            clientChatContainer.appendChild(clientMessage);

            chatBoxCont.appendChild(clientChatContainer);
            scrollToBottom();
            chatInput.value = '';
        }
    }

    chatInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                sendMessage();
            }
        });

    function scrollToBottom() {
        chatBoxCont.scrollTop = chatBoxCont.scrollHeight;
    }
}); 

</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const chatArea = document.getElementById('chatArea');
    const msgIcon = document.getElementById('msg-icon');

    // Function to toggle chat area visibility
    function toggleChatArea() {
        const chatAreaStyle = getComputedStyle(chatArea);
        const currentTransform = chatAreaStyle.getPropertyValue('transform');

        if (currentTransform === 'none' || currentTransform === 'matrix(1, 0, 0, 1, 0, 0)') {
            // If the chat area is not transformed or translated
            chatArea.style.transform = 'translateX(999px)';
        } else {
            // If the chat area is already translated, reset it
            chatArea.style.transform = 'none';
        }
    }

    // Add click event listener to the msg-icon-cont
    msgIcon.addEventListener('click', function () {
        toggleChatArea();
    });
});

</script>

<script>

    $(document).ready(function() {
        $("#submitBtn").click(function(){
 
        var message = $('#messageInput').val();
        
        $.ajax({
                type: 'POST',
                url: 'includes/frontChat.inc.php',
                data: {
                    message: message
                },
                success: function(response) {
                    console.log('Message sent successfully');

                },
                error: function(xhr, status, error) {
                    
                    console.error('Error:', error);
                }
            });
        });
    
    });


</script>
