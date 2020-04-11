<?php 
	session_start();
	$page = "Notes";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>
	<div class="main-wrapper">
		<h2>Notes</h2>
		<p>So you don't forget what you read</p>
		<input type="text" id="search-bar" placeholder="Pesquisar">
		<div class="notes-container">
			<?php
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
						// echo '<img src="./imgs/books/'.$row['img'].'">';
						if(file_exists('./imgs/books/'.$row['img'])){
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
			?>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>