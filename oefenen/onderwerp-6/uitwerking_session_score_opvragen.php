<?php

// Verbind met de database
include("dbconn.php");

// Start de sessie
session_start();

// Vraag de score van een gebruiker op als er een naam in de sessie staat.
if (isset($_SESSION["naam"])) {
	// Lees de opgeslagen gegevens uit.
	$opgeslagen_naam = $_SESSION["naam"];
	
	// Maak de query.
	$query = "
		SELECT username, score
		FROM scores
		WHERE username = '$opgeslagen_naam'
	";
	
	// Voer de query uit.
	if ($result = mysqli_query($con, $query)) {
		// Lees de opgehaalde gegevens uit.
		$rij = mysqli_fetch_assoc($result);
		$opgehaalde_score = $rij['score'];
		
		$message = "De score van $opgeslagen_naam is $opgehaalde_score.";
	} else {
		$message = "Error: $query<br>" . mysqli_error($con);
	}

	// Sluit de verbinding met de database
	mysqli_close($con);
} else {
	$query = "niets";
	$message = "Er is nog geen naam opgeslagen in de sessie.";
}

?><!DOCTYPE HTML>
<html>
<head>
<title>Score opvragen</title>
</head>
<body>
	<p>
	<?=$message?>
	Op <a href="uitwerking_session_start_score.php">deze pagina</a> kan je een naam invoeren.
	Je kan op <a href="uitwerking_session_verwijderen.php">deze pagina</a> de sessie verwijderen.
	</p>
	<p>De uitgevoerde query is:</p>
	<pre><?=$query?></pre>
</body>
</html>
