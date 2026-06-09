#!/bin/bash

# Haal de nieuwste template-bestanden op van de docent.
# Gebruik:
#
#   update-template              → update vaste bestanden + zichzelf
#   update-template oefeningen   → reset de hele map 'oefeningen' (rest ongewijzigd)

REMOTE_NAAM="docent-template"
UPSTREAM="https://github.com/apdekker93/php-template.git"
BESTANDEN=(
    ".devcontainer/devcontainer.json"
    ".devcontainer/postCreateCommand.sh"
    ".devcontainer/postStartCommand.sh"
    ".vscode"
    "uitleg"
    "router.php"
    "start-server.sh"
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

# ── Modus: map resetten ──────────────────────────────────────────────────────
if [ -n "$1" ]; then
    MAP="$1"
    echo "▶ Map '$MAP' resetten vanuit template..."
    git checkout "$REMOTE_NAAM/main" -- "$MAP" \
        && echo "  ✓ $MAP" \
        || { echo "  ✗ $MAP (mislukt — bestaat de map in de template?)"; exit 1; }

    rm -f .git/hooks/pre-push 2>/dev/null

    echo "▶ Opslaan in GitHub..."
    git commit -m "'$MAP' gereset vanuit template" || { echo "  (Geen wijzigingen om op te slaan.)"; exit 0; }
    git push || { echo "✗ Pushen mislukt."; exit 1; }

    echo ""
    echo "✓ Klaar! '$MAP' is overschreven met de template-versie."
    exit 0
fi

# ── Modus: standaard update ──────────────────────────────────────────────────

# Controleer of dit script zelf bijgewerkt moet worden
LOCAL_HASH=$(git rev-parse HEAD:update-template.sh 2>/dev/null)
REMOTE_HASH=$(git rev-parse "$REMOTE_NAAM/main:update-template.sh" 2>/dev/null)

if [ "$LOCAL_HASH" != "$REMOTE_HASH" ]; then
    echo "▶ Nieuwere versie van dit script beschikbaar. Bijwerken..."
    git checkout "$REMOTE_NAAM/main" -- update-template.sh
    git commit -m "update-template.sh bijgewerkt" && git push
    echo ""
    echo "✓ Script bijgewerkt. Voer het opnieuw uit:"
    echo "    update-template"
    exit 0
fi

# Overschrijf de template-bestanden
echo "▶ Bestanden bijwerken..."
for BESTAND in "${BESTANDEN[@]}"; do
    git checkout "$REMOTE_NAAM/main" -- "$BESTAND" && echo "  ✓ $BESTAND" || echo "  ✗ $BESTAND (mislukt)"
done

# Verwijder het bestand dat git-LFS fouten veroorzaakt
rm -f .git/hooks/pre-push 2>/dev/null

# Sla op in GitHub
echo "▶ Opslaan in GitHub..."
git commit -m "Template-bestanden bijgewerkt" || { echo "  (Geen wijzigingen om op te slaan.)"; exit 0; }
git push || { echo "✗ Pushen mislukt."; exit 1; }

echo ""
echo "✓ Klaar! Voer nu uit in de terminal:"
echo "    Ctrl+Shift+P → Codespaces: Rebuild Container"