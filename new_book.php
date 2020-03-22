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

				<input type="submit" class="btn-submit" value="Adicionar Livro">
			</form>
		</div>

		<div id="gender-popup">
			<div class="header">
				<h3>Novo Gênero</h3>
				<a href="#/" class="gender-popup-close" style="height: 18px;"><img src="./imgs/cross.png"></a>
			</div>
			<form>
				<p class="success">Gênero adicionado!</p>
				<input type="text" name="new-gender" placeholder="Novo Gênero">
				<input type="submit" name="" class="submit-gender" value="Criar Gênero">
			</form>
		</div>

	</div>

	<script src="js/main.js"></script>
</body>
</html>