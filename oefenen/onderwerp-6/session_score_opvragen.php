<?php

// Verbind met de database
include("dbconn.php");

// Start de sessie
session_start();

// Vraag de score van een gebruiker op als er een naam in de sessie staat.
if (...) {
	// Lees de opgeslagen gegevens uit.
	
	// Maak de query.
	
	// Voer de query uit.

	// Sluit de verbinding met de database
	
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
	</p>
	<p>
	Op <a href="session_start_score.php">deze pagina</a> kan je een naam invoeren.
	Je kan op <a href="session_verwijderen.php">deze pagina</a> de sessie verwijderen.
	</p>
	<p>De uitgevoerde query is:</p>
	<pre><?=$query?></pre>
</body>
</html>
