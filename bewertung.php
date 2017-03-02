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
<h1>Hallo <?php echo $_SESSION["username"]; ?></h1><br />
<a href="logout.php">Logout</a>
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