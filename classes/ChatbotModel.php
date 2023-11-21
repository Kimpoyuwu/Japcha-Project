<?php

class ChatbotModel extends Dbh
{
    public function getAllChatQuestions()
    {
        try {
            $chatbot = array();
            $stmt = $this->connect()->prepare('SELECT * FROM chatbot ORDER BY id ASC');
            if($stmt->execute()){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $chatbot[]=$row;
                }
            } else{
                error_log("Error executing query in getAllChatQuestions");
            }
            return $chatbot;
        }
        catch(\Throwable $a){

            error_log("Error in getAllChatQuestions: " . $a->getMessage());
            
            return array();
        }
    }


    public function insertChatbot($getQuestion, $getAnswer)
    {
        $stmt = $this->connect()->prepare('INSERT INTO chatbot (chatQuestion,chatAnswer) VALUES (?, ?)');
        if (!$stmt->execute(array($getQuestion, $getAnswer))) {
            throw new Exception("Failed to Add Announcement");
        }
    }



    public function editChatbot($chatbot_id, $editQuestion, $editAnswer) {
        try {
            $stmt = $this->connect()->prepare('UPDATE chatbot SET chatQuestion=?, chatAnswer=? WHERE id=?');
            if (!$stmt->execute(array($editQuestion, $editAnswer, $chatbot_id))) {
                throw new Exception("Failed to update Chatbot");
            }
        } catch (Exception $e) {
            throw new Exception("Error updating Chatbot: " . $e->getMessage());
        }
    }
    
}