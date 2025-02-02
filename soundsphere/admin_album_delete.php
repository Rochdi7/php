<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

$msg = "";

// Get album ID from the URL parameter
$album_id = $_GET['id'];

// Delete album logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // First, delete the album's cover image from the server if it exists
        $stmt = $conn->prepare("SELECT cover_image FROM albums WHERE id = :id");
        $stmt->bindParam(':id', $album_id);
        $stmt->execute();
        $album = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($album && $album['cover_image']) {
            $cover_image_path = $album['cover_image'];
            if (file_exists($cover_image_path)) {
                unlink($cover_image_path); // Delete the cover image file
            }
        }

        // Now, delete the album from the database
        $stmt = $conn->prepare("DELETE FROM albums WHERE id = :id");
        $stmt->bindParam(':id', $album_id);
        $stmt->execute();

        header("Location: admin_albums.php?message=Album deleted successfully");
        exit;
    } catch (PDOException $e) {
        $msg = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}

// Fetch album details to confirm deletion
$stmt = $conn->prepare("SELECT * FROM albums WHERE id = :id");
$stmt->bindParam(':id', $album_id);
$stmt->execute();
$album = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$album) {
    header("Location: admin_albums.php?message=Album not found");
    exit;
}
?>
<link rel="stylesheet" href="assets/css/admin_albums.css">

<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Delete Album</h1>
    </div>

    <?php if (isset($msg)) { ?>
        <div class="alert alert-danger" id="errorMessage" style="display: none;">
            <?php echo $msg; ?>
        </div>
    <?php } ?>

    <div class="alert alert-warning">
        <p>Are you sure you want to delete the album "<strong><?= htmlspecialchars($album['name']) ?></strong>"?</p>
        <p><strong>Note:</strong> This action cannot be undone. The album and its cover image will be permanently deleted.</p>
    </div>

    <form method="POST" class="d-flex justify-content-end" id="deleteAlbumForm">
        <a href="admin_albums.php" class="btn btn-secondary me-2 btn-cancel dtn-cancel text-center">
            <i class="bi bi-x-circle me-2"></i> Cancel
        </a>
        <button type="button" class="btn btn-danger d-flex align-items-center px-4 py-2 shadow-sm rounded-pill" onclick="confirmDelete()">
            <i class="bi bi-trash me-2"></i>
            <span>Delete Album</span>
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function confirmDelete() {
        const confirmation = confirm("Are you sure you want to delete this album?");
        if (confirmation) {
            // If user confirms, submit the form
            document.getElementById('deleteAlbumForm').submit();
        }
    }
</script>

<?php include_once('includes/footer.php'); ?>

