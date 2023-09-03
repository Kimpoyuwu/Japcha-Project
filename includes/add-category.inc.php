<?php

print("asdadadadada");

if(isset($_POST["submit"]))
{
    print("sddddddddddddd");
     // Get the form data
     $category = $_POST['c_name'];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/add-category.classes.php";
    include "../classes/add-category-cntrl.classes.php";
    $addCategory = new AddCategoryContr($category);

    // Runnig error handlers and user signup
    $addCategory-> addCategory();
    

    // Going back to front page
    header("location: ../viewCategory.php?error=none");

}
