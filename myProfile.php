<?php
    include "customerProfileHeader.php";
?>
<div class="rightContainer">
    <div class="addressField"><h2>My Profile</h2></div>
        <div class="headerContainer">
            <div class="accountDetailsContainer">
                <div class="header">
                    <h4>Account Details</h4>
                    <div class="vl"></div>
                    <button><a href="">EDIT</a></button>
                </div>
                <div class="body_">
                    <p>Juan Dela Cruz</p>
                    <p>JuanDela@gmail.com</p>
                    <p>12345678901</p>
                </div>
            </div>
            <div class="defaultAddressContainer">
                <div class="header">
                        <h4>Default Address</h4>
                        <div class="vl"></div>
                        <button><a href="">EDIT</a></button>
                    </div>
                    <div class="body_">
                        <p>Block 1 Lot 1 Phase 1 Paliparan I Dasmarinas Cavity, City</p>
                    </div>
            </div>
        </div>
        <div class="bodyContainer">
            <div class="header_"><h3>Recent Orders</h3></div>
            <div class="table_container">
                <table action="" >
                  <thead>
                    <tr>
                      <th>Order No.</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>0001</td>
                      <td>2</td>
                      <td>P120.00</td>
                      <td>07-01-23</td>
                    </tr>
                  </tbody>
                  <?php
                          
                  ?>
                </table>
            </div>
        </div>
</div>
    
<?php
    include "customerProfileFooter.php";
?>