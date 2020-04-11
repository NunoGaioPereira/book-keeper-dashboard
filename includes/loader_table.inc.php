<?php 
session_start();
require ("./dbh.inc.php");

// if(isset($_POST['submit'])) {
if(isset($_POST['load_all_books'])) {
	$sql = "SELECT * FROM books WHERE userid = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $_SESSION['user_id']);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{	
		$result = $stmt->fetchAll();
		foreach($result as $row)
		{	
				// echo '<p>'.substr($row['notes'], 0, 400).'</p>';
				// echo '<a href="./booknotes.php?book='.$row['id'].'">Read More</a>';
			echo '<tr>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['author'].'</td>';
			echo '<td>'.$row['nationality'].'</td>';
			echo '<td>'.$row['gender'].'</td>';
			$dt = new DateTime($row['date_']);
			echo '<td>'.$dt->format('d-m-Y').'</td>';
			echo '<td class="actions">
					<a href="./booknotes.php?book='.$row['id'].'" title="Ver Livro"><img src="./imgs/eye.png"></a>
			 		<a href="#/"  data-id="'.$row['id'].'" data-role="delete" title="Apagar livro"><img src="./imgs/trash.png"></a>
				  </td>';
			echo '</tr>';
			// <a href="#/"><img src="./imgs/notes.png"></a>
		}
	}
	else {
		echo "<p>No results were found.</p>";
	}
}
else if(isset($_POST['search_key'])){
	$search = cleanInput($_POST['search_key']);
	// WHERE title LIKE '%$search%' AND lang = '$lang' OR dateText LIKE '%$search%' AND lang = '$lang' ORDER BY dateNum DESC
	$sql = "SELECT * FROM books WHERE userid = ? AND title LIKE '%$search%' OR userid = ? AND author LIKE '%$search%' OR userid = ? AND gender LIKE '%$search%' OR userid = ? AND nationality LIKE '%$search%'";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $_SESSION['user_id']);
	$stmt->bindParam(2, $_SESSION['user_id']);
	$stmt->bindParam(3, $_SESSION['user_id']);
	$stmt->bindParam(4, $_SESSION['user_id']);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{	
		$result = $stmt->fetchAll();
		foreach($result as $row)
		{	
			echo '<tr>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['author'].'</td>';
			echo '<td>'.$row['nationality'].'</td>';
			echo '<td>'.$row['gender'].'</td>';
			$dt = new DateTime($row['date_']);
			echo '<td>'.$dt->format('d-m-Y').'</td>';
			echo '<td class="actions">
					<a href="./booknotes.php?book='.$row['id'].'" title="Ver Livro"><img src="./imgs/eye.png"></a>
			 		<a href="#/"  data-id="'.$row['id'].'" data-role="delete" title="Apagar livro"><img src="./imgs/trash.png"></a>
				  </td>';
			echo '</tr>';
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