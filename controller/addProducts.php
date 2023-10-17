<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addProd'])) {
        include "../config/databaseConnection.php";

        $productname = $_POST["productname"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $sizes = $_POST['sizes'];
        $prices = $_POST['prices'];
        $new_img_name = 'japcha_log.png'; // Default value for image name

        session_start();

        // check if size is value = 0
   
        // Check if a file is uploaded
        if ( isset($_FILES['product_image']['name']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
            $img_name = $_FILES['product_image']['name'];

            // Check if the file already exists in the target directory before moving it
            $target_file = '../upload/' . $img_name;

            if (file_exists($target_file)) {
                $em = "Sorry, the file already exists.";
                error_log("File already exists: $target_file"); // Log the message
                header("Location: ../back-end/adminProducts.php?error=$em");
                exit();
            }

            $img_size = $_FILES['product_image']['size'];
            $tmp_name = $_FILES['product_image']['tmp_name'];

            if ($img_size > 49085778) {
                $em = "Sorry, your file is too large.";
                header("Location: ../back-end/adminProducts.php?error=$em");
                exit();
            }

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png", "mp4");

            if (!in_array($img_ex_lc, $allowed_exs)) {
                $em = "You can't upload files of this type";
                header("Location: ../back-end/adminProducts.php?error=$em");
                exit();
            }

            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = '../upload/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        }

        // Insert into the database
        $sql = "INSERT INTO product (image_url, product_name, description, category_id) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            // If no file is uploaded, the default value for image_url should be applied
            mysqli_stmt_bind_param($stmt, "sssi", $new_img_name, $productname, $description, $category);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                // Handle insertion of sizes and prices here
                $productId = $stmt->insert_id;

                $insertSizeQuery = "INSERT INTO variation (product_id, size_id, price) VALUES (?, ?, ?)";
                $stmt = $con->prepare($insertSizeQuery);
        
                for ($i = 0; $i < count($sizes); $i++) {
                    $stmt->bind_param("iid", $productId, $sizes[$i], $prices[$i]);
                    $stmt->execute();
                }
        
                if ($stmt->affected_rows > 0) {
                    // Successfully inserted sizes and prices for the product
        
                    // Redirect to the appropriate page
                    header("Location: ../back-end/adminProducts.php");
                    exit();
                } else {
                    // Handle the case where sizes and prices insertion failed
                    header("Location: ../back-end/adminProducts.php?error=sizes_prices_insertion_failed");
                    exit();
                }
            } else {
                // Insertion failed
                header("Location: ../back-end/adminProducts.php?error=insertion_failed");
                exit();
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        header("Location: ../back-end/adminProducts.php");
    }
}
?>
