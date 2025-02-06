#!/bin/bash
# Script to automate commits for the PDF Reader project

# Number of iterations
ITERATIONS=6

# Create a dummy file to modify (this file can be part of your project)
FILE_NAME="pdf_reader_log.txt"

# Array of 6 short, unique commit messages (in order)
COMMIT_MESSAGES=(
    "Initialize PDF Reader project"
    "Add UI structure"
    "Implement PDF loading"
    "Fix rendering issues"
    "Enhance UI styles"
    "Finalize PDF Reader"
)

# Check if the file exists, else create it
if [ ! -f "$FILE_NAME" ]; then
    echo "Initializing PDF Reader log file" > "$FILE_NAME"
    git add "$FILE_NAME"
    git commit -m "Initial commit for PDF Reader project"
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
