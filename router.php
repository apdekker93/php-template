<?php
// Router script voor de PHP ingebouwde webserver.
// Gebruik: php -S localhost:8080 router.php
//
// Zonder dit script stuurt de server alle ontbrekende bestanden
// door naar index.php. Met dit script krijgen leerlingen een
// duidelijke foutmelding als een bestand niet bestaat.

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filePath = __DIR__ . $requestPath;

// Bestand bestaat → PHP serveert het gewoon zelf
if (is_file($filePath)) {
    return false;
}

// Map aangevraagd → zoek index.php daarin (normaal gedrag)
if (is_dir($filePath)) {
    $index = rtrim($filePath, '/') . '/index.php';
    if (is_file($index)) {
        require $index;
        return true;
    }
}

// Bestand bestaat niet → toon duidelijke 404
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>404 – Bestand niet gevonden</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 80px auto; color: #333; }
        code { background: #f0f0f0; padding: 2px 6px; border-radius: 3px; }
        h1 { color: #c0392b; }
    </style>
</head>
<body>
    <h1>404 – Bestand niet gevonden</h1>
    <p>Het bestand <code><?= htmlspecialchars($requestPath) ?></code> bestaat niet.</p>
    <p>Controleer of de bestandsnaam en het pad kloppen.</p>
    <p><a href="/">← Terug naar de startpagina</a></p>
</body>
</html>