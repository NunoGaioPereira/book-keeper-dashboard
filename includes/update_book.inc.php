<?php 
session_start();
require ("./dbh.inc.php");

if(isset($_POST['action'])) {
	if($_POST['action'] == 'save_notes') {
		try {
			$notes = cleanInput($_POST['notes']);
			$book_id = cleanInput($_POST['book_id']);
			$user_id = $_SESSION['user_id'];

			$sql = "UPDATE books SET notes = ? WHERE id = ? and userid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $notes);
			$stmt->bindParam(2, $book_id);
			$stmt->bindParam(3, $user_id);
			$stmt->execute();
		}
		catch(PDOException $e){
			// header("Location: ../new_book.php?create=error");
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