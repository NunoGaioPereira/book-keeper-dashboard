<?php
	$host = "localhost";
	$user = "root";
	$password = "nGlwwzfu4d5pdH2a";
	$dbname = "book_keeper";
	$dsn = "mysql:host=$host;dbname=$dbname";

	try	{
		// Connect to database
		$conn = new PDO($dsn, $user, $password);
		// set the PDO error mode to exception
   		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $exception) {
		echo("<p>Error: ");
		echo($exception->getMessage());
		echo("</p>");
		exit();
	}

	function cleanInput($input) { 
		$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);
		$output = preg_replace($search, '', $input);
		return $output;
	}	
?>