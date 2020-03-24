<?php 
	session_start();
	// require ("includes/dbh.inc.php");
if(isset($_POST['submit'])) {

	if($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 0) {
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
					// $fileNameNew = $_SESSION['user_id'].$book_id.".".$fileActuelExt;
					$fileNameNew = $_SESSION['user_id']."_".".".$fileActuelExt;
					$fileDestination = '../imgs/'.$fileNameNew;

					move_uploaded_file($fileTmpName, $fileDestination);
					header("Location: ../index.php?uploadsuccess");
				} else {
					header("Location: ../index.php?error=toobig");
				}
			} else {
				header("Location: ../index.php?error=uploaderror");
			}
		} else {
			header("Location: ../index.php?error=wrongtype");
		}
	} else {
		$imgName = "default.jpg";
		// echo $imgName;
	}

}
?>