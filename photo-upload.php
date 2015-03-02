<?php
include 'config.php';
$random = rand();
$target_dir = "images/";
$target_file = basename($_FILES["uploadFile"]["name"]);
$uploadOk=0;
$filename = $random . $target_file;
$filesize = filesize($_FILES["uploadFile"]["tmp_name"]);
$filetype = end(explode('.', $_FILES["uploadFile"]["name"]));

switch ($filetype) {
	case "jpg":
	case "JPG":
	case "gif":
	case "GIF":
	case "png":
	case "PNG":
	case "jpeg":
	case "JPEG":
		$uploadOk = 1;
		}

if ($filesize > 2000000) {
    echo "Sorry, your file is too large 2MB limit";
    $uploadOk = 0;
}



if ($uploadOk ==0) {
    echo "Sorry, your file was not uploaded. Allowed filetypes jpg, png, gif, jpeg";
// if everything is ok, try to upload file
    } else { 
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir . $filename)) {
        echo "The file ". $target_dir . $filename . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


	$page = mysqli_real_escape_string($link, $_POST['page_num']);
	$img_url = mysqli_real_escape_string($link, $target_dir . $filename);
	$sql="INSERT INTO images (db_page_id, url) VALUES ('$page', '$img_url')";

	if (!mysqli_query($link,$sql)) {
	  die('Error: ' . mysqli_error($link));
	}
	//sends to page after submitting
	echo "<script>window.location = 'place_page.php?page=$page'</script>";

}

?>
