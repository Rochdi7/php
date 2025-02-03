#!/bin/bash
# Script to automate commits with 8 unique messages tailored for Moroccan Cuisine Blog

# Number of iterations
ITERATIONS=2

# Create a dummy file to modify
FILE_NAME="dummy.txt"

# Array of 8 unique commit messages for the Moroccan Cuisine Blog project
COMMIT_MESSAGES=(
    "admin.py file add in blog application"
    "new files add in blog application"
)

# Check if the file exists, else create it
if [ ! -f "$FILE_NAME" ]; then
    echo "Initializing dummy file" > "$FILE_NAME"
    git add "$FILE_NAME"
    git commit -m "Initial commit with dummy file"
    echo "Initialized $FILE_NAME and made the first commit."
fi

# Loop to add 8 iterations of commits with random messages
for ((i=1; i<=ITERATIONS; i++))
do
    # Pick a random commit message from the array
    RANDOM_INDEX=$((RANDOM % ${#COMMIT_MESSAGES[@]}))
    COMMIT_MESSAGE="${COMMIT_MESSAGES[$RANDOM_INDEX]}"

    # Modify the dummy file
    echo "$COMMIT_MESSAGE - Iteration $i" >> "$FILE_NAME"

    # Stage and commit the changes
    git add "$FILE_NAME"
    git commit -m "$COMMIT_MESSAGE"

    # Output a message for each commit
    echo "Created commit: $COMMIT_MESSAGE"
done

# Push changes to GitHub
git push origin main --force

echo "All $ITERATIONS commits have been pushed to GitHub."
