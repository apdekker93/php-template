# 4.1: Gegevens opslaan

*Onderdeel van: 4: Gegevens in een database opslaan*

---

Een server moet ook gegevens kunnen onthouden die een
gebruiker opgestuurd heeft. Als je een account aanmaakt, moet je ook vanaf een
andere client kunnen inloggen op de server. De server moet dan minimaal je
gebruikersnaam en wachtwoord ergens opslaan.

Om gegevens op te slaan, gebruikt een webserver een **database (DB)**. Dat is een verzameling
bestanden waaruit je eenvoudig gegevens kan opvragen. Hiervoor is een apart
serverprogramma nodig: de database-server. Die server is speciaal gemaakt om
commando’s te verwerken voor het beheren van gegevens. Zo’n commando heet een **query** (letterlijk: zoekopdracht).

Om te werken met een database-server, maak je gebruik van
een **database management system (DBMS)**.
Dat is een programma dat ervoor zorgt dat je alle gegevens die in een database
staan, kan beheren. Daarvoor hoef je dus niet eens zelf eerst een app te maken.

### Gegevens beheren

Het beheren van gegevens kan je opdelen in vier dingen:
Create, Read, Update, Delete, afgekort tot **CRUD**.
Een DBMS zorgt ervoor dat je als beheerder al deze drie dingen kan doen bij
alle gegevens. Als je zelf een app maakt, verschilt het nogal per gebruiker wat
ze mogen. Daarom is het handig om deze afkorting te gebruiken als checklist. Zo
kan je controleren of een gebruiker alles met de opgeslagen gegevens kan doen
wat hij ermee moet kunnen doen. Je vraagt je dan af:

1. Create: Kan de gebruiker nieuwe gegevens
   aanmaken?
2. Read: Kan de gebruiker opgeslagen gegevens
   bekijken?
3. Update: Kan de gebruiker opgeslagen gegevens
   bewerken?
4. Delete: Kan de gebruiker opgeslagen gegevens
   verwijderen?

Natuurlijk moet je er in ieder geval bij bedenken dat de
gebruiker geen rechten heeft voor alle gegevens. Hij mag bijvoorbeeld alleen
zijn eigen wachtwoord bewerken (Update), niet dat van andere gebruikers.

### Structuur van een database

De gegevens in een database zijn allemaal opgedeeld in
tabellen. Een **tabel** bevat allemaal
gegevens van dezelfde soort: je hebt bijvoorbeeld een tabel met accounts en een
tabel met bestellingen. Dat zijn “verschillende dingen”, dus staan ze in
verschillende tabellen. Zo’n “ding” noem je een **object**. Iedere rij in een tabel is een object. Dus als jij je
registreert op een website, maakt die website een account-object voor jou aan.
Dat object slaat hij op in de tabel “accounts” door er een **rij** in aan te maken. Iedere rij in een tabel is dus een object.

Een tabel heeft kolommen. Iedere **kolom** heeft een naam. Die geeft aan wat er in die kolom ingevuld
moet worden. Die waarden noemen we attributen. Een **attribuut** is een eigenschap van een object, oftewel een waarde die
erbij hoort. Laten we hierover nadenken aan de hand van een account. Wat voor waarden
moeten er bij een account opgeslagen worden? Vaak deze eigenschappen:

- gebruikersnaam
- wachtwoord
- e-mailadres
- naam

Dat zijn dus attributen van een account-object. Daarom zijn
dat ook kolommen in de accounts-tabel.

### Tabellen aanmaken in een database

Voordat je gegevens op kan slaan, moet je eerst aan een
database-server duidelijk maken wat de vorm is van die gegevens. Daarvoor moet
je tabellen aanmaken waarin de objecten opgeslagen kunnen worden die je website
nodig heeft. Dat ga je doen met een DBMS, namelijk phpMyAdmin. Dat is een
website die ook geprogrammeerd is in PHP. Met deze site kan je databases
beheren (administration).

Bij het aanmaken van een database, moet je voor iedere kolom
het **datatype** aangeven. Dat betekent
dat je aan moet geven *wat voor gegevens*
je erin gaat opslaan. Daarbij kan je kiezen uit best veel opties, waarvan je er
vijf moet kennen:

1. **int**:
   dit is een geheel getal (dus geen cijfers achter de komma)
2. **varchar**:
   dit is een stukje tekst met een maximale lengte die je zelf kan kiezen. Dit is
   bedoeld om korte stukken tekst in op te slaan (zoals een naam of URL/link)
3. **text**:
   dit is een stukje tekst met een maximale lengte van 64KiB, bedoeld om grotere
   stukken tekst in op te slaan zoals een beschrijving.
4. **date**:
   dit is een datum, opgeslagen als tekst in de vorm ‘YYYY-MM-DD’ (Y: year, M:
   month, D: day), dus bijvoorbeeld '2023-06-12'. Een “date” is dus altijd 10
   tekens lang.
5. **float**:
   kommagetal (float komt van “floating point number”, de Engelse naam voor
   kommagetal).

Verder moet je in een tabel ook aangeven welk gegeven je
gaat gebruiken om een rij te **identificeren**,
oftewel “aan te wijzen”. Daarvoor moet je een kolom kiezen waar nooit twee keer
hetzelfde ingevoerd mag worden. Een goed voorbeeld daarvan is een
gebruikersnaam: er mogen natuurlijk geen twee accounts zijn die dezelfde gebruikersnaam
hebben. De kolom die je kiest om rijen mee te identificeren, heet de **primaire sleutel**. Andere kolommen die
ook uniek moeten zijn, kan je ook een **sleutel “uniek”** geven. Dat kan je bijvoorbeeld doen bij een e-mailadres, als
je wilt dat je geen twee accounts mag aanmaken met hetzelfde e-mailadres.

---

[← Terug naar inhoudsopgave](index.md)
