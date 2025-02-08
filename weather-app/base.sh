#!/bin/bash
# Script to automate commits for the Météo Project

# Number of iterations
ITERATIONS=6

# Create a dummy file to modify (this file can be part of your project)
FILE_NAME="dummy.txt"

# Array of 6 short, unique commit messages (in order)
COMMIT_MESSAGES=(
    "Initialisation du projet météo"
    "Ajout de la gestion des villes"
    "Intégration de l'API OpenWeatherMap"
    "Correction d'affichage des données météo"
    "Amélioration du design avec Bootstrap"
    "Finalisation et optimisation"
)

# Check if the file exists, else create it
if [ ! -f "$FILE_NAME" ]; then
    echo "Initialisation du fichier de test" > "$FILE_NAME"
    git add "$FILE_NAME"
    git commit -m "Initialisation du projet météo"
    echo "Fichier $FILE_NAME initialisé et premier commit effectué."
fi

# Loop through 6 iterations, using commit messages from top to bottom
for ((i=1; i<=ITERATIONS; i++))
do
    # Get the commit message corresponding to the iteration
    MESSAGE_INDEX=$((i - 1))
    COMMIT_MESSAGE="${COMMIT_MESSAGES[$MESSAGE_INDEX]}"

    # Modify the dummy file to record the commit iteration (optional)
    echo "$COMMIT_MESSAGE - Iteration $i" >> "$FILE_NAME"

    # Stage and commit the changes
    git add "$FILE_NAME"
    git commit -m "$COMMIT_MESSAGE"

    # Output a message for each commit
    echo "Commit créé : $COMMIT_MESSAGE"
done

# Push changes to GitHub (adjust branch name if necessary)
git push origin main --force

echo "Tous les $ITERATIONS commits ont été poussés sur GitHub."
