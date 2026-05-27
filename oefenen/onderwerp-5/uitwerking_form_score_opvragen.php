<?php

include("dbconn.php");

// Vraag de score van een gebruiker op als er een naam is opgestuurd
if (isset($_GET["naam"])) {
	// Lees de opgestuurde gegevens uit
	$opgestuurde_naam = $_GET["naam"];
	
	// Maak de query
	$query = "
		SELECT username, score
		FROM score
		WHERE username = '$opgestuurde_naam'
	";
	
	// Voer de query uit
	if ($result = mysqli_query($con, $query)) {
		// Lees de opgehaalde gegevens uit
		$rij = mysqli_fetch_assoc($result);
		$opgehaalde_score = $rij['score'];
		
		$message = "De score van $opgestuurde_naam is $opgehaalde_score.";
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
