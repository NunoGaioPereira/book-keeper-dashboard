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
			color: var(--text);
			background: var(--bg);
			transition: background 500ms ease-in-out, colos 1000ms ease-in-out;
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
			background: var(--bg-nav);
    color: var(--text);
		}

		.navbar-nav {
			display: flex;
			align-items: center;
			justify-content: space-evenly;
			height: 100%;
		}

		header {
			padding: 1em;
			background: var(--bg-nav);
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
			background: var(--bg-dropdown);
    border-top: 2px solid var(--border-color);

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
			border: 2px solid var(--border-color);
			border-radius: 50%;
			width: 2rem;
			height: 2rem;
			display: inline-block;
			vertical-align: middle;
			margin-right: 10px;
		}

		:root {
			--gray0: #f8f8f8;
			--gray1: #dbe1e8;
			--gray2: #b2becd;
			--gray3: #6c7983;
			--gray4: #454e56;
			--gray5: #2a2e35;
			--gray6: #12181b;
			--blue: #0084a5;
			--purple: #a82dd1;
			--yellow: #fff565;
		}

		.light {
		    --bg: var(--gray0);
		    --bg-nav: linear-gradient(to right, var(--gray1), var(--gray3));
		    --bg-dropdown: var(--gray0);
		    --text: var(--gray6);
		    --border-color: var(--blue);
		    --bg-solar: var(--yellow);
		}
		  

		.dark {
		    --bg: var(--gray5);
		    --bg-nav: linear-gradient(to right, var(--gray5), var(--gray6));
		    --bg-dropdown: var(--gray6);
		    --text: var(--gray0);
		    --border-color: var(--purple);
		    --bg-solar: var(--blue);
		}

		.solar {
		    --gray0: #fbffd4;
		    --gray1: #f7f8d0;
		    --gray2: #b6f880;
		    --gray3: #5ec72d;
		    --gray4: #3ea565;
		    --gray5: #005368;
		    --gray6: #003d4c;
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
		const darkButton = document.getElementById('dark');
		const lightButton = document.getElementById('light');
		const solarButton = document.getElementById('solar');
		const body = document.body;

		// Apply cached theme on reload
		const theme = localStorage.getItem('theme');
		const isSolar = localStorage.getItem('isSolar');

		if (theme) {
		  body.classList.add(theme);
		  isSolar && body.classList.add('solar');
		}


		darkButton.onclick = () => {
			// body.classList.remove('light');
			// body.classList.add('dark');
			body.classList.replace('light', 'dark');
			localStorage.setItem('theme', 'dark');
		};

		lightButton.onclick = () => {
			body.classList.replace('dark', 'light');
			localStorage.setItem('theme', 'light');	
		};	

		solarButton.onclick = () => {
			 if (body.classList.contains('solar')) {
			 	body.classList.remove('solar'); 
			 	solarButton.style.cssText = `
			 		--bg-solar: var(--yellow);
			 	`
			 	solarButton.innerText = 'solarize';
			 	localStorage.removeItem('isSolar');
			 } else {
			 	solarButton.style.cssText = `
			 		--bg-solar: white;
			 	`
			 	body.classList.add('solar'); 
			 	solarButton.innerText = 'normalize';

			 	localStorage.setItem('isSolar', true);	
			 }
		};
	</script>
</body>
</html>