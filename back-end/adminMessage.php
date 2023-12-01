<?php
    include_once "adminHeader.php";
    include "../classes/dbh.classes.php";
    include "../classes/ChatbotModel.php";


    $chatbot = new ChatbotModel();
    $getchatQuestions = $chatbot->getAllChatQuestions();
    
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../assets/css/adminMessage.css">

<div class="mainContainer">
    <div class="leftCont">
        <div class="searchCont">
            <input type="text" placeholder="Search" name="Search" id="">
            <img src="../image/searchButton.png"alt="">
            <i class="fa fa-cog fa-2x" id="chatbotManagerIcon" aria-hidden="true"></i>

        </div>

        <div class="chatCont">
            <div class="profileCont">
                <img src="../image/sample1.png" alt="">
            </div>

            <div class="messageCont">
                <p class="name">Juan Dela Cruz</p>
                <p class="message">Sample Message..</p>
            </div>

            <div class="timeCont">
                <p>Mon 10:29pm</p>
            </div>
        </div>
    </div>

    <div class="rightCont">
        
        <div class="chat-area">
            <div class="chatScrollable">

                <div class="client-chat-Container">
                    <img src="../image/sample1.png" alt="" style="transform: scale(.6);">
                    <div class="clientMess">
                        <p >Sample Me;lskfjlksadnlksfjwjfe;alksmlasmd;ldkssage</p>
                    </div>
                </div>

                <div class="admin-chat-Container">
                    <img src="../image/japcha_logo.png" alt="" style="transform: scale(.6);">
                    <div class="adminMess">
                        <p>Sample Mesasdasdlkasdasdasdasdasdsa saj lkasdj laksdjlaksdj aslkdj aslkd jsage</p>
                    </div>
                </div>
  

            </div>

            <div class="inputCont">
                    <textarea name="message" id="chat-input" placeholder="Type Message Here..."></textarea>
                    <button type="button" id="submitButton">
                        <img class="sendButton" src="../image/sendButton.png" alt="">
                    </button>
            </div>

        </div>

      
        
    </div>

    <div class = "Chatbot-Manager">
            <div class="Chat-title-cont">
                <p>Chatbot Manager</p>
                <div class="chatbot-add">
                <i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i>
                <i class="fa fa-times fa-2x" id="closeChatbotManager" aria-hidden="true"></i>
                </div>
            </div>
        <table class ="chatbotTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $count =1;
                foreach($getchatQuestions as $gChatbot):
                ?>

                <tr>
                <td><?= $count?></td>
                <td><?= $gChatbot['chatQuestion']?></td>
                <td><?= $gChatbot['chatAnswer']?></td>
                <td><button type="button" id ="editButton"class="btn" style="background-color: black; border-color: black; color: #ffffff;" data-toggle="modal" data-target="#editModal <?=$gChatbot['id']?>">Edit</button>
                <button type="button" class="btn" style="background-color: #dc3545; border-color: #dc3545; color: #ffffff;">Delete</button></td>
            </tr>
                <?php
                    $count++; endforeach;
                ?>
                </tbody>
            </table>
            
    </div>
       
    
    <div class="Chatbot-add-Modal">
        <form action="../includes/add-chatbot.inc.php" method="POST">
            <textarea required class ="typeQuestion" name="addQuestion" id="" cols="10" rows="1" placeholder="Add Question Here..."></textarea>
            <textarea required class="typeAnswer" name="addAnswer" id="" cols="10" rows="1" placeholder="Add Answer Here..."></textarea>

            <div class="buttonModal">
                <button type="submit" name="addChatbot" class="answerAdd">Add</button>
                <button type="button" class="answerCancel" onclick="closeAddModal()">Cancel</button>


            </div>

        </form>
    </div> 

         
    <?php
        include "EditChatbot.php";
    ?> 
             
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const chatbotManagerIcon = document.getElementById('chatbotManagerIcon');
    const chatbotManagerModal = document.querySelector('.Chatbot-Manager');

    chatbotManagerIcon.addEventListener('click', function() {
        if (chatbotManagerModal.style.display === 'none' || chatbotManagerModal.style.display === '') {
            chatbotManagerModal.style.display = 'block';
        } else {
            chatbotManagerModal.style.display = 'none';
        }
    });

    const addIcon = document.querySelector('.fa-plus-square-o');
    const addModal = document.querySelector('.Chatbot-add-Modal');

    addIcon.addEventListener('click', function() {
        if (addModal.style.display === 'none' || addModal.style.display === '') {
            addModal.style.display = 'block';
        } else {
            addModal.style.display = 'none';
        }
    });

    const editButtons = document.querySelectorAll('#editButton');
    const editModals = document.querySelectorAll('.Chatbot-edit-Modal');

    editButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (editModals[index].style.display === 'none' || editModals[index].style.display === '') {
                editModals.forEach(modal => modal.style.display = 'none');
                editModals[index].style.display = 'block';
            } else {
                editModals[index].style.display = 'none';
            }
        });
    });

    
</script>

<script>
    const closeIcon = document.getElementById('closeChatbotManager');
    const chatbotCloseModal = document.querySelector('.Chatbot-Manager');

    closeIcon.addEventListener('click', function() {
        chatbotManagerModal.style.display = 'none';
    });

    function closeAddModal() {
        const chatbotManagerModal = document.querySelector('.Chatbot-Manager');
        const addModal = document.querySelector('.Chatbot-add-Modal');

        addModal.style.display = 'none';
        chatbotManagerModal.style.display = 'block';
    }
</script>


<!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sendButton = document.querySelector('.sendButton');
            const chatScrollable = document.querySelector('.chatScrollable');
            const chatInput = document.querySelector('#chat-input');

            // Function to send message
            function sendMessage() {
                const message = chatInput.value.trim();

                if (message !== '') {
                    const adminChatContainer = document.createElement('div');
                    adminChatContainer.className = 'admin-chat-Container';

                    const adminImage = document.createElement('img');
                    adminImage.src = '../image/japcha_logo.png';
                    adminImage.alt = '';
                    adminImage.style.transform = 'scale(.6)';
                    adminChatContainer.appendChild(adminImage);

                    const adminMess = document.createElement('div');
                    adminMess.className = 'adminMess';
                    adminMess.innerHTML = '<p>' + message + '</p>';
                    adminChatContainer.appendChild(adminMess);

                    chatScrollable.appendChild(adminChatContainer);

                    // Scroll to the bottom of the chat
                    chatScrollable.scrollTop = chatScrollable.scrollHeight;

                    // Clear the input field after sending the message
                    chatInput.value = '';
                }
            }

            // Event listener for send button click
            sendButton.addEventListener('click', function (event) {
                event.preventDefault();
                sendMessage();
            });

            // Event listener for Enter key press in the input field
            chatInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    sendMessage();
                }
            });
        });
</script> -->

<!-- ... (your existing HTML code) ... -->

<script>
    $(document).ready(function() {
        $("#submitButton").click(function(){
            var message = $('#chat-input').val();
            
            $.ajax({
                type: 'POST',
                url: 'includes/admin-message.inc.php', 
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

<?php
    include "adminFooter.php";
?>