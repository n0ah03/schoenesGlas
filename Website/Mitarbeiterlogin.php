<!DOCTYPE html>
<html lang="de">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mitarbeiter Login</title>
	
	<link rel="stylesheet" href="CSS/style.css">

</head>

<body>
	<main>
		<header>
			<a class="logo" href="index.html"><img src="Bilder\Logo.png" title="zur Startseite" height="71px" width="255px"></a>
		</header>
 
	<nav>
		<li>
			<div class="dropdown">
				<button class="dropbtn"><a href="Überuns.html" title="Über uns">Über uns</a></button>
			</div>
		</li>

		<li>
		<div class="dropdown">
		<button class="dropbtn"> <a href="Produkte.html" title="Produkte">Produkte</a></button>
			<div class="dropdown-content">
				<a href="./produkte.html#damenbrillen">Damenbrillen</a>
				<a href="./produkte.html#herrenbrillen">Herrenbrillen</a>
				<a href="./produkte.html#sonnenbrillen">Sonnenbrillen</a>
				<a href="./produkte.html#sportbrillen">Sportbrillen</a>
				<a href="./produkte.html#kontaktlinsen">Kontaktlinsen</a>
			</div>
		</div>
		</li>								
		
		<li>
		<div class="dropdown">
			<button class="dropbtn"> <a href="Dienstleistungen.html" title="Dienstleistungen">Dienstleistungen</a></button>
				<div class="dropdown-content">
				<a href="#">Augenmessung</a>
				<a href="#">Beratung</a>
				<a href="#">Kundenservice</a>
			</div>
		</div>
		</li>
		
		<li>
		<div class="dropdown">
			<button class="dropbtn"> <a href="Standorte.html" title="Standorte">Standorte</a></button>
				<div class="dropdown-content">
				<a href="#">Tettnang</a>
				<a href="#">Ravensburg</a>
				<a href="#">Friedrichshafen</a>
			</div>
		</li>
		<li>
			<div class="dropdown">
				<button class="dropbtn"> <a href="Kontaktformular.html" title="Kontaktformular">Kontaktformular</a></button>
			</div>
		</li>
	</nav>
 
	<section id="mitarbeiterlogin">
		<h1>Mitarbeiter Login</h1>
			<article>
			<form method="post" action="loginValidation.php">
				Nutzername: <input type="text" class="nutzername" name="nutzername" id="nutzermargin"><br><br>
				Passwort: <input type="password" class="passwort" name="passwort" id="passwortmargin"><br><br>
				<input type="submit" value="Bestätigen">
			</form> 
		<p style="color: red">
			<?php
				
				session_start();
				
	
				
				if (!empty($_SESSION['error'])) {		//prüfen ob man eine error ausgabe braucht!										
					echo $_SESSION['error']; 
					session_unset();	//Error Nachricht ausgeben!	
				}	
			
			?>
		</p>
		</article>
	</section>
	
	</main>   
</body>
</html>
