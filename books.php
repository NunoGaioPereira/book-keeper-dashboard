<?php 
	session_start();
	$page = "Books";
	require ("includes/nav.inc.php");
?>
	<div class="main-wrapper">
		<h2>Books</h2>
		<p>Your Book Collection</p>

		<div class="table-container">
			<div class="header">
				<input type="text" id="search-bar" placeholder="Pesquisar">
			</div>
			<div id="books-container">
				<!-- <div class="book-row">
					<span class="icon"><img src="./imgs/book.png"></span>
					<p class="title">O livro sem nome</p>
					<p class="author">Herman Hesse</p>
					<p class="gender">Romance</p>
					<p class="date">10-03-2059</p>
					<div class="actions">
						<a title="Ver Livro"><img src="./imgs/eye.png"></a>
						<a title="Ver Livro"><img src="./imgs/trash.png"></a>
					</div>
				</div> -->
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#books-container").load("./includes/loader_table.inc.php", {load_all_books: true});	
		$('#search-bar').keyup(function() {	
			var search = $(this).val();
			$("#books-container").load("./includes/loader_table.inc.php", {search_key: search});	
		});		

		$(document).on('click', 'a[data-role=delete]', function() {			
			var book_id = $(this).data('id') ;
			var confirmation = confirm('Tem a certeza que quer apagar o livro?');
			if(confirmation) {
				$.ajax({
					url: "./includes/delete_book.inc.php",
					type: "POST",
					cache: false,
					data: {'book_id': book_id, 'action': 'delete-book'},
					success: function(){
						alert("Livro apagado");
						$("#books-container").load("./includes/loader_table.inc.php", {load_all_books: true});	
					}
				});
			}
		});	
	</script>
</body>
</html>