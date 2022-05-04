<!DOCTYPE html>
<html lang="de">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Interner Bereich</title>
	
	<link rel="stylesheet" href="CSS/style.css">

</head>

<body>
	<main>
		<header>
			<a class="logo" href="Startseite.html"><img src="Bilder\Logo.png" title="zur Startseite" height="71px" width="255px"></a>
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
				<a href="#">Frauenbrillen</a>
				<a href="#">Herrenbrillen</a>
				<a href="#">Sonnenbrillen</a>
				<a href="#">Sportbrillen</a>
				<a href="#">Kontaktlinsen</a>
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
 
	<section>
		<h1>Wilkommen im Internen Bereich von SchönesGlas</h1>		
		<article id="termine">		
			<p><a class="fotoschrift">Aktuelle Termine</a></p>
		</article>
		<article id="farbverlauf">		
			<p><a class="fotoschrift">Abwesenheitskalender</a></p>
		</article>
		<article id="sommerfest">	
			<p><a class="fotoschrift">Sommerfest</a></p>		
		</article>	
	</section>
	
	<aside>	
		Neuen Mitarbeiter anlegen:<br><br>
			<form method="post" class="internanlegen">
				Vorname: <br><input type="text" name="vorname" placeholder="Vorname..."><br><br>
				Nachname: <br><input type="text" name="nachname" placeholder="Nachname..."><br><br>
				E-Mail: <br><input type="text" name="email" placeholder="E-Mail..."><br><br>
				Benutzername: <br><input type="text" name="benutzername" placeholder="Benutzername..."><br><br>
				Passwort: <br><input type="password" name="passwort" placeholder="Passwort..."><br><br>
				<input type="submit" value="Anlegen">
			</form> 
		
		<p style="color:lightblue;text-align: center;">
			<?php
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			
			
			
			

			if (!empty($_POST)){ //check if form was submitted
			
				$vorname = $_POST["vorname"];
				$nachname = $_POST["nachname"];
				$nutzername = $_POST["username"];
				$passwort = $_POST["password"];
				$email = $_POST["email"];
				
				$db_link = new mysqli('localhost', 'sqlAdmin', 'ubuntuSQL0330', 'schoenesGlas'); //LOGIN IN SQL UND AUFRUF DER DATENBANK  
		
				if ($db_link->connect_error) { 
					 die("Connection failed: " . $db_link->connect_error);	//FUNKTIONIERT DIE VERBINDUNG NICHT HIER ABBRECHEN UND FEHLERMELDUNG AUSGEBEN!
				}
			
				$sql = "INSERT INTO Mitarbeiter (vorname, nachname, nutzername, passwort, email, erstellt_am) VALUES ('$vorname', '$nachname', '$nutzername', '$passwort', '$email', CURRENT_TIMESTAMP)"; //SQL STATMENT MIT DEN EINGABEN

				if (mysqli_query($db_link, $sql)) {
					echo "Neuer Nutzer angelegt!";
				} 
				
				else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
				}	
			
			} 	
		?>
	</p>
	</aside>
	
	</main>   
</body>
</html>