<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body style="text-align: center;">
		<h1>Login</h1> 
	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		
		
		

		if (!empty($_POST)){ //check if form was submitted
			echo "FORM ABGESCHICKT!";
		
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
		<form action=" " method="post">
		
			<label for="vorname">Vorname des User: </label> <br>
			<input type="text" name="vorname" style="margin-bottom: 5px;" REQUIRED> <br>
			
			<label for="nachname">Nachname des User: </label> <br>
			<input type="text" name="nachname" style="margin-bottom: 5px;" REQUIRED> <br>
		
			<label for="email">Email des User: </label> <br>
			<input type="email" name="email" style="margin-bottom: 5px;" REQUIRED> <br>
		
			<label for="username">Benutzername des Nutzers: </label> <br>
			<input type="text" placeholder="Username" name="username" style="margin-bottom: 5px;" REQUIRED> <br> 
			
			<label for="password">Passwort des User: </label> <br>
			<input type="password" name="password" style="margin-bottom: 5px;" REQUIRED> <br>
			
			<input type="submit" value="Send">
		
		</form>

	</body>
</html>
