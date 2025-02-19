#!/bin/bash
# Script to automate commits for the Currency Converter project

# Number of iterations
ITERATIONS=6

# Create a dummy file to modify (this file can be part of your project)
FILE_NAME="dummy.txt"

# Array of 6 short, unique commit messages (in order)
COMMIT_MESSAGES=(
    "init setup"
    "add admin"
    "update blog"
    "fix bug"
    "ui tweak"
    "finalize"
)

# Check if the file exists, else create it
if [ ! -f "$FILE_NAME" ]; then
    echo "Initializing dummy file" > "$FILE_NAME"
    git add "$FILE_NAME"
    git commit -m "Initial commit"
    echo "Initialized $FILE_NAME and made the first commit."
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
    echo "Created commit: $COMMIT_MESSAGE"
done

# Push changes to GitHub (adjust branch name if necessary)
git push origin main --force

echo "All $ITERATIONS commits have been pushed to GitHub."
