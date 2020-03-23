<?php 
	session_start();
	$page = "New Book";
	require ("includes/nav.inc.php");
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
				</div>

				<input type="submit" class="btn-submit" name="submit" value="Adicionar Livro">
			</form>
		</div>

		<div id="gender-popup">
			<div class="header">
				<h3>Novo Gênero</h3>
				<a href="#/" class="gender-popup-close" style="height: 18px;"><img src="./imgs/cross.png"></a>
			</div>
			<!-- <form method="POST"> -->
				<p class="success">Gênero adicionado!</p>
				<input type="text" id="new-gender-input" name="new-gender" placeholder="Novo Gênero">
				<?php echo '<input type="submit" name="submit-gender" class="submit-gender" value="Criar Gênero" data-id="'.$_SESSION['user_id'].'" data-role="add-gender">' ?>
				<!-- <input type="submit" class="submit-gender" value="Criar Gênero"> -->
			<!-- </form> -->
		</div>

	</div>

	<script src="js/main.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('click', '.submit-gender', function() {
				var user_id = $(this).data('id');
				var gender = $('#new-gender-input').val();
				if(gender == '') {
					alert("Inserir gênero");
					return false;
				}
				else {
					$.ajax({
						url: "./includes/add_gender.inc.php",
						type: "POST",
						cache: false,
						data: {'user_id': user_id, 'gender': gender},
						success: function(data){
							if(data == "e") {
								alert("Erro!");
							}
							else if (data == "s"){
								alert("Gênero criado!")
							}
							// $("#musicians-table").load("./includes/update_pieces.inc.php", {id: id, action: 'fill-musicians-table'});
						}
					})
				}
			});
		});
	</script>
</body>
</html>