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
			else if($_GET['book'] == '') {
				header("Location: ./new_book.php");
				exit();	
			}

			$book_id = $_GET['book'];
			$sql_latest_id = "SELECT * FROM books WHERE id = ?";
			$stmt = $conn->prepare($sql_latest_id);
			$stmt->bindParam(1, $book_id);
			$stmt->execute();
			$book = $stmt->fetch();
			// Non valid book (id)
			if(!$book) {
				header("Location: ./new_book.php");
				exit();		
			}
			$dt = new DateTime($book['date_']);
		?>
		<div class="booknotes">	
			<div class="top">
			<?php
				if(file_exists('./imgs/books/'.$book['img'])){
					echo '<img src="./imgs/books/'.$book['img'].'"/>';
				}
				else {
					echo '<img src="./imgs/books/default.png"/>';	
				}
			?>
				<div class="book-info">
					<p><span>Título: </span><?php echo $book['title']?></p>
					<p><span>Autor: </span><?php echo $book['author']?></p>
					<p><span>Nacionalidade: </span><?php echo $book['nationality']?></p>
					<p><span>Gênero: </span><?php echo $book['gender']?></p>
					<p><span>Data: </span><?php echo $dt->format('d-m-Y')?></p>
					<h4>Notas</h4>
					<div class="notes" id="notes-input" contenteditable="true"><?php echo $book['notes']?></div>
				</div>
			</div>
			<div class="book-actions">
				<ul>
					<!-- <li><a href="#/"><img src="./imgs/heart.png">Adicionar à Lista de Leitura</a></li> -->
					<li><a href="./edit_book.php?book=<?php echo $book['id'] ?>"><img src="./imgs/notes.png">Editar livro</a></li>
					<li><a href="#/" id="edit-cover"><img src="./imgs/pic.png">Editar capa</a></li>
					<li><a href="#/" id="delete-book"><img src="./imgs/trash.png">Apagar livro</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div id="uploadimageModal" class="modal" >
	  	<div class="modal-content">
	        <div class="modal-header">
	         	<h4 class="modal-title">Recortar Imagem</h4>
	         	<img src="./imgs/cross.png" id="close-modal">
	        </div>
        	<div id="image_demo" style="max-width:98%; margin-top:30px"></div>
       		<p><a class="crop_image">Upload</a></p>
	    </div>
	</div>
	<!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace('editor')
	</script> -->
	<link rel="stylesheet" type="text/css" href="./css/croppie.css">
	<script src="./js/croppie.js"></script>
	<script>
		function openModal() {
			var modal = document.getElementById("uploadimageModal");
			document.getElementById("cover").classList.toggle('open');
			modal.classList.toggle('show');
		}
		var edit_cover = document.getElementById("edit-cover");
		edit_cover.addEventListener('click', openModal());

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
				success: function(msg){ /* alert(msg); */}
			});
		});

		$('#delete-book').on('click', function() {
			let params = new URLSearchParams(location.search);
			var book_id = params.get('book');
			var confirmation = confirm('Tem a certeza que quer apagar o livro?');
			if(confirmation) {
				$.ajax({
					url: "./includes/delete_book.inc.php",
					type: "POST",
					cache: false,
					data: {'book_id': book_id, 'action': 'delete-book'},
					success: function(){
						alert("Livro apagado");
						window.location.replace("./books.php");
					}
				});
			}
		});
	</script>
</body>
</html>