<?php

$opgestuurde_naam = $_GET["naam"];

?><!DOCTYPE HTML>
<html>
<head>
<title>Formulier 1</title>
</head>
<body>
	<p>Hallo, <?=$opgestuurde_naam?></p>
	<form>
		<label>Hoe heet je?</label>
		<input type="text" name="naam">
		<input type="submit">
	</form>
</body>
</html>
