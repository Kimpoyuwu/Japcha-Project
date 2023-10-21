<?php
    include "adminHeader.php";
?>
<style>
    /* .graph-container2{
        display: none;
    }
    .graph-container2.hidden{
        display: block;
    } */
</style>

<div class="stat-main">
    
    <div class="stat-header">
        <div class="stat-title">
            <h1>Statistics</h1>
        </div>

        <div class="stat-dropdown">
            <div class="cont--drop">
                <select name="Stats" id="stats" class = "Stats">
                    <option>Daily</option>
                    <option>Monthly</option>
                    <option>Annual</option>

                </select>

            </div>
        </div>
    </div>


    <div class="stat-container">
        <div class="nav-cont">
            <div class="product-n" id="product-n">
                <p>PRODUCT</p>
            </div>

            <div class="sales-n" id ="sales-n">
                <p>SALES</p>
            </div>

            <div class="deliveries-n" id ="deliveries-n">
                <p>DELIVERIES</p>
            </div>

            <div class="orders-n" id ="orders-n">
                <p>ORDERS</p>
            </div>

        </div>


        <div class="graph-cont">
            
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>


            <div class="graph-container1">
                    <canvas id="donutChart" style="max-width: 400px; margin: 0 auto;"></canvas>
            </div>

            <script>
                    // Sample data for the donut chart
                    var data = {
                        labels: ["Red", "Blue", "Green"],
                        datasets: [
                            {
                                data: [30, 20, 50],
                                backgroundColor: ["red", "blue", "green"],
                            },
                        ],
                    };

                    // Create the donut chart
                    var ctx = document.getElementById("donutChart").getContext("2d");
                    var myDonutChart = new Chart(ctx, {
                        type: "line",
                        data: data,
                    });
            </script>

            
            <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script> -->


                <div class="graph-container2">
                        <canvas id="donutChart2" style="max-width: 400px; margin: 0 auto;"></canvas>
                </div>

                <script>
                        // Sample data for the donut chart
                        var data = {
                            labels: ["Products", "Order", "Deliveries"],
                            datasets: [
                                {
                                    data: [30, 20, 50],
                                    backgroundColor: ["violet", "yellow", "orange"],
                                },
                            ],
                        };

                        // Create the donut chart
                        var ctx = document.getElementById("donutChart2").getContext("2d");
                        var myDonutChart = new Chart(ctx, {
                            type: "doughnut",
                            data: data,
                        });
                </script>
        </div>

    
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const graph1 = document.querySelector('.graph-container1');
    const graph2 = document.querySelector('.graph-container2');
    const salesButton = document.getElementById('sales-n');
    const productsButton = document.getElementById('product-n');

    salesButton.addEventListener('click', function() {
        graph1.style.display = 'none';
        graph2.classList.add('show');

     
    });

    productsButton.addEventListener('click', function() {
        graph1.style.display = 'block';
        graph2.classList.remove('show');   
});
});

$




</script>


<?php
    include "adminFooter.php";
?>
