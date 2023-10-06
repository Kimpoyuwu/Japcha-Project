<?php
    if(isset($_POST['submit']) && isset($_FILES['product_image'])){
        include "../config/databaseConnection.php";

        $productname = $_POST["productname"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $img_name = $_FILES['product_image']['name'];

    // Check if the file already exists in the target directory before moving it
        $target_file = '../upload/' .$img_name;
        if (file_exists($target_file)) {
            $em = "Sorry, the file already exists.";
            error_log("File already exists: $target_file"); // Log the message
            header("Location: ../back-end/adminProducts.php?error=$em");
            exit();
        }

        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

        if (preg_match('/\d/', $productname)) {
            $em = "Sorry, bawal yung pangalan";
            header("Location: ../back-end/adminProducts.php?error=$em");
        }

        if($error === 0){
            if($img_size > 49085778){
                $em = "Sorry, your file is too large.";
                header("Location: ../back-end/adminProducts.php?error=$em");    
            } else{
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
               $img_ex_lc = strtolower($img_ex);

               $allowed_exs = array("jpg", "jpeg", "png", "mp4");

               if(in_array($img_ex_lc,  $allowed_exs)){
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../upload/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // insert into database

                $sql = "INSERT INTO product (image_url, product_name, description, category_id) 
                VALUES (?,?,?,?)";

                $stmt = mysqli_prepare($con, $sql);
                if($stmt){
                    mysqli_stmt_bind_param($stmt, "sssi", $new_img_name,$productname, $description, $category);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        
                        // echo "successfully inserted";
                       
                        header("location: ../back-end/adminProducts.php?error= $productname Successfully Added");
                        exit();
                    } else {
                        // Insertion failed
                        exit();
                    }

                    
                    mysqli_stmt_close($stmt);
                }
                
              

               }else{
                $em = "You can't upload files of this type";
                // echo 'You can\'t upload files of this type';
                header("Location: ../back-end/adminProducts.php?error=$em");   
               }
            }

        }else{
            $em = "unknown error occured!";
            // header("Location: ../adminProducts.php?error=$em");    
        }
        
    }else{
        header("Location: ../back-end/adminProducts.php");

    }
?>