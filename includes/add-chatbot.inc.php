<?php

 if(isset($_POST['editChatbot'])){
     $chatbotID = intval($_POST['chatbotID']);
     $editQuestion = htmlspecialchars($_POST["typeQuestion"]);
     $editAnswer = htmlspecialchars($_POST["typeAnswer"]);

     

     include "../classes/dbh.classes.php";
     include "../classes/ChatbotModel.php";
     $chatbot = new ChatbotModel();

     try{
         $chatbot->editChatbot($chatbotID,$editQuestion,$editAnswer);
         echo "Chatbot updated successfully";
        header("location: ../back-end/adminMessage.php?success=chatbotupdated");
        exit();

     } catch(Exception $e){
         header("HTTP/1.1 500 Internal Server Error");
         echo "Error: " . $e->getMessage();
         header("location://back-end/adminMessage.php?error=" . urlencode($e->getMessage()));
          exit();
     }

    
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['addQuestion']) && isset($_POST['addAnswer'])){
        $getQuestion = $_POST["addQuestion"];
        $getAnswer = $_POST["addAnswer"];
    }

    include "../classes/dbh.classes.php";
    include "../classes/ChatbotModel.php";
    $chatbot = new ChatbotModel();

    try {
        
        $chatbot->insertChatbot($getQuestion, $getAnswer);
        echo "Chatbot question and answer added successfully to the database";
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo "Error: " . $e->getMessage();
        exit();
    }
}
