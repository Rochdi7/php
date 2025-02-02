<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

$msg = "";

// Check if country_id is provided in the URL
if (!isset($_GET['country_id']) || empty($_GET['country_id'])) {
    echo "<div class='alert alert-danger'>No valid country selected for update.</div>";
    exit;
}

$id = $_GET['country_id'];

// Fetch country details
$stmt = $conn->prepare("SELECT * FROM countries WHERE country_id = :country_id");
$stmt->execute([':country_id' => $id]);
$country = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$country) {
    echo "<div class='alert alert-danger'>Country not found.</div>";
    exit;
}

// Update the country if the form is submitted

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $name = $_POST['country_name'];
        $iso_code = $_POST['iso_code'];
        $updated_at = $_POST['updated_at'];
        $created_at = isset($country['created_at']) ? $country['created_at'] : date('Y-m-d');  // Set the created_at from existing data or use current date
        $deleted_at = "0000-00-00";  // Placeholder value

        $updateStmt = $conn->prepare(
            "UPDATE countries 
             SET country_name = :country_name, iso_code = :iso_code, 
                 created_at = :created_at, updated_at = :updated_at
             WHERE country_id = :country_id"
        );

        $updateStmt->execute([
            ':country_name' => $name,
            ':iso_code' => $iso_code,
            ':created_at' => $created_at,
            ':updated_at' => $updated_at,
            ':country_id' => $id,
        ]);

        header("Location: admin_countries.php?message=Country updated successfully");
        exit;
    } catch (PDOException $e) {
        $msg = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}


?>
<link rel="stylesheet" href="assets/css/admin_countries.css">
<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Country</h1>
    </div>

    <?php if (isset($msg)) { ?>
    <div class="alert alert-danger" id="errorMessage" style="display: none;">
        <?php echo $msg; ?>
    </div>
<?php } ?>


    <form method="POST" class="d-flex flex-column align-items-center">
        <div class="col-md-6 mb-3">
            <label for="countryName" class="form-label">Country Name</label>
            <input type="text" class="form-control form-add" id="countryName" name="country_name" required value="<?= htmlspecialchars($country['country_name']) ?>">
        </div>

        <div class="col-md-6 mb-3">
            <label for="isoCode" class="form-label">ISO Code</label>
            <input type="text" class="form-control form-add" id="isoCode" name="iso_code" required value="<?= htmlspecialchars($country['iso_code']) ?>">
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_countries.php" class="btn btn-cancel me-2 btn-cancel dtn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill" style="width: 235px;">
                <i class="bi bi-save me-2"></i>
                <span>Update Country</span>
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once('includes/footer.php'); ?>
</div>
