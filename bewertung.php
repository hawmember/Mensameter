<?php
	session_start();
	if(isset($_SESSION["username"])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bewertung</title>
</head>
<body>
<h1>Willkommen <?php echo $_SESSION["username"]; ?></h1><br />
<a href="logout.php">Logout</a>
<br /><br /><br />


<?php
	if(!isset($_GET["page"])) {	 
?>
	<!-- Bewertung Start-->
	<h2>Bewertung:</h2>
	<form method="post" action="bewertung.php?page=2">
		<fieldset>
			<h3>Produkt 1</h3>
			<input type="radio" name="productOne" value="1">
			<label>1</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productOne" value="2">
			<label>2</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productOne" value="3">
			<label>3</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productOne" value="4">
			<label>4</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productOne" value="5">
			<label>5</label>
		</fieldset>
		<br />
		<fieldset>
			<h3>Produkt 2</h3>
			<input type="radio" name="productTwo" value="1">
			<label>1</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productTwo" value="2">
			<label>2</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productTwo" value="3">
			<label>3</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productTwo" value="4">
			<label>4</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productTwo" value="5">
			<label>5</label>
		</fieldset>
		<br />
		<fieldset>
			<h3>Produkt 3</h3>
			<input type="radio" name="productThree" value="1">
			<label>1</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productThree" value="2">
			<label>2</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productThree" value="3">
			<label>3</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productThree" value="4">
			<label>4</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productThree" value="5">
			<label>5</label>
		</fieldset>
		<br />
		<fieldset>
			<h3>Produkt 4</h3>
			<input type="radio" name="productFour" value="1">
			<label>1</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productFour" value="2">
			<label>2</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productFour" value="3">
			<label>3</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productFour" value="4">
			<label>4</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="productFour" value="5">
			<label>5</label>
		</fieldset>
		<br />
		<input type="submit" value="Bewertungen abschicken">
	</form>
<?php
	} 
?>


<?php
		if(isset($_GET["page"])) {
			if($_GET["page"] == "2") {
				$username = $_SESSION["username"];
				$pOne =  $_POST["productOne"];
				$pTwo =  $_POST["productTwo"];
				$pThree =  $_POST["productThree"];
				$pFour =  $_POST["productFour"];


				$verbindung = mysql_connect("localhost", "Brandao", "haw")
				or die ("Fehler im System");

				mysql_select_db("htmlworld")
				or die ("Verbindung zur Datenbank war nicht möglich...");

							$eintrag = "UPDATE login SET productOne='$pOne', productTwo='$pTwo', productThree='$pThree', productFour='$pFour' WHERE user = '$username'";
							$eintragen = mysql_query($eintrag);


						if($eintragen == true) {
							echo "Vielen dank für die Bewertung! <a href=\"durchschnitt.php\">Zum Durchschnitt</a>";
						} 
						else {
							echo "Fehler im System. Bitte später nochmal versuchen...";
						}
					mysql_close($verbindung);

				}
			} 	 
	?>

</body>
</html>

<?php
 	}
 	else {
 ?>
 	Bitte einloggen... <a href="index.php">hier</a>
 <?php
 	}
 ?>