<?php

include("dbconn.php");

// Vraag de score van een gebruiker op als er een naam is opgestuurd
if (isset($_GET["naam"])) {
	// Lees de opgestuurde gegevens uit
	$opgestuurde_naam = $_GET["naam"];
	
	// Maak de query
	
	
	// Voer de query uit
	

	// Sluit de verbinding met de database
	
} else {
	$query = "niets";
	$message = "Er is nog niets opgestuurd.";
}

?><!DOCTYPE HTML>
<html>
<head>
<title>Scoreformulier</title>
</head>
<body>
	<p>Voer hier je score in.</p>
	<form>
		<label>Naam: </label>
		<input type="text" name="naam">
		<label>Score: </label>
		<input type="text" name="score">
		<input type="submit" value="Opsturen">
	</form>
	<p><?=$message?></p>
	<p>De uitgevoerde query is:</p>
	<pre><?=$query?></pre>
</body>
</html>
