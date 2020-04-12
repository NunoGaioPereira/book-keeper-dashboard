<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['submit'])) {
	if(empty($_POST['title']) || empty($_POST['author']) || empty($_POST['nationality']) || empty($_POST['book_date'])) {
		// header("Location: ../add_concert.php?error=emptyfields");
		header("Location: ../edit_book.php?book=".$_GET['book_id']."&error=emptyfields");
	}
	else {
		try {
			$sql = "UPDATE books SET title = ?, author = ?, nationality = ?, gender = ?, date_ = ? WHERE id = ? AND userid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $_POST['title']);
			$stmt->bindParam(2, $_POST['author']);
			$stmt->bindParam(3, $_POST['nationality']);
			$stmt->bindParam(4, $_POST['gender']);
			$dateNum = new DateTime($_POST['book_date']);
			$dateNum = $dateNum->format('Y-m-d');
			$stmt->bindParam(5, $dateNum);
			$stmt->bindParam(6, $_GET['book_id']);
			$stmt->bindParam(7, $_SESSION['user_id']);
			$stmt->execute();
			header("Location: ../booknotes.php?book=".$_GET['book_id']."&edit=success");
			$conn = null;
			exit();
		}
		catch(PDOException $e){
			throw $e;
			exit();
		}
	}
}
else {
	// header("Location: ../new_book.php");
	echo "trouble";
	exit();
}
?>