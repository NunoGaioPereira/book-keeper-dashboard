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
				<div>
					<h3>Catcher in The Rye</h3>
					<h4>J. D. Salinger</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="">Read More</a>
				</div>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>