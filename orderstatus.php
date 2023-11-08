<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <?php include "c_header.php"; ?>
    <style>
       .container {
    height: auto;
    width: 100%;
    padding-left: 180px;
    margin-top: 130px;
    /* margin-left: 170px; */
    }

    .card-img-top {
        border: 2px solid gray;
        max-width: 100px;
        max-height: 100px;
        background-color: #D0BC05;
    }

    .nav-item {
        margin-right: 20px;
        font-weight: bold;
        font-size: 25px;
    }

    .terms {
        margin-top: 90px;
        text-align: center;
    }

    .table {
        margin-top: 20px;
        text-align: center;
        
    }

    .nav-item {
        text-align: center;
        position: relative;
        color: black;
        padding: 20px 4px;
        max-width: 300%;
    }

    .nav-item::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 10;
        width: 100%;
        height: 5%;
        background: linear-gradient(transparent, black);
        z-index: -1;
        transition: 0.2s;
        transform: scaleY(0);
        border-bottom: 4px solid !important;
    }
    
    .nav-item.active::before {
        transform: scaleY(1);
    }


    .nav.nav-fill {
    width: 280px; 
    }

    .nav-item.nav-link {
        width: 140px; 
    }

    .tab-pane {
        display: flex;
        justify-content: center;
        width: 100%; 
    }
   
    td.center-content{
        vertical-align: middle !important;
    }
    </style>
    <div class="container text-center">
     <div class="orderbar">
        <div class="row">
            <ul class="nav nav-tab justify-content-center ">

                <li class="nav-item  " style="margin-right: 20px ">
                    <a class="nav-item nav-link active" id="nav-Pending-tab" data-toggle="tab" href="#nav-Pending" role="tab" aria-controls="nav-Pending" aria-selected="true">Pending</a>
                </li>

                <li class="nav-item  " style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-Prepairing-tab" data-toggle="tab" href="#nav-Prepairing" role="tab" aria-controls="nav-Prepairing" aria-selected="true">Preparing</a>
                </li>

                <li class="nav-item "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToShip-tab" data-toggle="tab" href="#nav-ToShip" role="tab" aria-controls="nav-ToShip" aria-selected="false">To Ship</a>
                </li>

                <li class="nav-item "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToReceive-tab" data-toggle="tab" href="#nav-ToReceive" role="tab" aria-controls="nav-ToReceive" aria-selected="false">To Receive</a>
                </li>

                <li class="nav-item  "  style="margin-right: 20px ">
                    <a class="nav-item nav-link" id="nav-ToReview-tab" data-toggle="tab" href="#nav-ToReview" role="tab" aria-controls="nav-ToReview" aria-selected="false">Completed</a>
                </li>

                    </ul>
                    </div>
                </div>
            </div>
        <div class="tab-content justify-content-center " id="nav-tabContent">


        <div class="tab-pane fade show active" id="nav-Pending" role="tabpanel" aria-labelledby="nav-Pending-tab">
                <table class="table">
                    <div class="d-flex justify-content-center">ORDER NO. <span></span></div>
                    <thead>
                      <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                        </tr>
                    </thead>
                     <tbody>
                     <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                                        <td class="center-content">Sample</td>
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
                                        <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                                    </tr>
                    </tbody>
                </table>
            </div>


                            <div class="tab-pane fade" id="nav-Prepairing" role="tabpanel" aria-labelledby="nav-Prepairing-tab">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                                        <td class="center-content">#00001</td>
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
                                        <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap "></td>
                                        <td class="center-content">#00002</td>
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
                            <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                                <div class="tab-pane fade" id="nav-ToShip" role="tabpanel" aria-labelledby="nav-ToShip-tab">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                                        <td class="center-content">#00001</td>
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
                                        <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                                    </tr>
                    </tbody>
                </table>
					</div>
					<div class="tab-pane fade" id="nav-ToReceive" role="tabpanel" aria-labelledby="nav-ToReceive-tab">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                                        <td class="center-content">#00001</td>
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
                                        <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                                    </tr>
                                   
                    </tbody>
                </table>
					</div>
					<div class="tab-pane fade" id="nav-ToReview" role="tabpanel" aria-labelledby="nav-ToReview-tab">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Item Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center-content"><img class="card-img-top" src="image/Mango-shake.png" alt="Card image cap" style=""></td>
                                        <td class="center-content">#00001</td>
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
                                        <td class="center-content"> <button type="button" class="btn" data-toggle="modal" data-target="#addCouponModal">Cancel</button></td>
                                    </tr>
                                  
                    </tbody>
                </table>
	</div>
	</div>
    </div>
    </div>
    </div>
    

    <div class="terms">
    <p>If you wish to cancel an order Please Read our Cancellation</p> <br>
    <a href="#">Terms & Condition</a>
    <br>
  </div>
  <div class="terms">
  
  </div>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include "c_footer.php"; ?>

