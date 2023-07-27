.<?php
    include "../config/databaseConnection.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        // Check if the form was submitted

        
        $category = $_POST['c_name'];

        $stmt = $con->prepare("INSERT INTO category(category_name) VALUES (?)");
        $stmt->bind_param("s", $category);

        if ($stmt->execute()) 
        {
            // Insertion successful
            // echo 'Data inserted successfully!';
        } 
        else 
        {
            // Insertion failed
            echo 'Failed to insert data.';
        }
    }
?>
