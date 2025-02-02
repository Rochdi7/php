<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'], $_POST['bio'], $_POST['country_id'])) {
        $name = $_POST['name'];
        $bio = $_POST['bio'];
        $country_id = $_POST['country_id'];
        $created_at = date('Y-m-d H:i:s');  // Current timestamp for creation
        $updated_at = $created_at;          // Set the same for the initial update

        // Check if the artist already exists
        $stmt = $conn->prepare("SELECT * FROM artists WHERE artist_name = :artist_name");
        $stmt->bindParam(':artist_name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $artist = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$artist) {
            // Handle file upload if profile image is provided
            $profile_image = null; // Default value in case no image is uploaded

            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
                $target_dir = "uploads/"; // Folder to save images
                $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

                // Check if the file is an actual image
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                        $profile_image = $target_file;
                    } else {
                        $msg = "<div class='alert alert-danger'>Error uploading the profile image.</div>";
                    }
                } else {
                    $msg = "<div class='alert alert-danger'>Only JPG, JPEG, PNG & GIF files are allowed.</div>";
                }
            }

            // Insert new artist
            $query = "INSERT INTO artists (artist_name, bio, country_id, profile_image, created_at, updated_at) 
                      VALUES (:artist_name, :bio, :country_id, :profile_image, :created_at, :updated_at)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':artist_name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
            $stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
            $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            if ($stmt->execute()) {
                header("Location: admin_artists.php?message=Artist added successfully");
                die();
            } else {
                $msg = "<div class='alert alert-danger'>Error occurred while adding the artist.</div>";
            }
        } else {
            $msg = "<div class='alert alert-warning'>Artist with this name already exists.</div>";
        }
    }
}
?>

<link rel="stylesheet" href="assets/css/admin_artist.css">
<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Add New Artist</h1>
    </div>

    <form class="d-flex justify-content-center flex-column align-items-center" method="POST" enctype="multipart/form-data">
        <?php echo $msg; ?>
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Artist Name</label>
            <input type="text" class="form-control form-add" id="name" placeholder="Enter artist name" name="name" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="bio" class="form-label">Bio (Optional)</label>
            <textarea class="form-control form-add" id="bio" name="bio"></textarea>
        </div>

        <div class="col-md-6 mb-3">
            <label for="country_id" class="form-label">Country</label>
            <select class="form-select form-add" id="country_id" name="country_id" required>
                <option value="">Select Country</option>
                <?php
                $stmt = $conn->query("SELECT country_id, country_name FROM countries");
                while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['country_id']}'>{$row['country_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="profile_image" class="form-label">Profile Image (Optional)</label>
            <input type="file" class="form-control form-add" id="profile_image" name="profile_image">
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_artists.php" class="btn me-2 btn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-save me-2"></i> Save Artist
            </button>
        </div>
    </form>
</div>

<?php include_once('includes/footer.php'); ?>
</div>