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
					<!--// Format numeric date
					$dt = new DateTime($result['dateNum']);
					$dt = $dt->format('Y-m-d');-->
					<h4>Notas</h4>
					<div class="notes" id="notes-input" contenteditable="true"><?php echo $book['notes']?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace('editor')
	</script> -->
	<script>
		var notes = document.getElementById('notes-input');
		notes.addEventListener('focusout', function() {
			var notes_text = $(this).text();
			let params = new URLSearchParams(location.search);
			var book_id = params.get('book');
			$.ajax({
				url: "./includes/update_book.inc.php",
				type: "POST",
				cache: false,
				data: {'action': 'save_notes', 'book_id': book_id, 'notes': notes_text},
				success: function(msg){
					// alert(msg);
				},
			});
		});
	</script>
</body>
</html>