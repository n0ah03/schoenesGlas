<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login Validation</title>
	</head>
	
	<body style="text-align: center;">
		<h1>Login Validation</h1> 
		
		<?php
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			//SESSION -> VARIABLEN KÖNNEN IN MEHREREN SEITEN BENUTZT WERDEN!
			//ES WIRD GEPRÜFT OB PASSWORD UND USERNAME ÜBERGEBEN WURDEN -> WENN NICHT ZURÜCK ZUM LOGIN! MIT FEHLERMELDUNG
			session_start();
			
			$_SESSION['login'] = false;	
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  		if (empty($_POST["passwort"]) || empty($_POST["nutzername"])) {
					$_SESSION['error']= "Passwort und Nutername angeben!";	
			  	header("Location: Mitarbeiterlogin.php");
				}	
			}

			$username = $_POST["nutzername"];
			$password = $_POST["passwort"];
			
			
			
			$db_link = new mysqli('localhost', 'sgSQLadmin', 'sgvmSQL!', 'schoenesGlas'); //LOGIN IN SQL UND AUFRUF DER DATENBANK  
			
			
			
			if ($db_link->connect_error) { 
 				 die("Connection failed: " . $conn->connect_error);	//FUNKTIONIERT DIE VERBINDUNG NICHT HIER ABBRECHEN UND FEHLERMELDUNG AUSGEBEN!
			}
			
			$sql = "SELECT * FROM Mitarbeiter WHERE nutzername='$username'"; //SQL STATMENT MIT DEN EINGABEN
			
			$erg = mysqli_query($db_link, $sql); //DAS SQL STATMENT AUSFÜHREN WIRD ALS ARRAY GESPEICHERT
			
			$row = mysqli_fetch_array($erg,MYSQLI_ASSOC); // ERGEBNISSE UMWANDELN IN ARRAY !
			
			$count = mysqli_num_rows($erg); //COUNT GIBT DIE ANZAHL DER ERGEBNISSE DER ABFRAGE AN!


			if(password_verify($password, $row['passwort']) || $password == $row['passwort']) {
			
			
			
				//CHECKEN OB ES NUR EIN ERGEBNISS IN DER DATENBANK GIBT
				if ($count == 1) {
					echo "<h2>Wilkommen im Intranet!<h2>";
					$_SESSION['login'] = true;
					header("Location: Intern.php");

				}
			}
			
			else if ($count > 1) {
					$_SESSION['error'] = "Ungültige Eingabe! <br> Wenden Sie sich an den Administrator!";
					$_SESSION['login'] = false;
					header("Location: Mitarbeiterlogin.php");
				}
			else {
					$_SESSION['error'] = "Nutername oder Passwort falsch!";
					$_SESSION['login'] = false;	
					header("Location: Mitarbeiterlogin.php");
				}
			
			mysqli_free_result($erg);
			
		?>

	</body>
</html>
