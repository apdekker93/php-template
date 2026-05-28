<?php
// Verbinding maken met MySQL.
// Kopieer deze regel naar je eigen bestanden en pas de databasenaam aan.
$conn = mysqli_connect("127.0.0.1", "root", "root", "");

if (!$conn) {
    die("<p>Verbinding mislukt: " . mysqli_connect_error() . "</p>");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>PHP & SQL CodeSpace</title>
</head>
<body>
    <h1>Verbinding gelukt!</h1>

    <h2>Jouw verbindingsgegevens</h2>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr><th>Instelling</th><th>Waarde</th></tr>
        <tr><td>Host</td><td><code>127.0.0.1</code></td></tr>
        <tr><td>Gebruiker</td><td><code>root</code></td></tr>
        <tr><td>Wachtwoord</td><td><code>root</code></td></tr>
        <tr><td>Database</td><td>maak zelf aan via Adminer</td></tr>
    </table>

    <h2>Zo gebruik je dit in je code</h2>
    <pre><code>&lt;?php
$conn = mysqli_connect("127.0.0.1", "root", "root", "jouw_database");

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}
?&gt;</code></pre>

    <h2>Database beheren</h2>
    <p>
        Maak via Adminer een database aan en beheer je tabellen en gegevens.<br>
        Log in met server <code>127.0.0.1</code>, gebruiker <code>root</code> en wachtwoord <code>root</code>.
    </p>
    <a href="/adminer.php?server=127.0.0.1&username=root">Open Adminer →</a>
</body>
</html>