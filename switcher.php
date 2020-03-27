<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		body {
			font-family: 'Montserrat', sans-serif;
		}

		ul {
			list-style: none;
		}

		a {
			color: currentColor;
			text-decoration: none;
		}

		.navbar {
			height: 70px;
			width: 100%;
			background: black;
			color: white;
		}

		.navbar-nav {
			display: flex;
			align-items: center;
			justify-content: space-evenly;
			height: 100%;
		}

		header {
			padding: 1em;
			background-color: red;
			margin-bottom: 1em;
			padding-bottom: 3.5em;
			text-align: center;
			clip-path: polygon(50% 0%, 100% 0, 100% 65%, 50% 100%, 0 65%, 0 0);
		}

		.dropdown {
			position: absolute;
			width: 500px;
			opacity: 0;
			z-index: 2;
			background: blue;
			border-top: 2px solid white;

			border-bottom-right-radius: 8px;
			border-bottom-left-radius: 8px;

			display: flex;
			align-items: center;
			justify-content: space-around;
			height: 3em;
			margin-top: 2rem;
			padding: 0.5rem;

			box-shadow: rgba(2, 8, 20, 0.1) 0px 0.175rem 0.5em;
			transform: translateX(-40%);
			transition: opacity 0.15s ease-out;
		}

		.has-dropdown:focus-within .dropdown {
			opacity: 1;
			pointer-events: auto;
		}

		.dropdown-item a {
			width: 100%;
			height: 100%;
			size: 0.7rem;
			padding-left: 10px;
			font-weight: bold;
		}
		.dropdown-item a::before {
			content: ' ';
			border: 2px solid white;
			border-radius: 50%;
			width: 2rem;
			height: 2rem;
			display: inline-block;
			vertical-align: middle;
			margin-right: 10px;
		}

		:root {

		}

		.light {
			
		}

	</style>
</head>
<body class="light">
	<nav class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item">Home</li>
			<li class="nav-item">About</li>

			<li class="nav-item has-dropdown">
				<a href="#">Theme</a>
				<ul class="dropdown">
					<li class="dropdown-item">
						<a id="light" href="#">light</a>
					</li>
					<li class="dropdown-item">
						<a id="dark" href="#">dark</a>
					</li>
					<li class="dropdown-item">
						<a id="solar" href="#">solarize</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">Login</li>
		</ul>
	</nav>

	<header>
		<img src="logo.png" class="logo">
		<h1>Front-End Web Development, <br>Fired Up</h1>

		<p>FLutter, Firebase, Javascript</p>

	</header>

	<main>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</main>



	<script defer type="text/javascript">
</script>
</body>
</html>