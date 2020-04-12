<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['submit'])) {

	if(empty($_POST['title']) || empty($_POST['author']) || empty($_POST['nationality']) || empty($_POST['book_date'])) {
		// header("Location: ../add_concert.php?error=emptyfields");
		header("Location: ../new_book.php?error=emptyfields&title=".$_POST['title']."&author=".$_POST['author']."&nationality=".$_POST['nationality']."&book_date=".$_POST['book_date']."");
	}
	else {
		// Handle image field
		if($_FILES['upload_image']['size'] != 0 && $_FILES['upload_image']['error'] == 0) {
			$file  = $_FILES['upload_image'];

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
						try {
							$title = cleanInput($_POST['title']);
							$author = cleanInput($_POST['author']);
							$nationality = cleanInput($_POST['nationality']);
							$date = cleanInput($_POST['book_date']);
							$gender = cleanInput($_POST['gender']);
							$userId = cleanInput($_POST['userId']);
							$default = "default.png";

							$sql = "INSERT INTO books(userid, title, author, nationality, gender, date_, img) VALUES(?, ?, ?, ?, ?, ?, ?)";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(1, $userId);
							$stmt->bindParam(2, $title);
							$stmt->bindParam(3, $author);
							$stmt->bindParam(4, $nationality);
							$stmt->bindParam(5, $gender);
							$stmt->bindParam(6, $date);
							$stmt->bindParam(7, $default);
							$stmt->execute();

							// Get largest book id
							$sql_latest_id = "SELECT id FROM books ORDER BY id DESC LIMIT 1";
							$stmt = $conn->prepare($sql_latest_id);
							$stmt->execute();
							$book = $stmt->fetch();
							if($book) { $book_id = $book['id'];	}
							else { $book_id = 1; }
							$fileNameNew = $_SESSION['user_id']."_".$book_id.".png";
							// $fileNameNew = $_SESSION['user_id']."_".".".$fileActuelExt;
							// $fileDestination = '../imgs/books/'.$fileNameNew;
							// move_uploaded_file($fileTmpName, $fileDestination);

							$sql = "UPDATE books SET img = ? WHERE id = ? AND userid = ?";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(1, $fileNameNew);
							$stmt->bindParam(2, $book_id);
							$stmt->bindParam(3, $userId);
							$stmt->execute();
							rename('../imgs/books/temp.png', '../imgs/books/'.$fileNameNew.'');
							header("Location: ../booknotes.php?book=".$book_id."");
						}
						catch(PDOException $e){
							header("Location: ../new_book.php?create=error".$e."");
							throw $e;
							exit();
						}
					} else {
						header("Location: ../new_book.php?error=toobig");
					}
				} else {
					header("Location: ../new_book.php?error=uploaderror");
				}
			} else {
				header("Location: ../new_book.php?error=wrongtype");
			}
		}
		else {
			try {
				$title = cleanInput($_POST['title']);
				$author = cleanInput($_POST['author']);
				$nationality = cleanInput($_POST['nationality']);
				$date = cleanInput($_POST['book_date']);
				$gender = cleanInput($_POST['gender']);
				$userId = cleanInput($_POST['userId']);
				$default = "default.png";

				$sql = "INSERT INTO books(userid, title, author, nationality, gender, date_, img) VALUES(?, ?, ?, ?, ?, ?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(1, $userId);
				$stmt->bindParam(2, $title);
				$stmt->bindParam(3, $author);
				$stmt->bindParam(4, $nationality);
				$stmt->bindParam(5, $gender);
				$stmt->bindParam(6, $date);
				$stmt->bindParam(7, $default);
				$stmt->execute();

				// Get largest book id
				$sql_latest_id = "SELECT id FROM books ORDER BY id DESC LIMIT 1";
				$stmt = $conn->prepare($sql_latest_id);
				$stmt->execute();
				$book = $stmt->fetch();
				if($book) { 
					$book_id = $book['id'];
				}
				else {
					$book_id = 1;
				}
				// $fileNameNew = $_SESSION['user_id']."_".$book_id.".png";
				// // $fileNameNew = $_SESSION['user_id']."_".".".$fileActuelExt;
				// $fileDestination = '../imgs/books/'.$fileNameNew;
				// move_uploaded_file($fileTmpName, $fileDestination);

				/*$file_name = 'temp.png';
				$path_user = '../imgs/books/'.$file_name.'';

				if (!file_exists($path_user.$file_name)) 
				{                   
					
				} else {
				  unlink($path_user.$file_name);
				}*/

				header("Location: ../booknotes.php?book=".$book_id."");
			}
			catch(PDOException $e){
				header("Location: ../new_book.php?create=error");
				throw $e;
				exit();
			}
		}
	}
}
else {
	header("Location: ../new_book.php");
	exit();
}
?>