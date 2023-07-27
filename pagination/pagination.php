<?php
    // Display the "Next" button if there are more rows in the database
    $query_count = "SELECT COUNT(*) AS total FROM customer_account";
    $count_result = mysqli_query($conn, $query_count);
    $row_count = mysqli_fetch_assoc($count_result);
    $total_rows = $row_count['total'];
    $nextPage = $page + 1;

    if (($offset + $limit) >= $total_rows) {
        // No more rows to show on the next page
        echo '<tfoot><tr><td colspan="1"><div class="pagination disabled">Next</div></td></tr></tfoot>';
    } else {
        echo '<tfoot><tr><td colspan="1"><div class="pagination"><a href="?page=' . $nextPage . '">Next</a></div></td></tr></tfoot>';
    }
mysqli_close($conn); 
?>