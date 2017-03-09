<?php 
	$verbindung = mysql_connect("localhost", "Brandao", "haw")
					or die ("Fehler im System");

	mysql_select_db("htmlworld")
					or die ("Verbindung zur Datenbank war nicht möglich...");

?>





<!DOCTYPE html>
<html>
<head>
	<title>Durchschnitt</title>
</head>
<body>
	<?php
		$result = mysql_query("SELECT count(1) FROM login");
		$rowTotal = mysql_fetch_array($result);
		$total = $rowTotal[0]; // ist anzahl der zeilen insgesamt
	?>
	<h1>Produkt 1</h1>
	<?php
	// Print out result

	$query = "SELECT SUM(productOne) FROM login";
	$ergebnis = mysql_query($query);	
    while($row = mysql_fetch_array($ergebnis)){
    $ergebnisProductOne = $row['SUM(productOne)'] / $total;
	echo "Durchschnitt: ". $ergebnisProductOne;
	}

	?>
	<br /> <br /><br />

	<h1>Produkt 2</h1>
	<?php
	// Print out result

	$queryTwo = "SELECT SUM(productTwo) FROM login";
	$ergebnisTwo = mysql_query($queryTwo);	
    while($rowTwo = mysql_fetch_array($ergebnisTwo)){
    $ergebnisProductTwo = $rowTwo['SUM(productTwo)'] / $total;
	echo "Durchschnitt: ". $ergebnisProductTwo;
	}

	?>
	<br /> <br /><br />

	<h1>Produkt 3</h1>
	<?php
	// Print out result

	$queryThree = "SELECT SUM(productThree) FROM login";
	$ergebnisThree = mysql_query($queryThree);	
    while($rowThree = mysql_fetch_array($ergebnisThree)){
    $ergebnisProductThree = $rowThree['SUM(productThree)'] / $total;
	echo "Durchschnitt: ". $ergebnisProductThree;
	}

	?>
	<br /> <br /><br />


	<h1>Produkt 4</h1>
	<?php
	// Print out result

	$queryFour = "SELECT SUM(productFour) FROM login";
	$ergebnisFour = mysql_query($queryFour);	
    while($rowFour = mysql_fetch_array($ergebnisFour)){
    $ergebnisProductFour = $rowFour['SUM(productFour)'] / $total;
	echo "Durchschnitt: ". $ergebnisProductFour;
	}


mysql_close($verbindung);
	?>
	<br /> <br /><br />

</body>
</html>