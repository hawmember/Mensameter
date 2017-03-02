<!DOCTYPE html>
<html>
<head>
	<title>Registrieren</title>
</head>
<body>
	<h3>Registrieren</h3>
	<?php
		if(!isset($_GET["page"])) {	 
	?>
	<form method="post" action="register.php?page=2">
		Username: <input type="text" name="user" /><br />
		Passwort: <input type="password" name="pw" /><br />
		Passwort wiederholen: <input type="password" name="pw2" /><br />
		<input type="submit" value="Registrieren">
	</form>
	<?php
		}
	?>
	<?php
		if(isset($_GET["page"])) {
			if($_GET["page"] == "2") {
				$user = strtolower($_POST["user"]);
				$pw = md5($_POST["pw"]);
				$pw2 = md5($_POST["pw2"]);

				if($pw != $pw2) {
					echo "Passwörter stimmen nicht überein. Bitte wiederholen... <a href=\"register.php\">zurück</a>";
				}
				else {
					$verbindung = mysql_connect("localhost", "Brandao", "haw")
					or die ("Fehler im System");

					mysql_select_db("htmlworld")
					or die ("Verbindung zur Datenbank war nicht möglich...");

					$control = 0;
					$abfrage = "SELECT user FROM login WHERE user = '$user'";
					$ergebnis = mysql_query($abfrage);
					while($row = mysql_fetch_object($ergebnis))
						{
							$control++;
						}

					if($control != 0) {
						echo "Username ist vergeben. Bitte ändern... <a href=\"register.php\">zurück</a>";
					}
					else {
						$eintrag = "INSERT INTO login (user, passwort) VALUES ('$user', '$pw')";

						$eintragen = mysql_query($eintrag);

						if($eintragen == true) {
							echo "Vielen dank für die Registrierung! <a href=\"index.php\">Jetzt anmelden</a>";
						} 
						else {
							echo "Fehler im System. Bitte später nochmal versuchen...";
						}
					}
					mysql_close($verbindung);

				}
			} 	 
		}
	?>

</body>
</html>