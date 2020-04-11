<?php 
	session_start();
	$page = "Notes";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>
	<div class="main-wrapper">
		<h2>Notes</h2>
		<p>So you don't forget what you read</p>
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
						echo '<img src="./imgs/books/'.$row['img'].'">';
						echo '<div class="book-info">';
							echo '<div class="header">';
								echo '<h3>'.$row['title'].'</h3>';
								echo '<h4>'.$row['author'].'</h4>';
							echo '</div>';
							echo '<p>'.substr($row['notes'], 0, 200).'</p>';
							echo '<a href="">Read More</a>';
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