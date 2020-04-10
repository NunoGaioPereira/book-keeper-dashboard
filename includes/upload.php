<?php
session_start();
require ("./dbh.inc.php");

if(isset($_POST["image"]))
{
	$data = $_POST["image"]; // receive cropped image

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$sql_latest_id = "SELECT id FROM books ORDER BY id DESC LIMIT 1";
	$stmt = $conn->prepare($sql_latest_id);
	$stmt->execute();
	$book = $stmt->fetch();
	if($book) { 
		$book_id = $book['id'] + 1;
	}
	else {
		$book_id = 1;
	}
	$fileNameNew = $_SESSION['user_id']."_".$book_id.".png";
	$fileDestination = '../imgs/books/'.$fileNameNew;
	file_put_contents($fileDestination, $data);

	echo '<img src="./imgs/books/'.$fileNameNew.'" class="img-thumbnail" />';
}
?>