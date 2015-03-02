<?php
require 'config.php';
$lowestLat = -999;
$highestLat = 999;
$lowestLng  = -999;
$highestLng = 999;
$city = greer;

$locations = mysqli_query($link, "SELECT * FROM Places WHERE db_cord_lat > '$lowestLat' and db_cord_lat < '$highestLat' and db_cord_lng > '$lowestLng' and db_cord_lng < '$highestLng'");
while ($row = mysqli_fetch_assoc($locations)) {
        $page_id = $row["db_page_id"];
        $name = $row["db_name"];
        $nav = " <a href=\"$base_url/place_page.php?page=$page_id\">$name</a> "; 
?>
            <h2 class="nav_link"><?php echo $nav ?></h2>
<?php
}
?>



SELECT * FROM Places WHERE db_cord_lat > '$lowestLat' and db_cord_lat < '$highestLat' and db_cord_lng > '$lowestLng' and db_cord_lng < '$highestLng'
