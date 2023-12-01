<?php
    include "../config/databaseConnection.php";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])){
        $message = $_POST['message'];

        $stmt = $con->prepare("INSERT INTO chat_messages (messages) VALUES (?)");
        $stmt->bind_param("s", $message);
        $stmt->execute();
        $stmt->close();
        $con->close();

        // echo $message;

    }
    
        

    exit();
?>