<?php

session_start();
session_destroy();

?><DOCTYPE HTML>
<head>
<title>Sessie verwijderen</title>
</head>
<body>
	<p>
	De sessie is verwijderd!
	</p>
	<p>
	Op <a href="uitwerking_session_start_score.php">deze pagina</a> kan je een nieuwe naam invoeren.
	Ga naar <a href="uitwerking_session_score_opvragen.php">deze pagina</a> om te zien dat eerder ingevoerde naam inderdaad weg is.
	</p>
</body>