<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['action'])) {
	if($_POST['action'] == "update-book") {

		try {
			$sql = "UPDATE books SET title = ?, author = ?, nationality = ?, gender = ?, date_ = ? WHERE id = ? AND userid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $_POST['title']);
			$stmt->bindParam(2, $_POST['author']);
			$stmt->bindParam(3, $_POST['nationality']);
			$stmt->bindParam(4, $_POST['gender']);
			$stmt->bindParam(5, $_POST['date']);
			$stmt->bindParam(6, $_POST['book_id']);
			$stmt->bindParam(7, $_SESSION['user_id']);
			$stmt->execute();
			unlink("../imgs/books/".$_SESSION['user_id']."_".$_POST['book_id'].".png");
			header("Location: ../booknotes.php?book=".$_POST['book_id']."");
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
	header("Location: ../new_book.php");
	exit();
}
?>