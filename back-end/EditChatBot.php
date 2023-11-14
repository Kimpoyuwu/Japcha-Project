<?php
    foreach($getchatQuestions as $gchatbot):
?>

<div class="Chatbot-edit-Modal" data-chatbot-id="<?= $gchatbot['id']?>">
            <form action="../includes/add-chatbot.inc.php" method="POST">
                <input type="hidden" name="chatbotID" value="<?= $gchatbot['id']?>">
                <textarea required class ="typeQuestion" name="typeQuestion" id="" cols="10" rows="1" placeholder="Edit Question Here..."><?= $gchatbot['chatQuestion']?> </textarea>
                <textarea required class="typeAnswer" name="typeAnswer" id="" cols="10" rows="1" placeholder="Edit Answer Here..."><?= $gchatbot['chatAnswer'] ?></textarea>


                <div class="buttonModal">
                    <button type="button" name="editChatbot"class="answerEdit">Update</button>
                    <button type="button" class="answerCancel" onclick="window.location.href='../back-end/adminMessage.php'">Cancel</button>
                </div>

            </form>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    const chatEditElement = document.querySelector('#editIcon');
    const chatBotEditModal = document.querySelector('.Chatbot-edit-Modal');

    chatEditElement.addEventListener('click', function() {
        if(chatBotEditModal.style.display === 'none' || chatBotEditModal.style.display ==='') {
            chatBotEditModal.style.display ='block';
        }

    });
</script>


<script>
      $(document).ready(function() {
    
    $(document).on('click', '.fa-pencil-square-o', function(e) {
        e.preventDefault();
        
        
        var editContainer = $(this).closest('.questionCont');
        var chatbotID = editContainer.data('chatbot-id');
        var existingQuestion = editContainer.find('p:first-child').text();
        var existingAnswer = editContainer.find('p:last-child').text();
        
        
        $('.Chatbot-edit-Modal[data-chatbot-id="' + chatbotID + '"]').find('.typeQuestion').val(existingQuestion);
        $('.Chatbot-edit-Modal[data-chatbot-id="' + chatbotID + '"]').find('.typeAnswer').val(existingAnswer);
        
        
        $('.Chatbot-edit-Modal[data-chatbot-id="' + chatbotID + '"]').css('display', 'block');
    });

    
    $(document).on('click', '.answerEdit', function(e) {
        e.preventDefault();

        // Get the data-chatbot-id attribute from the edit modal
        var chatbotID = $(this).closest('.Chatbot-edit-Modal').data('chatbot-id');
        
        // Get the updated question and answer from the edit modal
        var updatedQuestion = $(this).closest('.Chatbot-edit-Modal').find('.typeQuestion').val();
        var updatedAnswer = $(this).closest('.Chatbot-edit-Modal').find('.typeAnswer').val();


            // Check if either question or answer is blank
        if (updatedQuestion.trim() === '' || updatedAnswer.trim() === '') {
            // Display an alert if either question or answer is blank
            alert('Please fill in both the question and answer.');
            return;
        }

        // Update the content in the main container
        var mainContainer = $(".questionCont[data-chatbot-id='" + chatbotID + "']");
        mainContainer.find('p:first-child').text(updatedQuestion);
        mainContainer.find('p:last-child').text(updatedAnswer);

        // Send the updated question and answer to the server using AJAX
        $.ajax({
            type: 'POST',
            url: '../includes/add-chatbot.inc.php',
            data: {
                chatbotID: chatbotID,
                typeQuestion: updatedQuestion,
                typeAnswer: updatedAnswer,
                editChatbot: true
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });

        // Hide the edit modal
        $(this).closest('.Chatbot-edit-Modal').hide();
    });
});

$(document).on('click', '.answerCancel', function() {
    $('.Chatbot-edit-Modal').hide();
});

</script>



<?php
  endforeach;
?>