<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page ?> - Book Keeper</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="side-nav">
		<div class="logo">
			<a href=""><img src="./imgs/logo.png"></a>
		</div>
		<ul>
			<a href="./" class="<?php if($page == 'Home'){echo 'active';} ?>"><img src="./imgs/list.png"></a>
			<a href="#/" class="blah <?php if($page == 'TODO'){echo 'active';} ?>"><img src="./imgs/book_plus.png"></a>
			<a href="./day.php" class="<?php if($page == 'Day'){echo 'active';} ?>"><img src="./imgs/notes.png"></a>
			<a href="#/" class="logout <?php if($page == 'TODO'){echo 'active';} ?>"><img src="./imgs/settings.png"></a>
		</ul>
		<ul class="bottom-links">
			<a href="#/" class="apps"><img src="./includes/imgs/logout.png"></a>
		</ul>
	</div>