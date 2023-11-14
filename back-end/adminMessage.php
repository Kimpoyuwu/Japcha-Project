<?php
    include_once "adminHeader.php";
?>

<?php
    include "../classes/dbh.classes.php";
    include "../classes/ChatbotModel.php";
    $chatbot = new ChatbotModel();
    $getchatQuestions = $chatbot->getAllChatQuestions();

?>
<link rel="stylesheet" href="../assets/css/adminMessage.css">

<div class="mainContainer">
    <div class="leftCont">
        <div class="searchCont">
            <input type="text" placeholder="Search" name="Search" id="">
            <img src="../image/searchButton.png"alt="">
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
        <div class="inputCont">
            <img class="clipButton" src="../image/clipButton.png" alt="">
            <input type="text" placeholder="Type here..." name="" id="">
            <img class="sendButton" src="../image/sendButton.png" alt="">
        </div>

       

        
        <div class="chatbot-cont" >
            <?php
                    $count = 1;
                    foreach($getchatQuestions as $gchatbot):
                ?>
            <i class="fa fa-pencil-square-o editIcon" id="editIcon" aria-hidden="true" data-chatbot-id="<?= $gchatbot['id']?>"></i>
            <div class="questionCont" data-chatbot-id="<?= $gchatbot['id']?>">
            
            
                <p><?= $gchatbot['chatQuestion']?></p>
                <p><?= $gchatbot['chatAnswer']?></p>
            </div>

            <?php
            $count++; endforeach;
            ?>
            <i class="fa fa-plus-square" id="addQuestionIcon" aria-hidden="true"></i>
        </div>



        <div class="convoCont">
            <div class="sampleMessageCont">
                <p class="sampleMess">Sample Message</p>
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
                <p>Sample Message</p>
            </div>
        </div>
    </div>

       
    
    <div class="Chatbot-add-Modal">
        <form action="../includes/add-chatbot.inc.php" method="POST">
            <textarea required class ="typeQuestion" name="addQuestion[]" id="" cols="10" rows="1" placeholder="Add Question Here..."></textarea>
            <textarea required class="typeAnswer" name="addAnswer[]" id="" cols="10" rows="1" placeholder="Add Answer Here..."></textarea>

            <div class="buttonModal">
                <button type="button" name="addQuestion" class="answerAdd">Add</button>
                <button type="button" class="answerCancel" onclick="window.location.href='../back-end/adminMessage.php'">Cancel</button>
            </div>
        </form>
    </div> 

         
    <?php
        include "EditChatbot.php";
      ?>
             

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    const chatAddElement = document.querySelector('#addQuestionIcon');
    const chatBotAddModal = document.querySelector('.Chatbot-add-Modal');

    chatAddElement.addEventListener('click', function() {
        if(chatBotAddModal.style.display === 'none' || chatBotAddModal.style.display ==='') {
            chatBotAddModal.style.display ='block';
        }

    });
</script>

<script>
    $(document).ready(function() {
        // Show add modal on icon click
        $('#addQuestionIcon').click(function() {
            $('.Chatbot-add-Modal').css('display', 'block');
        });

        // Add new question and answer on "Add" button click
        $('.answerAdd').click(function() {
            var newQuestion = $('.typeQuestion').val(); 
            var newAnswer = $('.typeAnswer').val();
            
            if (newQuestion.trim() === '' || newAnswer.trim() === '') {
                alert('Please fill in both the question and answer.');
                return;
            }
            // Create new question and answer elements
            var newQuestionElement = '<p>' + newQuestion + '</p>';
            var newAnswerElement = '<p>' + newAnswer + '</p>';

            // Create new container for the question and answer
            var newContainer = $('<div class="questionCont"></div>');
            newContainer.append(newQuestionElement).append(newAnswerElement);

            // Append the new container after the last questionCont
            $('.questionCont:last').after(newContainer);

            // Close the add modal
            $('.Chatbot-add-Modal').css('display', 'none');

            // Send the new question and answer to the server
            $.ajax({
                type: 'POST',
                url: '../includes/add-chatbot.inc.php',
                data: {
                    addQuestion: newQuestion,
                    addAnswer: newAnswer
                },
                // Inside your AJAX success callback
                success: function(response) {
                    console.log(response);

                    // Append the new content dynamically to the last questionCont
                    var newQuestionElement = '<p>' + newQuestion + '</p>';
                    var newAnswerElement = '<p>' + newAnswer + '</p>';


                    // Close the add modal
                    $('.Chatbot-add-Modal').css('display', 'none');
                },


                
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Close add modal on "Cancel" button click
        $('.answerCancel').click(function() {
            $('.Chatbot-add-Modal').css('display', 'none');
        });
    });


</script>

<?php
    include "adminFooter.php";
?>