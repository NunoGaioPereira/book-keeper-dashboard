<?php if(!isset($_SESSION["user_id"])) { header("Location: login.php"); } ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page ?> - Book Keeper</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
	<div id="cover"></div>
	<div id="nav-cover"></div>
	
	<div id="side-nav">
		<div class="logo">
			<a href="./"><img src="./imgs/logo.png"></a>
		</div>
		<ul>
			<a href="./" class="<?php if($page == 'Home'){echo 'active';} ?>"><img src="./imgs/home.png"></a>
			<a href="./books.php" class="<?php if($page == 'Books'){echo 'active';} ?>"><img src="./imgs/list.png"></a>
			<a href="./new_book.php" class="blah <?php if($page == 'New Book'){echo 'active';} ?>"><img src="./imgs/book_plus.png"></a>
			<a href="./notes.php" class="<?php if($page == 'Notes'){echo 'active';} ?>"><img src="./imgs/notes.png"></a>
			<!-- <a href="./settings.php" class="<?php if($page == 'Settings'){echo 'active';} ?>"><img src="./imgs/settings.png"></a> -->
		</ul>
		<form class="logout" action="./includes/logout.inc.php">
			<button><img src="./imgs/logout.png"></button>
		</form>
		<img id="hamb" src="./imgs/hamb.png">
	</div>
	<div id="mobile-nav">
		<img id="close-nav" src="./imgs/cross.png">
		<ul>
			<li><a href="./">Home</a></li>
			<li><a href="./books.php">Livros</a></li>
			<li><a href="./new_book.php">Novo Livro</a></li>
			<li><a href="./notes.php">Notas</a></li>
			<!-- <li><a href="./settings.php">Definições</a></li> -->
		</ul>
		<form action="./includes/logout.inc.php">
			<button>Logout</button>
		</form>
	</div>

<script type="text/javascript">
	var hamb = document.getElementById("hamb");
	hamb.addEventListener('click', function(){
		document.getElementById("mobile-nav").classList.toggle('open');
		document.getElementById("nav-cover").classList.toggle('open');
	});
	var nav_cover = document.getElementById("nav-cover");
	nav_cover.addEventListener('click', function(){
		document.getElementById("mobile-nav").classList.toggle('open');
		nav_cover.classList.toggle('open');
	});
	var nav_close = document.getElementById("close-nav");
	nav_close.addEventListener('click', function(){
		document.getElementById("mobile-nav").classList.toggle('open');
		document.getElementById("nav-cover").classList.toggle('open');
	});
</script>
