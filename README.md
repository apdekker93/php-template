# PHP projecten

Deze repository bevat een configuratie voor de Codespaces ontwikkelomgeving.

Hiermee kan je de PO WebApp maken. Je kan in de ontwikkelomgeving gebruikmaken van:
- PHP
- Webserver (ingebouwd in PHP)
- Database (SQLite)
- Database-beheer (Adminer, geschreven in PHP)

## Starten

Volg deze stappen om aan de slag te gaan.

### 0. Je eigen kopie maken

Dit hoeft maar 1 leerling per groepje te doen.

1. Druk rechtsboven op "Use this template" -> "Create a new repository"
2. Kies een naam die duidelijk maakt wat je project is en sla op.
3. Ga naar settings -> collaborators
4. Voeg apdekker93 toe.
5. Voeg andere leerlingen toe waarmee je samenwerkt.

### 1. Start Codespaces
- Login op https://github.com/
- Ga naar de pagina met jouw projectcode
- Klik op de groene knop "Code" en dan op de tab "Codespace" en dan op de groen knop "Create codespace on main". Als je de knop "Create Codespace on main" niet ziet, dan heb je eerder een Codespace gemaakt. Deze zie je op de plek van de knop staan en daar kun je op klikken om hem opnieuw te starten.
- Het starten van de Codespace kan enkele minuten duren. Als de Codespace gestart is, dan zie je de webversie van de editor VS Code (spreek uit als: vie-es-kood).

### 2. Code uitvoeren
Start de PHP-webserver:
- Type in de terminal `php -S localhost:8080` en druk dan op de toets [Enter↵]

  Een browser vraagt het `index.php` bestand op bij de webserver, maakt de inhoud op en laat de opgemaakte inhoud zien.

Als de browser niet automatisch opent:
- Klik op ports, klik bij port 8080 (webserver) op "Open in Browser" (wereldbol) of "Preview in Editor" (rechts van wereldbol)<br>

## Code aanpassen
- Dubbelklik op een bestand dat eindigt op `.php`. Het bestand wordt geopend in de editor.

## Wijzigingen opslaan in GitHub
Sla je wijzigingen als volgt op in GitHub:
- Klik in de menu balk die links op je scherm staat op het Source Control icoon.
- Vul een beschrijving in van je wijziging
- Druk op de knop "Commit & Sync".

## Samenwerken in GitHub
Sla je wijzigingen op in GitHub, zoals hierboven beschreven.

Als je groepsgenoot intussen andere wijzigingen heeft opgeslagen, dan kiest GitHub als volgt:
- Bestanden die de ander heeft gewijzigd worden van GitHub naar jouw Codespace gekopieerd.
- Bestanden die jij hebt gewijzigd worden van jouw Codespace naar GitHub gekopieerd. 
- Van bestanden die jullie allebei hebben gewijzigd toont GitHub jouw versie als laatste versie.

Wijzigingen van je groepsgenoot die jij hebt overschreven kun je terughalen:
- Klik op het Source Control icoon.
- Klik onder GRAPH op de wijziging van je groepsgenoot, de lijst met bestanden die je groepsgenoot veranderd heeft verschijnen
- Klik bij het bestand waarvan je wijzigingen wilt herstellen op het icoontje links van de M, het bestand opent (als je rode en groene regels ziet dan heb je op de naam van het bestand geklikt in plaats van het icoontje)
- Knip en plak de wijzigingen uit de versie van je groepsgenoot naar de versie van jou
- Sla je wijzigingen op in GitHub met "Commit & Sync"
