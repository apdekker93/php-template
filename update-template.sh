#!/bin/bash

# Haal de nieuwste template-bestanden op van de docent.
# Voer dit script eenmalig uit in de terminal van je Codespace:
#
#   bash update-template.sh

REMOTE_NAAM="docent-template"
UPSTREAM="https://github.com/apdekker93/php-template.git"
BESTANDEN=(
    ".devcontainer/devcontainer.json"
    ".devcontainer/postStartCommand.sh"
    "voorbeeld/index.php"
    "router.php"
)

echo "▶ Template-update starten..."

# Voeg docent-remote toe als die er nog niet is
if ! git remote get-url "$REMOTE_NAAM" &> /dev/null; then
    git remote add "$REMOTE_NAAM" "$UPSTREAM"
    echo "✓ Remote '$REMOTE_NAAM' toegevoegd."
else
    echo "✓ Remote '$REMOTE_NAAM' bestaat al."
fi

# Haal de nieuwste versie op
echo "▶ Ophalen van updates..."
git fetch "$REMOTE_NAAM" || { echo "✗ Ophalen mislukt. Controleer je internetverbinding."; exit 1; }

# Overschrijf de template-bestanden
echo "▶ Bestanden bijwerken..."
for BESTAND in "${BESTANDEN[@]}"; do
    git checkout "$REMOTE_NAAM/main" -- "$BESTAND" && echo "  ✓ $BESTAND" || echo "  ✗ $BESTAND (mislukt)"
done

# Sla op in GitHub
echo "▶ Opslaan in GitHub..."
git commit -m "Template-bestanden bijgewerkt" || { echo "  (Geen wijzigingen om op te slaan.)"; exit 0; }
git push || { echo "✗ Pushen mislukt."; exit 1; }

echo ""
echo "✓ Klaar! Voer nu uit in de terminal:"
echo "    Ctrl+Shift+P → Codespaces: Rebuild Container"
