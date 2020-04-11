<?php 
	session_start();
	$page = "Notes";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>
	<div class="main-wrapper">
		<h2>Notes</h2>
		<p>So you don't forget what you read</p>
		<input type="text" id="search-bar" placeholder="Pesquisar">
		<div class="notes-container"></div>
	</div>

	<script type="text/javascript">
		$(".notes-container").load("./includes/loader.inc.php", {load_all_notes: true});	
		$('#search-bar').keyup(function() {	
			var search = $(this).val();
			$(".notes-container").load("./includes/loader_notes.inc.php", {search_key: search});	
		});			
	</script>
</body>
</html>