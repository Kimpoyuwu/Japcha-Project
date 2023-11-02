<?php
session_start();
require "dbh.classes.php";
require "ProductsModel.php";
$productModel = new ProductModel();

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $products = $productModel->getProductsByCategory($category);

    echo '<form action="ProductDetails.php" method="POST">';
    echo '<div id="itemContainer" class="itemContainer">';

    foreach ($products as $product) {
        $productid = $product['product_id'];

        echo '<div id="product" class="product">';
        echo '<input type="hidden" name="productid" value="' . $productid . '">';
        echo '<div id="prodHeader" class="prodHeader">';

        // Assuming $images contains the file path to the image or video
        if (strpos($product['image_url'], '.mp4') !== false) {
            // If $images contains '.mp4', it's a video
            echo '<video controls style="max-width: 100%">';
            echo '<source src="upload/' . $product['image_url'] . '" type="video/mp4">';
            echo '<p>Your browser does not support the video tag</p>';
            echo '</video>';
        } else {
            echo '<img src="upload/' . $product['image_url'] . '" alt="" style="max-width: 100%">';
        }

        echo '</div>';
        echo '<div id="prodFooter" class="prodFooter">';
        echo '<div class="nameProd">';
        echo '<div class="productName">' . $product['product_name'] . '</div>';
        echo '</div>';
        echo '<button type="submit" name="buynow" value="' . $productid . '">Buy Now</button>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</form>';
}
?>
