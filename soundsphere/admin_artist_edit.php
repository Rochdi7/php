<?php
include_once('config/db.php');

$db = new Database();
$connection = $db->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM artists WHERE artist_id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $artist = $stmt->fetch();

    if (!$artist) {
        die("Artist not found.");
    }

    // Fetch the list of countries
    $countryQuery = "SELECT country_id, country_name FROM countries";
    $countries = $connection->query($countryQuery)->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $bio = $_POST['bio'];
        $country_id = $_POST['country_id'];
        $profile_image = $_FILES['profile_image'];

        // Handle image upload
        $image_path = $artist['profile_image'];  // Default to current image if no new image is uploaded
        if ($profile_image['error'] == 0) {
            $image_name = basename($profile_image['name']);
            $image_path = 'uploads/' . $image_name;
            move_uploaded_file($profile_image['tmp_name'], $image_path);
        }

        // Update artist details
        $updateQuery = "UPDATE artists 
                        SET artist_name = :name, bio = :bio, country_id = :country_id, profile_image = :profile_image 
                        WHERE artist_id = :id";
        $updateStmt = $connection->prepare($updateQuery);
        $updateStmt->bindParam(':name', $name);
        $updateStmt->bindParam(':bio', $bio);
        $updateStmt->bindParam(':country_id', $country_id);
        $updateStmt->bindParam(':profile_image', $image_path);
        $updateStmt->bindParam(':id', $id);

        if ($updateStmt->execute()) {
            header('Location: admin_artists.php');
            exit();
        } else {
            $error = "Error updating artist.";
        }
    }
}

include_once('includes/header.php');
include_once('includes/side_bar.php');
?>

<link rel="stylesheet" href="assets/css/admin_artist.css">

<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Artist</h1>
    </div>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Artist Name</label>
            <input type="text" class="form-control form-add" id="name" name="name" required
                value="<?= htmlspecialchars($artist['artist_name']) ?>">
        </div>

        <div class="col-md-6 mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control form-add" id="bio" name="bio"
                required><?= htmlspecialchars($artist['bio']) ?></textarea>
        </div>

        <div class="col-md-6 mb-3">
            <label for="country" class="form-label">Country</label>
            <select class="form-select form-add" id="country" name="country_id" required>
                <option value="">Select Country</option>
                <?php foreach ($countries as $country) { ?>
                    <option value="<?= $country['country_id'] ?>" <?= ($country['country_id'] == $artist['country_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($country['country_name']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control form-add" id="profile_image" name="profile_image">
            <small>Current Image: <?= htmlspecialchars($artist['profile_image']) ?></small>
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_artists.php" class="btn btn-cancel me-2 btn-cancel dtn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill" style="width: 215px;">
                <i class="bi bi-save me-2"></i>
                <span>Save Changes</span>
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once('includes/footer.php'); ?>

</div>