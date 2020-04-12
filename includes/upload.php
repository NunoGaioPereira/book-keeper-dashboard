<?php
session_start();
require ("./dbh.inc.php");

if(isset($_POST["image"]))
{
	$data = $_POST["image"]; // receive cropped image

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);
	// $fileNameNew = $_SESSION['user_id']."_".$book_id.".png";
	$fileDestination = '../imgs/books/temp.png';
	file_put_contents($fileDestination, $data);

	echo '<img src="./imgs/books/temp.png" class="img-thumbnail" />';
}
?>