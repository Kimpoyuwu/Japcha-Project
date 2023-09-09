<?php
    include "adminHeader.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div class="main--cont">
        
        <div class="drop-cont">

            <select  class = "Daily" id="daily" name="Daily" required>
                    <option >Daily</option>
                    <option >Weekly</option>
                    <option >Monthly</option>
                    <option >Yearly</option>
            </select>
        </div>

        <div class="chart-cont">
            <div class="chart-box">

            </div>


        </div>

        <div class="tile-cont">
            <div class="tiles">
                <div class="text-cont">
                    <p class = "label">Best Selling Product</p>
                    <h2 class = "data">50</h2>
                </div>
                <div class="more-info">
                    <a href="" id = "#">More Info</a>
                </div>
            </div>

            <div class="tiles">
                <div class="text-cont">
                    <p class = "label">Total Deliveries</p>
                    <h2 class = "data">30</h2>
                </div>
                <div class="more-info">
                    <a href="" id = "#">More Info</a>
                </div>
            </div>

            <div class="tiles">
                <div class="text-cont">
                    <p class = "label">Total Sold Products</p>
                    <h2 class = "data">100</h2>
                </div>
                <div class="more-info">
                    <a href="" id = "#">More Info</a>
                </div>
            </div>

            <div class="tiles">
                <div class="text-cont">
                    <p class = "label">Total Sales</p>
                    <h2 class = "data">12,000</h2>
                </div>
                <div class="more-info">
                    <a href="" id = "#">More Info</a>
                </div>
            </div>
        </div>

    </div>
</body>
</html>