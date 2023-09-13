<?php
    include "adminHeader.php";
?>

<link rel="stylesheet" href="..assets/css/Admindashboard.css">
    <title>Dashboard</title>
    
<div class="dashboard-container">
    <h1 class="dashboard-title">Dashboard</h1>
    <div class="dashboard">
        <div class="daily-sales">
            <div class="img-container-daily-sales">
                <img src="image/₱.png" alt="Daily Sales Image">
            </div>
            <div>
                <h2>Daily Sales</h2>
                <p>₱30,000.00</p>
            </div>
        </div>
        <div class="total-orders">
            <div class="img-container-total-orders ">
                <img src="image/undefined11.png" alt="Total Orders Image">
            </div>
            <div>
                <h2>Total Orders</h2>
                <p>80</p>
            </div>
        </div>
        <div class="total-products">
            <div class="img-container-total-products">
                <img src="image/undefined8.png" alt="Total Products Image">
            </div>
            <div>
                <h2>Total Products</h2>
                <p>300</p>
            </div>
        </div>
    </div>
</div>
<div class="Product-Sales">
    <div class="img-container-Sales-Product">
        <img src="image/Sales-Product.png" alt="Total Products Image">
    </div>
</div>
</div>

<div class="Top-Selling">
    <div class="img-container-Sales-Product">
        <h3>Top Selling Products</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Cost</th>
                    <th>Orders</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="image/sampleimage.png" alt="Product 1 Image"></td>
                    <td>Product Name</td>
                    <td>₱100</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td><img src="image/sampleimage.png" alt="Product 2 Image"></td>
                    <td>Product Name</td>
                    <td>₱100</td>
                    <td>100</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="Inquiry-And-Messages">
    <div class="img-container-Sales-Product">
        <h3>Inquiries&Messages</h3>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="image/man.png" alt="Product 1 Image"> </td>
                    <td>Cruz</td>
                    <td>100</td>
                    <td>Tuesday</td>
                    <td>10:49am </td>
                </tr>
                <tr>
                    <td><img src="image/Profile.png" alt="Product 2 Image"></td>
                    <td>Juan</td>
                    <td>100</td>
                    <td>Wednesday</td>
                    <td>10:49am </td>
                </tr>
                </tr>
                <tr>
                    <td><img src="image/Man (1).png" alt="Product 2 Image"></td>
                    <td>Cruz</td>
                    <td>100</td>
                    <td>Friday</td>
                    <td>10:49am </td>
                </tr>
                <tr>
                    <td><img src="image/Boy.png" alt="Product 2 Image"></td>
                    <td>Cruz</td>
                    <td>100</td>
                    <td>Monday</td>
                    <td>10:49am </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="Active-Orders">
    <h3>Active Orders </h3>
</div>

<?php
    include "adminFooter.php";

?>