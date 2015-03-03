<?php
  $base_url = "/message_board";
  $siteTitle = "Sitting Spots";
  $slug = "Need a place to sit?";
  $link = mysqli_connect('localhost', 'wormse6_messboar', '**pass**', 'wormse6_oct2014mb');
  if (!$link) {
    die('Could not connect: ' . mysql_error());
  }
  $main_links = 
    '<li><a href="index.php">Home</a></li>
    <li><a href="find_place.php">Find a place</a></li>
    <li><a href="submit_a_place.php">Tell us your place</a></li>';
?>
