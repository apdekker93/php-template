<?php

// verbinden met de database
include("dbconn.php");

if (isset($_GET["naam"]) && isset($_GET["score"])) {
	// Lees de opgestuurde gegevens uit
	$opgestuurde_naam = $_GET["naam"];
	$opgestuurde_score = $_GET["score"];
	
	// Maak de query
	$query = "
		INSERT INTO score (username, score)
		VALUES ('$opgestuurde_naam', $opgestuurde_score)
	";
	
	// Voer de query uit
	if (mysqli_query($con, $query)) {
		$message = "De score van $opgestuurde_naam is nu $opgestuurde_score!";
	} else {
		$message = "Error: $query<br>" . mysqli_error($con);
	}

	// Sluit de verbinding met de database
	mysqli_close($con);
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
