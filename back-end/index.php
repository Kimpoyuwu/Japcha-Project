<?php
    include "adminHeader.php";
?>
<main class="table">
        <section class="table_header">
            <h1>Customer Account</h1>
                <input type="search" class="search" id="live_search" placeholder="Search....">
        </section>
        <section class="table_body">
            <table action="Admin_user_management.php"  >
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Remove</th>
                    <th>Block</th>
                  </tr>
                </thead>
                <tbody id="userTable">
                    <?php
                        include "../adminDisplayResult/displayCustomerResult.php"; 
                    ?>
                </tbody>
                <?php
                        include "../pagination/pagination.php";
                ?>
              </table>
        </section>
    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php
    include "adminFooter.php";

?>