<?php
include 'config/db.php';

$stmt = $pdo->prepare("SELECT * FROM notes");
$stmt->execute();
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Simple Notes App</title>
</head>

<body>
    <div class="container">
        <div class="head d-flex align-items-center justify-content-between">
            <h1>My Notes</h1>
            <a href="add.php"><i class="fa-solid fa-plus"></i></a>
        </div>

        <div class="notes row d-flex justify-content-center">
    <?php
    $colors = ['bg-pastel-yellow', 'bg-pastel-green', 'bg-pastel-blue', 'bg-pastel-pink', 'bg-pastel-purple', 'bg-pastel-orange'];
    $count = 0;
    
    foreach ($notes as $note):
        if ($count >= 9) break; 
        $randomColor = $colors[array_rand($colors)];
    ?>
        <div class="note card shadow-sm p-3 m-2 col-12 col-sm-6 col-md-4 <?php echo $randomColor; ?>">
            <i class="bi bi-paperclip"></i>
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="note-title h5"><?php echo $note["title"]; ?></h2>
                <div>
                    <a href="edit.php?id=<?php echo $note['id'] ?>" class="me-2"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="delete.php?id=<?php echo $note['id'] ?>" onclick="return confirm('Are you sure you want to delete this note?');"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
            <p class="note-context">
                <?php echo strlen($note["context"]) > 100 ? substr($note["context"], 0, 100) . '...' : $note["context"]; ?>
            </p>
        </div>
    <?php 
        $count++;
    endforeach; 
    ?>
</div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>