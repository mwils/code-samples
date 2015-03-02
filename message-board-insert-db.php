<?php
include 'config.php';

//recaptcha code
  require_once('recaptcha-php-1.11/recaptchalib.php');
  $privatekey = "6Le7_78SAAAAADeUxOCJLhyYU-vo-PyHD051nSCy";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
//end recaptcha

$name = mysqli_real_escape_string($link, $_POST['name']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$shortdesc = mysqli_real_escape_string($link, $_POST['short_description']);
$desc = mysqli_real_escape_string($link, $_POST['description']);
$cord_lat = mysqli_real_escape_string($link, $_POST['cord_lat']);
$cord_lng = mysqli_real_escape_string($link, $_POST['cord_lng']);
$type = mysqli_real_escape_string($link, $_POST['type']);

$sql="INSERT INTO Places (db_name, db_city, db_address, db_short_description, db_description, db_cord_lat, db_cord_lng, db_type) VALUES ('$name', '$city', '$address', '$shortdesc', '$desc', '$cord_lat', '$cord_lng', '$type')";

if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}
//sends to page after submitting
//echo "<script>window.location = 'success.php'</script>";
}
?>
