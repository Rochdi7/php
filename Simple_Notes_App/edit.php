<?php
include 'config/db.php';

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $edit_query = "select * from notes where id = :id";
    $stmt = $pdo->prepare($edit_query);
    $stmt->execute(['id' => $note_id]);
    $note = $stmt->fetch();
} else {
    echo "No note found!";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($note_id)) {
        $title = $_POST['title'];
        $context = $_POST['context'];

        $update_query = "update notes set title= :title, context= :context where id =:id";
        $stmt = $pdo->prepare($update_query);
        $stmt->execute(['title' => $title, 'context' => $context, 'id' => $note_id]);
    }
    else{
        echo "Invalid note id!";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Notes Edit</title>
</head>

<body>

    <div class="container">
        <div class="head d-flex align-items-center justify-content-between">
            <h1>Note Edit</h1>
            <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <form action="edit.php?id=<?php echo $note['id'] ?>" method="POST">

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $note['title'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="context">Context</label>
                <textarea class="form-control" id="context" name="context" rows="3" required> <?php echo $note['context'] ?></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</html>