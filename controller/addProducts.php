<?php
    if(isset($_POST['submit']) && isset($_FILES['product_image'])){
        include "../config/databaseConnection.php";

        echo "success";


        echo "<pre>";
        print_r($_FILES['product_image']);
        echo "</pre>";

        $productname = $_POST["productname"];
        $label = $_POST["label"];
        // $addons = $_POST['addons'];
        // $addons1 = implode(",", $addons);
        $description = $_POST["description"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

        if (preg_match('/\d/', $productname)) {
            $em = "Sorry, bawal yung pangalan";
            header("Location: ../adminProducts.php?error=$em");
        }

        if($error === 0){
            if($img_size > 1250000){
                $em = "Sorry, your file is too large.";
                // header("Location: ../adminProducts.php?error=$em");    
            } else{
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
               $img_ex_lc = strtolower($img_ex);

               $allowed_exs = array("jpg", "jpeg", "png");

               if(in_array($img_ex_lc,  $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../upload/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // insert into database

                $sql = "INSERT INTO product (image_url, product_name, label, description, category, price, quantity) 
                VALUES (?,?,?,?,?,?,?)";

                $stmt = mysqli_prepare($con, $sql);
                if($stmt){
                    mysqli_stmt_bind_param($stmt, "sssssdi", $new_img_name,$productname,$label, $description, $category, $price,$quantity);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        echo "successfully inserted";
                        // header("Location: view.php");   
                    } else {
                        // Insertion failed
                        exit();
                    }
                    mysqli_stmt_close($stmt);
                }
               
                echo "success";

               }else{
                $em = "You can't upload files of this type";
                // echo 'You can\'t upload files of this type';
                header("Location: ../adminProducts.php?error=$em");   
               }
            }

        }else{
            $em = "unknown error occured!";
            // header("Location: ../adminProducts.php?error=$em");    
        }

        
    }else{
        header("Location: ../adminProducts.php");

    }
?>