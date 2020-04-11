<?php 
session_start();
require ("./dbh.inc.php");

// if(isset($_POST['submit'])) {
if(isset($_POST['load_all_notes'])) {
	$sql = "SELECT * FROM books WHERE userid = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $_SESSION['user_id']);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{	
		$result = $stmt->fetchAll();
		foreach($result as $row)
		{	
			echo "<div class=\"book\">";
			if(file_exists('../imgs/books/'.$row['img'])){
				echo '<img src="./imgs/books/'.$row['img'].'"/>';
			}
			else {
				echo '<img src="./imgs/books/default.png"/>';	
			}
			echo '<div class="book-info">';
				echo '<div class="header">';
					echo '<h3>'.$row['title'].'</h3>';
					echo '<h4>'.$row['author'].'</h4>';
				echo '</div>';
				echo '<p>'.substr($row['notes'], 0, 400).'</p>';
				echo '<a href="./booknotes.php?book='.$row['id'].'">Read More</a>';
			echo '</div>';
			echo "</div>";
		}
	}
	else {
		echo "<p>No results were found.</p>";
	}
}
else if(isset($_POST['search_key'])){
	$search = cleanInput($_POST['search_key']);
	// WHERE title LIKE '%$search%' AND lang = '$lang' OR dateText LIKE '%$search%' AND lang = '$lang' ORDER BY dateNum DESC
	$sql = "SELECT * FROM books WHERE userid = ? AND title LIKE '%$search%' OR userid = ? AND author LIKE '%$search%'";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $_SESSION['user_id']);
	$stmt->bindParam(2, $_SESSION['user_id']);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{	
		$result = $stmt->fetchAll();
		foreach($result as $row)
		{	
			echo "<div class=\"book\">";
			// echo '<img src="./imgs/books/'.$row['img'].'">';
			if(file_exists('../imgs/books/'.$row['img'])){
				echo '<img src="./imgs/books/'.$row['img'].'"/>';
			}
			else {
				echo '<img src="./imgs/books/default.png"/>';	
			}
			echo '<div class="book-info">';
				echo '<div class="header">';
					echo '<h3>'.$row['title'].'</h3>';
					echo '<h4>'.$row['author'].'</h4>';
				echo '</div>';
				echo '<p>'.substr($row['notes'], 0, 400).'</p>';
				echo '<a href="./booknotes.php?book='.$row['id'].'">Read More</a>';
			echo '</div>';
			echo "</div>";
		}
	}
	else {
		echo "<p>No results were found.</p>";
	}
}
// }
else {
	header("Location: ../new_book.php");
	exit();
}
?>