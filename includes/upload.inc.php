<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['submit'])) {

    // Handle image field
	if($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0) {
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
					header("Location: ../new_book.php?uploadsuccess");
				} else {
					header("Location: ../new_book.php?error=toobig");
				}
			} else {
				header("Location: ../new_book.php?error=uploaderror");
			}
		} else {
			header("Location: ../new_book.php?error=wrongtype");
		}
	} else {
		$imgName = "default.jpg";
	}

	if(empty($_POST['title']) || empty($_POST['author']) || empty($_POST['nationality']) || empty($_POST['book_date'])) {
		// header("Location: ../add_concert.php?error=emptyfields");
		header("Location: ../new_book.php?error=emptyfields&title=".$_POST['title']."&author=".$_POST['author']."&nationality=".$_POST['nationality']."&book_date=".$_POST['book_date']."");
	}
	else {
		try {
			$title = cleanInput($_POST['title']);
			$author = cleanInput($_POST['author']);
			$nationality = cleanInput($_POST['nationality']);
			$date = cleanInput($_POST['book_date']);
			$gender = cleanInput($_POST['gender']);
			$userId = cleanInput($_POST['userId']);

			$sql = "INSERT INTO books(userid, title, author, nationality, gender, date_) VALUES(?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $userId);
			$stmt->bindParam(2, $title);
			$stmt->bindParam(3, $author);
			$stmt->bindParam(4, $nationality);
			$stmt->bindParam(5, $gender);
			$stmt->bindParam(6, $date_);
			// $stmt->execute();
		}
		catch(PDOException $e){
			header("Location: ../add_concert.php?create=error");
			// $conn->rollback();
			throw $e;
			exit();
		}
	}

}
else {
	header("Location: ../new_book.php");
	exit();
}
?>