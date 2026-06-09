# 6.3: Automatisch doorverwijzen

*Onderdeel van: 6: Onthouden wat er ingevoerd is*

---

Het is eigenlijk wel handiger als je niet steeds handmatig op de links moet klikken. Daar gaan we nu iets aan doen: we laten PHP automatisch doorverwijzen naar de volgende pagina. Dat gaan we doen als de gebruiker een naam heeft ingevoerd. Dan moet hij automatisch naar [session\_score\_opvragen.php](../oefenen/onderwerp-6/session_score_opvragen.php) gaan.

Hiervoor gebruik je de header-functie van PHP. Dat ziet er zo uit:  
![](media/6-3-doorverwijzen/image1.png)

Voeg deze regel maar toe aan [session\_start\_score.php](../oefenen/onderwerp-6/session_start_score.php), als er een naam is opgeslagen in de sessie. Doe dat vlak voor de regel met `} else {`. Zie [uitwerking\_session\_start\_score\_doorverwijzen.php](../oefenen/onderwerp-6/uitwerking_session_start_score_doorverwijzen.php) voor de uitwerking.



---

Maak nu de volgende opdrachten:

- [Opdracht 6.3.1: Doorverwijzen bij lege naam](opdrachten/opdr-6-3-1.md)
- [Opdracht 6.3.2: Inloggen III](opdrachten/opdr-6-3-2.md)

[← 6.2: Sessie lezen](6-2-sessie-lezen.md)

[← Terug naar inhoudsopgave](index.md)
