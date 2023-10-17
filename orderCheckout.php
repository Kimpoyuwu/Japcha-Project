<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
    include "c_header.php"; 
?>
<style>
    .container {
        height: auto; width: 100%; padding-left: 280px;  margin-top: 110px; margin-left: 170px;
    }
 .orderMainCont {
            padding: 20px;
        }

        .moptitle {
            margin-top: 20px;
        }

        .modcont {
            display: flex;
        }

        .cod,
        .gcash {
            margin-right: 20px;
        }

        .productbg img {
            max-width: 100%;
            height: auto;
        }

        .prodDetails mt-4 .hr {
            border: 5px solid gray;
            
        }

        .new4 {
            border: 2px solid gray;
 
        }

        .Remarks{
            text-align: center;
        }

        .form-controls {
            text-align: center;
            height: 100px;
            width: 100px; 
        }

        .btn btn-link {
            color: #D0BC05;
        }

        .card-img-top{
            max-width: 100px; 
            max-height: 100px; 
            background-color:#D0BC05;
            border-style: ridge;
        }
        
        .totalPrice{
            text-align: center;
        }

        .btn{
            background-color:#D0BC05;
            color: black;
            width: 150px;
        }

        .table{
            margin-top: 50px;
        }
    </style>
    
<div class="container orderMainCont">
       

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="detailsCont">
                    <div class="userDetails">
                        <div class="name">
                            <div class="name1">
                            <h3 class="mt">User Details</h3>
                                <p>Full Name</p>
                                <h4>Juan Dela Cruz</h4>
                            </div>
                            <a href="#" class="botn btn-link">Change</a>
                        </div>

                        <div class="contact mt-3">
                            <div class="cont">
                                <p>Contact Number</p>
                                <h4>09123456789</h4>
                            </div>
                            <a href="#" class="botn btn-link">Change</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="detailsCont">
                    <div class="deliveryCont">
                        <div class="address">
                            <h3>Delivery Address</h3>
                            <h4>Block 1 Lot 1 Area 1, Dasmarinas, Cavite..</h4>
                        </div>
                        <a href="#" class="botn btn-link">Change</a>
                    </div>

                    <h3 class="moptitle mt-3">Mode of Payment</h3>
                    <div class="modcont">
                        <div class="cod">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)">
                                <p class="form-check-label"> <img src="image/cod.png" alt=""> Cash on Delivery</p>
                            </div>
                        </div>

                        <div class="gcash">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)">
                                <div class="gcashtitle">
                                    <p> <img src="image/gcash.png" alt=""> Gcash </p>
                                </div>
                                <a href="#" id="gcashCode">Show Gcash Code</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Container for Product Details -->
        <div class="prodDetails mt-4">
            <hr class="new4"> </hr>
        </div>
            
            <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                <td class="center-content">Product 1</td>
                <td class="center-content">₱100.00</td>
                <td class="center-content">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
                <td class="center-content">₱100.00</td>
                <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td>
            </tr>
            <tr>
                <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap " style="max-width: 100px; max-height: 100px;"></td>
                <td class="center-content">Product 2</td>
                <td class="center-content">₱100.00</td>
                <td class="center-content">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
                <td class="center-content">₱100.00</td>
                <td class="center-content"><input type="checkbox" class="form-check-input" name="group" onclick="selectOnlyOne(this)"></td>
            </tr>
        </tbody>
    </table>


            <div class="remarks mt-3">
                <h4 class ="Remarks">Add-ons & Remarks</h4>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

            </div>

            <div class="totalPrice mt-3">
                <h2 class="TP">Total Price:</h2>
                <h3 class="value">₱480.00</h3>
                <button class="btn btn-primary" onclick="goToPage()">Proceed</button>
            </div>
        </div>
    </div>

    <script>
        function selectOnlyOne(checkbox) {
            var checkboxes = document.getElementsByName('group');

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== checkbox) {
                    checkboxes[i].checked = false;
                }
            }
        }

        function goToPage() {
            window.location.href = "orderStatus.php";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>