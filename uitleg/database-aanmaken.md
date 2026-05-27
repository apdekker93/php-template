# Database aanmaken

In plaats van klikken in een GUI schrijf je de structuur van je database in SQL.
Dat heeft een groot voordeel: je bewaart de code in `database.sql`, zodat je database
altijd opnieuw aan te maken is.

## Stap 1 — Open `database.sql`

Open het bestand `database.sql` in de hoofdmap van je project.

## Stap 2 — Maak een database aan

Schrijf de volgende regel. Vervang `webshop` door de naam van jouw webapp.

```sql
CREATE DATABASE IF NOT EXISTS webshop;
USE webshop;
```

`IF NOT EXISTS` zorgt dat je geen foutmelding krijgt als de database al bestaat.

## Stap 3 — Maak de tabel `accounts` aan

Voeg hieronder toe:

```sql
CREATE TABLE IF NOT EXISTS accounts (
    username  VARCHAR(50)  NOT NULL PRIMARY KEY,
    password  VARCHAR(255) NOT NULL,
    name      VARCHAR(100) NOT NULL,
    email     VARCHAR(100) NOT NULL UNIQUE
);
```

Wat staat hier?

| Kolom | Type | Bijzonderheid |
|---|---|---|
| `username` | tekst (max. 50 tekens) | primaire sleutel — elke gebruikersnaam is uniek |
| `password` | tekst (max. 255 tekens) | straks sla je hier een gehasht wachtwoord op |
| `name` | tekst (max. 100 tekens) | — |
| `email` | tekst (max. 100 tekens) | `UNIQUE` — twee accounts kunnen niet hetzelfde e-mailadres hebben |

## Stap 4 — Voer de SQL uit in Adminer

1. Open [Adminer](http://localhost:8080/adminer.php?server=localhost&username=root) en log in met wachtwoord `root`.
2. Klik links op **SQL-commando**.
3. Kopieer de inhoud van `database.sql` en plak die in het invoerveld.
4. Klik op **Uitvoeren**.

Je ziet nu je database en tabel in de linkerkolom staan.

## Klaar

Elke keer als je Codespace opnieuw opstart, wordt `database.sql` automatisch ingeladen.
Voeg later `CREATE TABLE`-regels toe voor elke nieuwe tabel die je nodig hebt.