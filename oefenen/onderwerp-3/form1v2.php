<?php

if (isset($_GET["naam"])) {
	$opgestuurde_naam = $_GET["naam"];
} else {
	$opgestuurde_naam = "hoe heet je?";
}

?><!DOCTYPE HTML>
<html>
<head>
<title>Formulier 1 versie 2</title>
</head>
<body>
	<p>Hallo, <?=$opgestuurde_naam?></p>
	<form>
		<label>Naam: </label>
		<input type="text" name="naam">
		<input type="submit">
	</form>
</body>
</html>
