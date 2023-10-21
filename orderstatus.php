    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php include "c_header.php"; ?>
    <style>
       .container {
    height: auto;
    width: 100%;
    padding-left: 280px;
    margin-top: 130px;
    margin-left: 170px;
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
        text-align: center;
    }

    .table {
        margin-top: 50px;
        text-align: center;
    }

    .nav-item {
      padding-left: 40px;
        padding-right: 40px;
        padding: 40px 0;
    }

    .nav-item {
        position: relative;
        color: black;
    }

    .nav-item::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 10%;
        background: linear-gradient(transparent, transparent, black);
        z-index: -1;
        transition: transform 0.2s;
        transform: scaleY(0);
    }

    .nav-item:active::before,
    .nav-item.active::before {
        transform: scaleY(1);
    }

    .nav {
        border-bottom: 2px solid #000;
        color: black;
    }        

    /* Dagdag na CSS para panatilihin ang hover effect ng tab */
    #tabs .nav-tabs .nav-item.show .nav-link:hover,
    #tabs .nav-tabs .nav-link.active:hover {
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        font-weight: bold;
    }


    #tabs .nav-tabs .nav-link:hover {
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        font-weight: bold;
    }

    </style>
    <div class="container">
    <div class="orderbar">
    <div class="row">
    <ul class="nav nav-fill">
    <li class="nav-item">
        <a href="#" class="nav-link text-primary" id="preparingBtn">Preparing</a>
          </li>
        <li class="nav-item">
        <a href="#" class="nav-link text-primary" id="shippingBtn">To Ship</a>
          </li>
          <li class="nav-item">
        <a href="#" class="nav-link text-primary" id="shippingBtn">To Receive</a>
          </li>
        <li class="nav-item">
        <a href="#" class="nav-link text-primary" id="shippingBtn">To Review</a>
          </li>
        </ul>
            </div>
          </div>
    </div>

    <!-- Modal -->
    <div class="orderlist" id="preparingOrders">
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


    <div class="terms">
    <p>If you wish to cancel an order Please Read our Cancellation</p> <br>
    <a href="#">Terms & Condition</a>
  </div>

  <script>
    const preparingBtn = document.getElementById("preparingBtn");
    const shippingBtn = document.getElementById("shippingBtn");
    const receivingBtn = document.getElementById("receivingBtn");
    const reviewBtn = document.getElementById("reviewBtn");
    const returnBtn = document.getElementById("returnBtn");

    const preparingTable = document.getElementById("preparingTable");
    const shippingTable = document.getElementById("shippingTable");
    const receivingTable = document.getElementById("receivingTable");
    const reviewTable = document.getElementById("reviewTable");
    const returnTable = document.getElementById("returnTable");

    function showTable(section) {
        preparingTable.style.display = "none";
        shippingTable.style.display = "none";
        receivingTable.style.display = "none";
        reviewTable.style.display = "none";
        returnTable.style.display = "none";

        if (section === 'preparing') {
            preparingTable.style.display = "block";
        } else if (section === 'shipping') {
            shippingTable.style.display = "block";
        } else if (section === 'receiving') {
            receivingTable.style.display = "block";
        } else if (section === 'review') {
            reviewTable.style.display = "block";
        } else if (section === 'return') {
            returnTable.style.display = "block";
        }
    }

    preparingBtn.addEventListener("click", () => {
        showTable('preparing');
    });

    shippingBtn.addEventListener("click", () => {
        showTable('shipping');
    });

    receivingBtn.addEventListener("click", () => {
        showTable('receiving');
    });

    reviewBtn.addEventListener("click", () => {
        showTable('review');
    });

    returnBtn.addEventListener("click", () => {
        showTable('return');
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include "c_footer.php"; ?>

