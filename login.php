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
	<div class="login-form-container">
		<div class="login-header"><h3>Login</h3></div>
		<form  method="POST" action="includes/login.inc.php">
			<?php
				if(isset($_GET["error"])) {
					if($_GET["error"] == "emptyfields") {
						echo "<p class=\"error-msg\">Preenhce todos os campos pá!</p>";
					} else if($_GET["error"] == "wrongpwd") {
						echo "<p class=\"error-msg\">Você falhou, tente novamente!</p>";
					} else if($_GET["error"] == "loggedout") {
						echo "<p class=\"error-msg\">O senhor foi logged out da sua maravilhosa dashboard!</p>";
					} /*else if($_GET["error"] == "nomatch") {
						echo "<p class=\"error-msg\">As passwords não estão batendo certo!</p>";
					}*/
				}
			?>
			<input type="text" name="id" placeholder="Nome de Utilizador">
			<input type="password" name="pwd" placeholder="Password">
			<button  class="login-submit" type="submit" name="login-submit">Login</button>
		</form>    		
	</div>
</body>
</html>