<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();
$msg = "";

if (isset($_POST['name'], $_POST['iso_code'], $_POST['created_at'])) {
    $name = $_POST['name'];
    $iso_code = $_POST['iso_code'];
    $created_at = $_POST['created_at'];
    $updated_at = '2025-01-01 00:00:00';
    $deleted_at = '2025-01-01 00:00:00';

    // Check if the country already exists
    $stmt = $conn->prepare("SELECT * FROM countries WHERE country_name = :country_name");
    $stmt->bindParam(':country_name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $country = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$country) {
        // Insert new country
        $query = "INSERT INTO countries (country_name, iso_code, created_at, updated_at) 
                  VALUES (:country_name, :iso_code, :created_at, :updated_at)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':country_name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':iso_code', $iso_code, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: admin_countries.php?message=Country added successfully");
            die();
        } else {
            $msg = "<div class='alert alert-danger'>Error occurred while adding the country.</div>";
        }
    } else {
        $msg = "<div class='alert alert-warning'>Country with this name already exists.</div>";
    }
}
?>
<link rel="stylesheet" href="assets/css/admin_countries.css">
<div class="col-md-9 col-lg-10 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Add Country</h1>
    </div>

    <form class="d-flex justify-content-center flex-column align-items-center" method="POST">
        <?php echo $msg; ?>
        <div class="col-md-6 mb-3">
            <label for="countryName" class="form-label">Country Name</label>
            <input type="text" class="form-control form-add" id="countryName" placeholder="Enter country name" name="name" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="isoCode" class="form-label">ISO Code</label>
            <input type="text" class="form-control form-add" id="isoCode" placeholder="Enter ISO code" name="iso_code" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="createdAt" class="form-label">Created At</label>
            <input type="date" class="form-control form-add" id="createdAt" name="created_at" required value="<?php echo date('Y-m-d');?>">
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_countries.php" class="btn btn-secondary me-2 btn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-save me-2"></i> Save Country
            </button>
        </div>
    </form>
</div>

<?php include_once('includes/footer.php'); ?>
</div>
