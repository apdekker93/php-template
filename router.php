<?php
// Router script voor de PHP ingebouwde webserver.
// Gebruik: php -S localhost:8080 router.php

$requestPath = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$filePath = __DIR__ . $requestPath;

// Bestand bestaat
if (is_file($filePath)) {
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    // PHP-bestanden worden normaal uitgevoerd
    if ($ext === 'php') {
        return false;
    }

    // Statische bestanden: stuur met juist MIME-type
    $mimeTypes = [
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        'ico'   => 'image/x-icon',
        'css'   => 'text/css; charset=utf-8',
        'js'    => 'application/javascript; charset=utf-8',
        'html'  => 'text/html; charset=utf-8',
        'htm'   => 'text/html; charset=utf-8',
        'txt'   => 'text/plain; charset=utf-8',
        'json'  => 'application/json; charset=utf-8',
        'xml'   => 'application/xml',
        'pdf'   => 'application/pdf',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
        'mp4'   => 'video/mp4',
        'webm'  => 'video/webm',
        'mp3'   => 'audio/mpeg',
    ];

    header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
    exit;
}

// Map aangevraagd → zoek index.php of index.html daarin
if (is_dir($filePath)) {
    $base = rtrim($filePath, '/');
    if (is_file($base . '/index.php')) {
        require $base . '/index.php';
        return true;
    }
    if (is_file($base . '/index.html')) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($base . '/index.html');
        exit;
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