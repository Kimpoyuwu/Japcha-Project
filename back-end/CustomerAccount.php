<?php
    include "adminHeader.php";
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    $CustomerData = new Signup();
    $customerData = $CustomerData->getCustomerData();
    $data = $customerData['data'];
    $page = $customerData['page'];
    $total_rows = $customerData['total_rows'];
    $limit = $customerData['limit'];

    $count = 1;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<style>
    .active-page {
        color: yellow !important;
    }
</style>

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
                    <!-- <th>Profile</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <?php
                            if(isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1){
                                echo'<th>Remove</th>';

                            }
                    ?>
                    
                  </tr>
                </thead>
                <tbody id="userTable">
                <?php
// Get customer data and pagination variables


// Check if there are customer accounts
if (empty($data)) {
    echo "<tr><td colspan='6'>No customer accounts found.</td></tr>";
} else {
    foreach ($data as $customer) {
        $id = $customer['customer_id'];
?>
        <tr>
            <td><?= $count ?></td>
            <!-- <td><img src='../image/user.jpg' alt='user image'></td> -->
            <td><?= $customer['username'] ?></td>
            <td><?= $customer['email'] ?></td>
            <td><?= $customer['customer_address'] ?></td>
            <td><?= $customer['contact_number'] ?></td>
            <?php
            if (isset($_SESSION["fileManagement_delete"]) && $_SESSION["fileManagement_delete"] == 1) {
            ?>
                <td><button class="btn btn-danger"><a style="text-decoration: none; color:#ffffff;" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></button></td>
            <?php
            }
            ?>
        </tr>
<?php
        $count++;
    }
}
?>

<!-- Pagination -->
<div class="pagination-container">
    <ul class="pagination">
        <?php
        // Check if there are previous pages
        $prevPage = $page - 1;
        $nextPage = $page + 1;
        
        // Disable and style "Previous" button if $page is less than or equal to 1
        // echo '<li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">';
        // echo '<a class="page-link" href="?page=' . ($page <= 1 ? 1 : $prevPage) . '">Previous</a>';
        // echo '</li>';
        
        // Display page numbers
        for ($i = 1; $i <= ceil($total_rows / $limit); $i++) {
            // Add the "active-page" class to the current page number when it's active
            $activeStyle = ($page == $i) ? 'style="background: #EBC749; color: black; border: 1px solid #EBC749;"' : '';

            echo '<li class="page-item"><a class="page-link" ' . $activeStyle . ' href="?page=' . $i . '">' . $i . '</a></li>';
            
        }

        // Disable and style "Next" button if there are no more next pages
        // echo '<li class="page-item ' . (($page * $limit) >= $total_rows ? 'disabled' : '') . '">';
        // echo '<a class="page-link" href="?page=' . (($page * $limit) >= $total_rows ? $page : $nextPage) . '">Next</a>';
        // echo '</li>';
        ?>
    </ul>
</div>


</tbody>
</table>
</section>

    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php
    include "adminFooter.php";

?>