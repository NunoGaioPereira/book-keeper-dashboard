<?php 
	session_start();
	$page = "Notas Livro";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>
	<div class="main-wrapper">
		<h2>Notas Livro</h2>
		<p>Escreve.</p>

		<?php
			if(!isset($_GET['book'])) {
				header("Location: ./new_book.php");
				exit();
			}

			$book_id = $_GET['book'];
			$sql_latest_id = "SELECT * FROM books WHERE id = ?";
			$stmt = $conn->prepare($sql_latest_id);
			$stmt->bindParam(1, $book_id);
			$stmt->execute();
			$book = $stmt->fetch();
		?>
		<div class="booknotes">	
			<div class="top">
				<img src="<?php echo './imgs/books/'.$book['img'].''; ?>"/>
				<div class="book-info">
					<p><span>Título: </span><?php echo $book['title']?></p>
					<p><span>Autor: </span><?php echo $book['author']?></p>
					<p><span>Nacionalidade: </span><?php echo $book['nationality']?></p>
					<p><span>Gênero: </span><?php echo $book['gender']?></p>
					<p><span>Data: </span><?php echo $book['date_']?></p>
				</div>
			</div>
			<div class="notes-container">
				<h4>Notas</h4>
				<div class="notes" id="notes-input" contenteditable="true"><?php echo $book['notes']?></div>
			</div>
		</div>
	</div>
</body>
</html>