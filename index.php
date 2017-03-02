<?php
	session_start();
	$verhalten = 0;

	if(!isset($_SESSION["username"]) and !isset($_GET["page"])) {
		$verhalten = 0;
	}

	if (isset($_GET["page"]) && ($_GET["page"]) == "log") {

		/*
		$user = $_POST["user"];
		$passwort = $_POST["passwort"];
		*/
		$user = strtolower($_POST["user"]);
		$passwort = md5($_POST["passwort"]);

		$verbindung = mysql_connect("localhost", "Brandao", "haw")
		or die ("Fehler im System");

		mysql_select_db("htmlworld")
		or die ("Verbindung zur Datenbank war nicht möglich...");

		$control = 0;
		$abfrage = "SELECT * FROM login WHERE user = '$user' AND passwort = '$passwort'";
		$ergebnis = mysql_query($abfrage);
		while($row = mysql_fetch_object($ergebnis))
			{
				$control++;
			}

		if($control != 0) {
			$_SESSION["username"] = $user;
			$verhalten = 1;
		}
		else {
			$verhalten = 2;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Projekt A</title>
	<?php
		if($verhalten == 1) { 
	?>
		<meta http-equiv="refresh" content="3; URL=bewertung.php" />
	<?php
		}
	?>
</head>
<body>
	<?php
		if($verhalten == 0) {
	?>
		Bitte logge dich ein:<br />
		<form method="post" action="index.php?page=log">
			Username: <input type="text" name="user" /><br />
			Passwort: <input type="password" name="passwort" /><br />
			<input type="submit" value="Einloggen">
		</form>
		<p><a href="register.php">Jetzt registrieren...</a></p>
	
	<?php
		}
		if($verhalten == 1) {
	?>
		Erfolgreich...

	<?php
		}
		if($verhalten == 2) {
	?>
		Fehler beim einloggen... <a href="index.php">zurück</a>
	<?php
		}
	?>

</body>
</html>