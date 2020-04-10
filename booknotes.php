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
			// echo '<p>Título: '.$book['title'].'<p/>';
			// echo '<p>Autor: '.$book['author'].'<p/>';
			// echo '<p>Nacionalidade: '.$book['nationality'].'<p/>';
			// echo '<p>Gênero: '.$book['gender'].'<p/>';
			// echo '<p>Data: '.$book['date_'].'<p/>';
			// echo '<p>Notas: '.$book['notes'].'<p/>';
		?>
		<div class="booknotes">
			<h3></h3>
			<img src="<?php echo './imgs/books/'.$book['img'].''; ?>"/>
		</div>
	</div>
</body>
</html>