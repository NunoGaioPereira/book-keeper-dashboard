<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['action'])) {
	if($_POST['action'] == "delete-book") {

		try {
			$book_id = $_POST['book_id'];

			$sql = "DELETE FROM books WHERE id = ? AND userid = ?";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $book_id);
			$stmt->bindParam(2, $_SESSION['user_id']);
			$stmt->execute();
			unlink("../imgs/books/".$_SESSION['user_id']."_".$book_id.".png");
			header("Location: ../notes.php?msg=deletedbook");
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