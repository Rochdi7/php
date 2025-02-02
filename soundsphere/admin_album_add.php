<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

$msg = "";

// Fetch all artists for the select option
$artistStmt = $conn->prepare("SELECT * FROM artists");
$artistStmt->execute();
$artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

// Insert album logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $name = $_POST['name'];
        $artist_id = $_POST['artist_id'];
        $release_date = $_POST['release_date'];
        $cover_image = null;

        // Handle cover image upload
        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $upload_dir = 'uploads/albums/';
            $file_name = uniqid() . '-' . basename($_FILES['cover_image']['name']); // Unique filename
            $upload_file = $upload_dir . $file_name;

            // Check if the file was successfully uploaded
            if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $upload_file)) {
                $cover_image = $upload_file; // Store the image path
            } else {
                $msg = "<div class='alert alert-danger'>Error uploading the image. Please try again.</div>";
            }
        }

        // Insert album into the database
        if ($cover_image !== null) {
            $stmt = $conn->prepare(
                "INSERT INTO albums (name, artist_id, release_date, cover_image) 
                 VALUES (:name, :artist_id, :release_date, :cover_image)"
            );

            $stmt->execute([
                ':name' => $name,
                ':artist_id' => $artist_id,
                ':release_date' => $release_date,
                ':cover_image' => $cover_image
            ]);

            header("Location: admin_albums.php?message=Album added successfully");
            exit;
        } else {
            $msg = "<div class='alert alert-danger'>Please upload a valid cover image.</div>";
        }
    } catch (PDOException $e) {
        $msg = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
<link rel="stylesheet" href="assets/css/admin_albums.css">
<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Add Album</h1>
    </div>

    <?php if (isset($msg)) { ?>
        <div class="alert alert-danger" id="errorMessage" style="display: none;">
            <?php echo $msg; ?>
        </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        <div class="col-md-6 mb-3">
            <label for="albumName" class="form-label">Album Name</label>
            <input type="text" class="form-control form-add" id="albumName" name="name"  placeholder="Enter album name" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select class="form-select form-add" id="artist" name="artist_id" required>
                <option value="">Select Artist</option>
                <?php foreach ($artists as $artist) { ?>
                    <option value="<?= $artist['artist_id'] ?>"><?= htmlspecialchars($artist['artist_name']) ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="date" class="form-control form-add" id="releaseDate" name="release_date" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="coverImage" class="form-label">Cover Image</label>
            <input type="file" class="form-control form-add" id="coverImage" name="cover_image">
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_albums.php" class="btn btn-cancel me-2 btn-cancel dtn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-save me-2"></i>
                <span>Save Album</span>
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once('includes/footer.php'); ?>

</div>