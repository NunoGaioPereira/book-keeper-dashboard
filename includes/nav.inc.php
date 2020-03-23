<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page ?> - Book Keeper</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
	<div id="cover"></div>
	
	<div id="side-nav">
		<div class="logo">
			<a href="./"><img src="./imgs/logo.png"></a>
		</div>
		<ul>
			<a href="./" class="<?php if($page == 'Home'){echo 'active';} ?>"><img src="./imgs/home.png"></a>
			<a href="./books.php" class="<?php if($page == 'Books'){echo 'active';} ?>"><img src="./imgs/list.png"></a>
			<a href="./new_book.php" class="blah <?php if($page == 'New Book'){echo 'active';} ?>"><img src="./imgs/book_plus.png"></a>
			<a href="./notes.php" class="<?php if($page == 'Notes'){echo 'active';} ?>"><img src="./imgs/notes.png"></a>
			<a href="./settings.php" class="<?php if($page == 'Settings'){echo 'active';} ?>"><img src="./imgs/settings.png"></a>
		</ul>
		<form class="logout" action="./includes/logout.inc.php">
			<button><img src="./imgs/logout.png"></button>
		</form>
	</div>
