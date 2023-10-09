<?php
    include "adminHeader.php";
?>
<link rel="stylesheet" href="../assets/css/AdminRating.css">
<div class="rating-cont">
   <div class="rtitle-cont">
        <div class="l--cont">
            <h1>Rating Management</h1>
        </div>
        

    <div class="r--cont">
        <div class="drop--cont">

            <select  class = "Rating" id="rating" name="Rating" required>
                <option >All</option>
                <option >Product</option>
                <option >Rating</option>

            </select>
        </div>

    </div>

   </div>

   <div class="table-cont">
    <table id ="rating-table">
        <thead>
            <tr>
                <th>Account Name</th>
                <th>Product</th>
                <th>Rating</th>
                <th>Note</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Dela Cruz</td>
                <td>Mango Shake</td>
                <td>5 Star</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</td>
            </tr>

            <tr>
                <td>Juan Dela Cruz</td>
                <td>Mango Shake</td>
                <td>5 Star</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</td>
            </tr>
        </tbody>
    </table>
   </div>
    

</div>

<?php
    include "adminFooter.php";
?>