<?php

// Start de sessie door een cookie te maken.
// Als er al een cookie bestond, ga dan verder met die sessie.


// Onthoud de naam van een gebruiker in de sessie op als er een naam is opgestuurd.
if (isset($_GET["naam"])) {
	// Lees de opgestuurde gegevens uit.
	$opgestuurde_naam = $_GET["naam"];
	
	// Onthoud de naam in de sessie.
	
	
	// Bericht weergeven dat de naam is aangepast.
	$message = "De naam in de sessie is nu ingesteld op $opgestuurde_naam.";
} else {
	$message = "Er is geen naam opgestuurd.";
}

?><!DOCTYPE HTML>
<html>
<head>
<title>Score opvragen</title>
</head>
<body>
	<p>Vraag hier je score op.</p>
	<form>
		<label>Naam: </label>
		<input type="text" name="naam">
		<input type="submit" value="Opsturen">
	</form>
	<p>
	<?=$message?>
	</p>
	<p>
	Ga naar <a href="session_score_opvragen.php">deze pagina</a> om de score te bekijken van de laatst opgestuurde naam.
	</p>
</body>
</html>
