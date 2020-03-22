<?php 
	// session_start();
	// require ("includes/dbh.inc.php");
if(isset($_POST['submit'])) {
	$file  = $_FILES['image'];

	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode(".", $fileName);
	$fileActuelExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActuelExt, $allowed)) {
		if($fileError === 0){
			if($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActuelExt;
				$fileDestination = '../imgs/'.$fileNameNew;

				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: ../index.php?uploadsuccess");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "Error uploading file!";
		}
	} else {
		echo "You cannot uploads files of this type!";
	}
}
?>