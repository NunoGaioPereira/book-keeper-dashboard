<?php 
	session_start();
	$page = "New Book";
	require ("includes/nav.inc.php");
?>
	<div class="main-wrapper">
		<h2>New Book</h2>
		<p>One More For The Collection</p>
		<div class="form-container">
			<form class="new-book" method="POST">
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
					</div>
					<div class="add-gender">
						<label>Adicionar Gênero</label>
						<input type="text" name="new-gender" placeholder="Novo Gênero">
							
					</div>
				</div>

				<input type="submit" class="btn-submit" value="Adicionar Livro">
			</form>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>