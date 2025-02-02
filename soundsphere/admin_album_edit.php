<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

$msg = "";

// Get album details
$album_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM albums WHERE id = :id");
$stmt->bindParam(':id', $album_id);
$stmt->execute();
$album = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch all artists for the select option
$artistStmt = $conn->prepare("SELECT * FROM artists");
$artistStmt->execute();
$artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

// Update album logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $name = $_POST['name'];
        $artist_id = $_POST['artist_id'];
        $release_date = $_POST['release_date'];
        $cover_image = $album['cover_image']; // Keep the old cover image by default

        // Handle cover image upload
        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $upload_dir = 'uploads/albums/';
            $upload_file = $upload_dir . basename($_FILES['cover_image']['name']);
            if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $upload_file)) {
                $cover_image = $upload_file; // Update cover image if a new file is uploaded
            }
        }

        $stmt = $conn->prepare(
            "UPDATE albums SET name = :name, artist_id = :artist_id, release_date = :release_date, cover_image = :cover_image WHERE id = :id"
        );
        
        $stmt->execute([
            ':name' => $name,
            ':artist_id' => $artist_id,
            ':release_date' => $release_date,
            ':cover_image' => $cover_image,
            ':id' => $album_id
        ]);

        header("Location: admin_albums.php?message=Album updated successfully");
        exit;
    } catch (PDOException $e) {
        $msg = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
<link rel="stylesheet" href="assets/css/admin_albums.css">

<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Album</h1>
    </div>

    <?php if (isset($msg)) { ?>
        <div class="alert alert-danger" id="errorMessage" style="display: none;">
            <?php echo $msg; ?>
        </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        <div class="col-md-6 mb-3">
            <label for="albumName" class="form-label">Album Name</label>
            <input type="text" class="form-control form-add" id="albumName" name="name" value="<?= htmlspecialchars($album['name']) ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select class="form-select form-add" id="artist" name="artist_id" required>
                <option value="">Select Artist</option>
                <?php foreach ($artists as $artist) { ?>
                    <option value="<?= $artist['artist_id'] ?>" <?= $artist['artist_id'] == $album['artist_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($artist['artist_name']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="date" class="form-control form-add" id="releaseDate" name="release_date" value="<?= htmlspecialchars($album['release_date']) ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="coverImage" class="form-label">Cover Image</label>
            <input type="file" class="form-control form-add" id="coverImage" name="cover_image">
            <?php if ($album['cover_image']) { ?>
                <img src="<?= htmlspecialchars($album['cover_image']) ?>" alt="Cover Image" width="100" class="mt-2">
            <?php } ?>
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_albums.php" class="btn btn-secondary me-2 btn-cancel dtn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill" style="width: 220px;">
                <i class="bi bi-save me-2"></i>
                <span>Save Changes</span>
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php include_once('includes/footer.php'); ?>

</div>