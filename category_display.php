<?php
include 'dbconfig.php';

$sql1 = "SELECT * FROM category";

// Execute the query
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    echo "<ul style='list-style: none;'>";
    while ($row1 = mysqli_fetch_assoc($result1)) {
        echo "<li><a style='text-decoration:none' class='' href='get_job.php?category_id={$row1['category_id']}'>{$row1['category_name']}</a></li><hr>";
    }
    echo "<li><a style='text-decoration:none' class='' href='get_job.php?show_all=all'>Show All</a></li>";

    echo "</ul>";
}
?>
