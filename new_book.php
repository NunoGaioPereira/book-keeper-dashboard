<?php 
	session_start();
	$page = "New Book";
	require ("includes/nav.inc.php");
	echo '<h1>'.$_SESSION['user_id'].'</h1>'
?>
	<div class="main-wrapper">
		<h2>Adicionar Livro</h2>
		<p>Mais um para a coleção!</p>
		<div class="form-container">
			<form class="new-book" method="POST" action="./includes/upload.php" enctype="multipart/form-data">
				<label>Capa</label>
				<input type="file" name="image" accept="image/*" capture="user">

				<label>Título</label>
				<input type="text" name="title" placeholder="Título">

				<label>Autor</label>
				<input type="text" name="author" placeholder="Autor">

				<label>Nacionalidade</label>
				<input type="text" name="nationality" placeholder="Nacionalidade">

				<label>Data</label>
				<input type="text" name="gender" placeholder="Gênero">

				<div class="gender">
					<div class="gender-input">
						<label>Gênero</label>
						<select>
							<option>Fiction</option>
							<option>Non-Fiction</option>
							<option>Poesia</option>
							<option>Divulgação científica</option>
						</select>
						<a href="#/" class="add-gender">+</a>
					</div>
					<!-- <div class="add-gender">
						<div class="gender-fields">
							<label>Adicionar Gênero</label>
							<input type="text" name="new-gender" placeholder="Novo Gênero">
						</div>
						<input type="submit" name="" class="submit-gender" value="+">
					</div> -->
				</div>

				<input type="submit" class="btn-submit" name="submit" value="Adicionar Livro">
			</form>
		</div>

		<div id="gender-popup">
			<div class="header">
				<h3>Novo Gênero</h3>
				<a href="#/" class="gender-popup-close" style="height: 18px;"><img src="./imgs/cross.png"></a>
			</div>
			<form method="POST">
				<p class="success">Gênero adicionado!</p>
				<input type="text" name="new-gender" placeholder="Novo Gênero">
				<!-- <?php echo '<input type="text" name="new-gender" placeholder="Novo Gênero" data-id="'.$_SESSION['id'].' data-role="add-gender">' ?> -->
				<!-- echo "<td><a href=\"#/\" data-id=\"".$row['id']."\" data-pieceid=\"".$row['pieceId']."\" data-role=\"delete-piece\">Apagar</a></td>"; -->
				<input type="submit" name="" class="submit-gender" value="Criar Gênero">
			</form>
		</div>

	</div>

	<script src="js/main.js"></script>
	<script>
		// $(document).ready(function() {
		// 	$(document).on('click', 'input[data-role=add-gender]', function() {
		// 		var id = $(this).data('id');
		// 		var musicianId = $(this).data('musicianid');

		// 		var musician = $('#musician' + musicianId).text();

		// 		if(musician == '') {
		// 			alert("Inserir músico");
		// 			return false;
		// 		}
		// 		else {
		// 			$.ajax({
		// 				url: "./includes/update_pieces.inc.php",
		// 				type: "POST",
		// 				cache: false,
		// 				data: {'id': id, 'musicianId': musicianId, 'musician': musician, 'job': job, 'order': order, 'action': 'update-musician'},
		// 				success: function(){
		// 					alert("Músico actualizado");
		// 					$("#musicians-table").load("./includes/update_pieces.inc.php", {id: id, action: 'fill-musicians-table'});
		// 				}
		// 			})
		// 		}

		// 	});
		// };
	</script>
</body>
</html>