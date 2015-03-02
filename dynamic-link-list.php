<?php
  require 'config.php';
  $locations = mysqli_query($link, "SELECT * FROM Places");
  while ($row = mysqli_fetch_assoc($locations)) {
    $page_id = $row["db_page_id"];
    $name = $row["db_name"];
    $address = $row["db_address"];
    $nav .= "<li> <a href=\"$base_url/place_page.php?page=$page_id\">$name</a><br/>$address</li> ";
  }
?>
