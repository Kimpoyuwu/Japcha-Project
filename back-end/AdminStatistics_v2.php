<?php
    include "adminHeader.php";
    require_once "../classes/dbh.classes.php";
    require_once "../classes/StatisticsModel.php";
    $Stat = new StatisticsModel();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<style>
    .gradient-1 {
        background: linear-gradient(to bottom, #ff7e5f, #feb47b);
        color: #fff;
    }

    .gradient-2 {
        background: linear-gradient(to bottom, #5f76e8, #7b8fea);
        color: #fff;
    }

    .gradient-3 {
        background: linear-gradient(to bottom, #25b8bd, #44cbf7);
        color: #fff;
    }

    .gradient-4 {
        background: linear-gradient(to bottom, #2ecc71, #87d68d);
        color: #fff;
    }
    
    .print-button {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        color: #fff;
        background-color: #007bff;
        border: 1px solid #007bff;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .print-button:hover {
        background-color: #0056b3;
    }

    /* print.css */
@media print {
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
}

</style>
<div class="stat-main">
    <div class="stat-header">
        <div class="stat-title" style="margin-top: 20px;">
            <h1>Statistics</h1>
        </div>
        </div>

        <div class="StatisticsContainer">
    <div class="col-xs-12" style="width: 100%;">
        <div>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tab 1</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tab 2</a>
            </div>
        </div>

        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container-fluid mt-3">
                <div class="row"  style="margin-bottom: 50px;">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-black">Products Sold</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-black productSold"></h2>
                                    <!-- <p class="text-black mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5" style="font-size: 30px;"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-black">Revenue</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-black ovarallSales"></h2>
                                        <!-- <p class="text-black mb-0">Jan - March 2019</p> -->
                                    </div>
                                    <span class="float-right display-5 opacity-5" style="font-size: 30px;"><i class="fa fa-money"></i></span>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-black">Total Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-black totalOrders"></h2>
                                    <!-- <p class="text-black mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5" style="font-size: 30px;"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-black">Feedbacks</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-black">4565</h2>
                                    <!-- <p class="text-black mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5" style="font-size: 30px;"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow"> 
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1 title_placeholder">Product Sales</h4>
                                        <p class="subtitle_placeholder"></p>
                                        <!-- <h3 class="m-0">$ 12,555</h3> -->
                                    </div>
                                    <div class="d-flex">
                                        <div class="dropdown mr-2">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Select Data
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#" onclick="changeData('Product Sales')">Product Sales</a>
                                                <a class="dropdown-item" href="#" onclick="changeData('Sales Report')">Sales Report</a>
                                                <!-- <a class="dropdown-item" href="#" onclick="changeData('Total Deliveries')">Total Deliveries</a> -->
                                                <a class="dropdown-item" href="#" onclick="changeData('Total Orders')">Total Orders</a>
                                                <a class="dropdown-item" href="#" onclick="changeData('Best Sellers')">Best Sellers</a>
                                            </div>
                                        </div>
                                        <!-- Additional Dropdown -->
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="additionalDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Date
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="additionalDropdownButton">
                                                <a class="dropdown-item" href="#" onclick="changeData('Year')">Year</a>
                                                <a class="dropdown-item" href="#" onclick="changeData('Month')">Month</a>
                                                <a class="dropdown-item" href="#" onclick="changeData('Weeks')">Weeks</a>
                                                <!-- Add more options as needed -->
                                            </div>
                                            
                                            <button class="btn btn-secondary print-button" onclick="printChart()">Print</button>
                                         

                                        </div>
                                        <!-- End of Additional Dropdown -->
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="chart_widget_2"></canvas>
                                </div>
                                <!-- <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="w-100 mr-2">
                                            <h6>Fruit Tea</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-100">
                                            <h6>Iced Tea</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-primary" style="width: 80%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <div class="row"  style="margin-top: 50px;">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Summary</h4>
                                    <div class="form-group">
                                        <label for="filter">Filter:</label>
                                        <select id="filter" class="form-control">
                                            <option value="days">Days</option>
                                            <option value="weeks">Weeks</option>
                                            <option value="months">Months</option>
                                            <option value="years">Years</option>
                                        </select>
                                    </div>
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>
                            
                        </div>    
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-widget">
                                <div class="card-body">
                                    <h5 class="text-muted">Order Overview </h5>
                                    <h2 class="mt-4">5680</h2>
                                    <span>Total Revenue</span>
                                    <div class="mt-4">
                                        <h4>30</h4>
                                        <h6>Online Order <span class="pull-right">30%</span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h4>20</h4>
                                        <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="margin-bottom: 500px;">
            <div class="container mt-4">
        <h1>Sales Table</h1>
        
        <table class="table" id="salesTable" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th scope="col" style="border: 1px solid black;">#</th>
            <th scope="col" style="border: 1px solid black;">Product</th>
            <th scope="col" style="border: 1px solid black;">Quantity Sold</th>
            <th scope="col" style="border: 1px solid black;">Total Revenue</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" style="border: 1px solid black;">1</th>
            <td style="border: 1px solid black;">Fruit Tea</td>
            <td style="border: 1px solid black;">100</td>
            <td style="border: 1px solid black;">$500</td>
        </tr>
        <tr>
            <th scope="row" style="border: 1px solid black;">2</th>
            <td style="border: 1px solid black;">Iced Tea</td>
            <td style="border: 1px solid black;">150</td>
            <td style="border: 1px solid black;">$750</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

        <button class="btn btn-secondary print-button" onclick="printsalesTable()">Print Sales</button>
    </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printsalesTable() {
    var tableContent = document.getElementById("salesTable").outerHTML;

    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Sales Table</title></head><body>');
    printWindow.document.write('<h1>Sales Table</h1>');
    printWindow.document.write(tableContent);
    printWindow.document.write('</body></html>');

    printWindow.print();
}
    </script>

<script>
    function printChart() {
    // Kunin ang buong nilalaman ng chart-wrapper
    var chartContent = document.querySelector('.chart-wrapper').innerHTML;

    // Kunin ang URI ng graph (ito ay base64-encoded image)
    var chartURI = document.getElementById('chart_widget_2').toDataURL('image/png');

    // I-create ang HTML ng bagong window na maglalaman ng graph
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Chart</title></head><body>');
    printWindow.document.write('<div class="chart-wrapper">' + chartContent + '</div>');
    printWindow.document.write('<img src="' + chartURI + '" alt="Chart Image"/>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();

    // I-print ang bagong window
    printWindow.print();
}
</script>

<script>
    // Sample data for the chart
    var chartData = {
        labels: [],
        datasets: [
            {
                data: [],
                backgroundColor: [],
                
            },
        ],
    };

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

    // Create the chart
    var ctx = document.getElementById("chart_widget_2").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        theme: "light2",
        data: chartData,
    });


    function changeData(dataType) {
    // Update the chart data based on the selected data type
    switch (dataType) {
        case 'Best Sellers':
            $('.title_placeholder').text("Best Sellers");
            $('.subtitle_placeholder').empty();
            // Fetch best-selling products data from the server
            $.ajax({
                url: '../controller/get_product_count.php', // Replace with the actual path to your PHP file
                method: 'GET',
                dataType: 'json',
                data: { best_sellers: 'best_sellers' }, // Add any additional parameters needed
                success: function(data) {
                    // Update chart data and labels
                    myChart.data.labels = data.map(item => item.product_name);
                    myChart.data.datasets[0].data = data.map(item => item.total_quantity);
                    myChart.data.datasets[0].backgroundColor = data.map(() => getRandomColor()); 
                    myChart.update();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching best sellers:', status, error);
                }
            });
            break;
        case 'Total Orders':
            $('.title_placeholder').text("Total Orders");
            $('.subtitle_placeholder').empty();
            $.ajax({
                url: '../controller/get_product_count.php',
                method: 'GET',
                dataType: 'json',
                data: { daily_order: 'daily_order' },
                success: function(data) {
                    // Update chart data and labels
                    if (data.length > 0 && 'formatted_date' in data[0]) {
                        myChart.data.labels = data.map(item => item.formatted_date);
                        myChart.data.datasets[0].data = data.map(item => item.total_orders);
                        
                        myChart.data.datasets[0].backgroundColor = data.map(() => getRandomColor()); 
                        
                        myChart.update();

                        var overallTotal = data.reduce((acc, item) => acc + item.total_orders, 0);
                        $('.subtitle_placeholder').text('Overall Total Orders: ' + overallTotal);
                    } else {
                        console.error('Invalid data structure for Total Orders:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching total orders:', status, error);
                }
            });
            break;

        case 'Sales Report':
            $('.title_placeholder').text("Sales Report");
            $.ajax({
                url: '../controller/get_product_count.php',
                method: 'GET',
                dataType: 'json',
                data: { sales_report: 'sales_report' },
                success: function(data) {
                    if (data.length > 0 && 'formatted_date' in data[0]) {
                        myChart.data.labels = data.map(item => `${item.formatted_date}\nTotal Price: ₱${item.total_price}`);
                        myChart.data.datasets[0].data = data.map(item => item.total_price);
                        myChart.data.datasets[0].backgroundColor = data.map(() => getRandomColor()); 
                        myChart.update();

                       // Calculate the overall total of all total prices
                         var overallTotal = data.reduce((acc, item) => acc + parseFloat(item.total_price), 0);
                        $('.subtitle_placeholder').text('Overall Total: ₱' + overallTotal.toFixed(2));
                    } else {
                        console.error('Invalid data structure for Total Orders:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching total orders:', status, error);
                }
            });
            break;

        case 'Product Sales':
            $('.title_placeholder').text("Product Sales");
            $.ajax({
                url: '../controller/get_product_count.php',
                method: 'GET',
                dataType: 'json',
                data: { sales_product: 'sales_product' },
                success: function(data) {
                    if (data.length > 0 && 'formatted_date' in data[0]) {
                        // Create arrays to store chart data and labels
                        var labels = data.map(item => `Product Name: ${item.product_name}\n Date: ${item.formatted_date}`);
                        var dataValues = data.map(item => item.total_price);

                        // Update chart with the new data
                        myChart.data.labels = labels;
                        myChart.data.datasets[0].data = dataValues;
                        myChart.data.datasets[0].backgroundColor = data.map(() => getRandomColor()); 
                        myChart.update();

                        // Calculate the overall total of all total prices
                        var overallTotal = data.reduce((acc, item) => acc + parseFloat(item.total_price), 0);
                        $('.subtitle_placeholder').text('Overall Total: ₱' + overallTotal.toFixed(2));
                    } else {
                        console.error('Invalid data structure for Product Sales:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching product sales:', status, error);
                }
            });
             break;


        // Handle other cases as needed
        default:
            // $('.title_placeholder').text("Product Sales");
            //     $.ajax({
            //         url: '../controller/get_product_count.php',
            //         method: 'GET',
            //         dataType: 'json',
            //         data: { sales_product: 'sales_product' },
            //         success: function(data) {
            //             if (data.length > 0 && 'formatted_date' in data[0]) {
            //                 // Create arrays to store chart data and labels
            //                 var labels = data.map(item => `Product Name: ${item.product_name}\n Date: ${item.formatted_date}`);
            //                 var dataValues = data.map(item => item.total_price);

            //                 // Update chart with the new data
            //                 myChart.data.labels = labels;
            //                 myChart.data.datasets[0].data = dataValues;
            //                 myChart.data.datasets[0].backgroundColor = data.map(() => getRandomColor()); 
            //                 myChart.update();

            //                 // Calculate the overall total of all total prices
            //                 var overallTotal = data.reduce((acc, item) => acc + parseFloat(item.total_price), 0);
            //                 $('.subtitle_placeholder').text('Overall Total: ₱' + overallTotal.toFixed(2));
            //             } else {
            //                 console.error('Invalid data structure for Product Sales:', data);
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error('Error fetching product sales:', status, error);
            //         }
            //     });
            break;
    }
}

</script>


<script>
    $(document).ready(async function () {


    await fetchTotalOrders()    
    await fetchTotalSalesOverall()
    await fetchTotalProductSold()
        // Sample data (replace this with your actual data)
        var data = [
            { y: 'April', a: 50 },
            { y: 'May', a: 75 },
            { y: 'June', a: 30 },
            // Add more data points as needed
        ];

        // Morris.js Bar Chart
        // Morris.Bar({
        //     element: 'morris-bar-chart',
        //     data: data,
        //     xkey: 'y',
        //     ykeys: ['a'],
        //     labels: ['Quantity Sold'],
        //     barColors: ['#007bff'], // Customize the bar color
        //     hideHover: 'auto',
        //     resize: true
        // });

//  MORRISS CHART HERE ###################################


// Function to update the Morris chart with a transition effect
// Function to update the Morris chart with a transition effect
function updateChart(filter) {
    // Hide the existing chart with a fade-out effect
    $('#morris-bar-chart').fadeOut(500, function () {
        // Empty the chart container after fade-out
        $(this).empty();
        new Promise((resolve) =>{
                $.ajax({
                url: '../controller/get_product_count.php',
                type: 'GET',
                data: { days: filter },
                dataType: 'json',
                success: function (data) {
                    renderChart(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });
        });
      
    });
}

var defaultFilter = 'days';
updateChart(defaultFilter);

$('#filter').on('change', function () {
    var selectedFilter = $(this).val();
    updateChart(selectedFilter);
});

// Example: Function to render the Morris chart with a transition effect
function renderChart(data) {
    // Render the new chart with the selected data
    Morris.Bar({
        element: 'morris-bar-chart',
        data: data,
        xkey: 'y',
        ykeys: ['quantity', 'order_count', 'revenue'],
        labels: ['Product Sold', 'Total Order', 'Revenue ₱'],
        barColors: ['#007bff'],
        // hideHover: '',
        resize: true
    });

    // Show the updated chart with a fade-in effect
    $('#morris-bar-chart').fadeIn(500);
}


 



// MORRIS ENDS HEREE
    function fetchTotalOrders() {
        new Promise((resolve) =>{
            $.ajax({
                url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
                type: 'GET',
                data:{total_order: "total_order"},
                dataType: 'json',
                success: function(response) {
                    // Update the card with the fetched product count
                    updateOrderCount(response.CountTotalOrder)
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
      
    }

    
    function fetchTotalSalesOverall() {
        new Promise((resolve) =>{
            $.ajax({
                url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
                type: 'GET',
                data:{sales_overall: "sales_overall"},
                dataType: 'json',
                success: function(response) {
                    // Update the card with the fetched product count
                    updateSalesOverall(response.TotalSales)
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
      
    }

    function fetchTotalProductSold() {
        new Promise((resolve) =>{
            $.ajax({
                url: '../controller/get_product_count.php', // Update with the actual path to your PHP file
                type: 'GET',
                data:{product_sold: "product_sold"},
                dataType: 'json',
                success: function(response) {
                    // Update the card with the fetched product count
                    updateProductSold(response.total_ProductSold)
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        });
      
    }

    function updateOrderCount(count){
        $('.totalOrders').text(count);
    }

    function updateSalesOverall(count){
        $('.ovarallSales').text("₱" + count);
    }

    function updateProductSold(count){
        $('.productSold').text(count);
    }



    });
</script>

<?php
    include "adminFooter.php";
?>
