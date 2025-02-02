<?php
include_once('config/db.php');

$db = new Database();
$connection = $db->getConnection();

if (isset($_POST['artist_id'])) {
    $id = $_POST['artist_id'];

    // Correct column name in query: artist_id
    $query = "SELECT * FROM artists WHERE artist_id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $artist = $stmt->fetch();

    if (!$artist) {
        die("Artist not found.");
    }

    // Handle deletion process
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $deleteQuery = "DELETE FROM artists WHERE artist_id = :id";  // Correct column name
        $deleteStmt = $connection->prepare($deleteQuery);
        $deleteStmt->bindParam(':id', $id);

        if ($deleteStmt->execute()) {
            // Redirect after successful deletion
            header('Location: admin_artists.php?message=Artist%20deleted%20successfully');
            exit();
        } else {
            $error = "Error deleting artist.";
        }
    }
}

include_once('includes/header.php');
include_once('includes/side_bar.php');
?>

<link rel="stylesheet" href="assets/css/admin_artist.css">

<div class="d-flex">
    <div class="main-content">
        <header class="d-flex justify-content-between align-items-center">
            <h1>Delete Artist</h1>
        </header>

        <section>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <div class="form-container">
                <!-- Display confirmation message with artist name -->
                <h3>Are you sure you want to delete the artist "<?php echo htmlspecialchars($artist['artist_name']); ?>"?</h3>
                <form method="POST">
                    <input type="hidden" name="artist_id" value="<?= $artist['artist_id']; ?>">
                    <button type="submit" class="btn-delete">Delete</button>
                    <a href="admin_artists.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once('includes/footer.php'); ?>
