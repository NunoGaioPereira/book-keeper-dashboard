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
			<div class="table-header">
				<table>
					<thead>
						<tr>
							<th>Título</th>
							<th>Autor</th>
							<th>Nacionalidade</th>
							<th>Gênero</th>
							<th>Data</th>
							<th width="100px">Acções</th>
							<!-- <th style="width: 10%">Data</th>
							<th style="width: 8%">Link</th>
							<th style="width: 9%; text-align: center;">Status</th>
							<th style="width: 5%; text-align: center;">Língua</th>
							<th style="width: 120px; text-align: center;">Acções</th> -->
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-content">
				<table>
					<tbody id="main-table">
						<tr>
							<td>O Estrangeiro</td>
							<td>Albert Camus</td>
							<td>Matutano</td>
							<td>Literatura</td>
							<td>2020</td>
							<td class="actions">
								<a href="#/"><img src="./imgs/eye.png"></a>
								<a href="#/"><img src="./imgs/notes.png"></a>
								<a href="#/"><img src="./imgs/trash.png"></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#main-table").load("./includes/loader_table.inc.php", {load_all_books: true});	
		$('#search-bar').keyup(function() {	
			var search = $(this).val();
			$("#main-table").load("./includes/loader_table.inc.php", {search_key: search});	
		});			
	</script>
</body>
</html>