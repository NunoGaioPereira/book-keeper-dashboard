<?php 
	session_start();
	$page = "Notes";
	require ("includes/nav.inc.php");
?>
	<div class="main-wrapper">
		<h2>Notes</h2>
		<p>So you don't forget what you read</p>
		<div class="notes-container">
			<div class="book">
				<img src="./imgs/catcher.png">
				<div class="book-info">
					<div class="header">
						<h3>Catcher in The Rye (PT)</h3>
						<h4>J. D. Salinger</h4>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<a href="">Read More</a>
				</div>
			</div>
			<div class="book">
				<img src="./imgs/adeus_as_armas.jpg">
				<div class="book-info">
					<div class="header">
						<h3>Adeus às Armas</h3>
						<h4>Hernest Hemingway</h4>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<a href="">Read More</a>
				</div>
			</div>
			<div class="book">
				<img src="./imgs/estrangeiro.jpg">
				<div class="book-info">
					<div class="header">
						<h3>O Estrangeiro</h3>
						<h4>Albert Camus</h4>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<a href="">Read More</a>
				</div>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>