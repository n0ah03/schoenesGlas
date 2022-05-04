<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body style="text-align: center;">
		<h1>Login</h1> 
		
		<form action="login_validation.php" method="post">
		
			<label for="username">Benutzername: </label> <br>
			<input type="text" placeholder="Username" name="username" style="margin-bottom: 5px;" REQUIRED> <br> 
			
			<label for="password">Passwort: </label> <br>
			<input type="password" name="password" style="margin-bottom: 5px;" REQUIRED> <br>
			
			<input type="submit" value="Send">
		
		</form>
		
		<p style="color: red">
			<?php
			
			session_start();
			if (!empty($_SESSION["error"])) {		//prüfen ob man eine error ausgabe braucht!										
				echo $_SESSION['error']; 		//Error Nachricht ausgeben!	
			}	
			
			?>
		</p>
	</body>
</html>
