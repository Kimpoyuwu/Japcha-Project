<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
    include "c_header.php"; 
?>
<style>
    .container {
    height: auto; 
    width: 100%; 
    padding-left: 280px;  
    margin-top: 110px; 
    margin-left: 170px;
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

    .modal-gcash{
        text-align: center;
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
                        </div>

                        <div class="contact mt-3">
                            <div class="cont">
                                <p>Contact Number</p>
                                <h4>09123456789</h4>
                            </div>
                            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#changeContactModal">Change</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="changeContactModal" tabindex="-1" role="dialog" aria-labelledby="changeContactModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changeModalLabel">Change Contatct Number</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="recipient-name" class="col-form-label">Contact Number:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- Add any other buttons you need in the modal footer -->
                                    </div>
                                </div>
                            </div>
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
                        <a href="#" class="btn btn-link" data-toggle="modal" data-target="#changeAddressModal">Change</a>
                    </div>
                    <div class="modal fade" id="changeAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeModalLabel">Change Delivery Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
                                <!-- Add any other buttons you need in the modal footer -->
                            </div>
                        </div>
                    </div>
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
                                <a href="#" id="gcashCode" data-toggle="modal" data-target="#gcashQRCodeModal">Show Gcash Code</a>
                            </div>
                        </div>
                        <div class="modal fade" id="gcashQRCodeModal" tabindex="-1" role="dialog" aria-labelledby="gcashQRCodeModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="gcashQRCodeModalLabel">GCash QR Code</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Add the QR code image here -->
                                        <img src="path/to/your/qr_code.png" alt="GCash QR Code">
                                    </div>
                                    <div class="modal-body">
                                    <a class="modal-gcash" id="changeModalLabel">How to pay using Gcash?</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
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
        // Show confirmation modal
        $('#confirmationModal').modal('show');
    }

    function proceedToOrderStatus() {
        // Proceed to orderStatus.php
        window.location.href = "orderStatus.php";
    }
</script>

<!-- Add this modal to your HTML -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Proceeding</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to proceed to order status?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="proceedToOrderStatus()">Yes, Proceed</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>