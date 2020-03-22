<?php 
	require('includes/dbh.inc.php');

	session_start();

	if(isset($_SESSION['userId'])) {
		if($_SESSION['userId'] == '316429') {
			header("Location: ./index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<title>Book Keeper Login</title>
</head>
<body>
	<div class="login-body">
		<div class="login-form-container">
			<!-- <div class="login-header"><h3>Login</h3></div> -->
			<img src="./imgs/logo.png">
			<h2 class="login-title">Book Keeper</h2>
			<form  method="POST" action="includes/login.inc.php">
				<?php
					if(isset($_GET["error"])) {
						if($_GET["error"] == "emptyfields") {
							echo "<p class=\"error-msg\">Preenhce todos os campos pá!</p>";
						} else if($_GET["error"] == "wrongpwd") {
							echo "<p class=\"error-msg\">Você falhou, tente novamente!</p>";
						} else if($_GET["error"] == "loggedout") {
							echo "<p class=\"error-msg\">Logout efectuado</p>";
						} else if($_GET["error"] == "nouser") {
							echo "<p class=\"error-msg\">Utilizador não encontrado</p>";
						}
					}
				?>
				<input type="text" name="id" placeholder="Nome de Utilizador">
				<input type="password" name="pwd" placeholder="Password">
				<button  class="login-btn" type="submit" name="login-submit">Sign in</button>
			</form>    		
		</div>
	</div>
</body>
</html>