<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

// Ensure country data is fetched and initialized
$country = null;

if (isset($_POST['country_id'])) {
    $country_id = $_POST['country_id'];

    // Query to fetch country details by ID
    $query = "SELECT * FROM countries WHERE country_id = :country_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':country_id', $country_id);
    $stmt->execute();

    $country = $stmt->fetch();

    if (!$country) {
        die("Country not found.");
    }

    // Handle deletion after form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $deleteQuery = "DELETE FROM countries WHERE country_id = :country_id";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bindParam(':country_id', $country_id);

        if ($deleteStmt->execute()) {
            // Redirect after successful deletion
            header('Location: admin_countries.php?message=Country deleted successfully');
            exit();
        } else {
            $error = "Error deleting country.";
        }
    }
}

?>

<link rel="stylesheet" href="assets/css/admin_countries.css">

<div class="col-md-9 col-lg-10 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">🗑️ Delete Country</h1>
    </div>

    <!-- Error message if any -->
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php } ?>

    <!-- Confirmation message for deletion -->
    <div class="alert alert-warning shadow-sm p-3 rounded" style="background-color: #FFCC00; color: #1C1F26; border-color: #A8FA4F; font-size: 14px; width: 1000px;">
        <h4 class="mb-2">Are you sure you want to delete the country "<strong><?= htmlspecialchars($country['country_name']); ?></strong>"?</h4>
        <p>This action <span class="text-danger">cannot be undone</span>.</p>
    </div>

    <!-- Delete confirmation form -->
    <form method="POST" action="admin_countries_delete.php" class="d-inline" id="deleteForm<?= $country['country_id']; ?>">
        <input type="hidden" name="country_id" value="<?= $country['country_id']; ?>">
        <button type="button" class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?= $country['country_id']; ?>)">
            <i class="bi bi-trash me-1"></i>Delete
        </button>
    </form>

    <script>
        function confirmDelete(countryId) {
            // Show confirmation dialog
            if (confirm("Are you sure you want to delete this country? This action cannot be undone.")) {
                // If confirmed, submit the form
                document.getElementById('deleteForm' + countryId).submit();
            }
        }
    </script>

</div>

<?php include_once('includes/footer.php'); ?>
