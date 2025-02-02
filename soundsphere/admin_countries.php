<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT * FROM countries";
$country = null;
$countries = $conn->query($sql);
?>
<link rel="stylesheet" href="assets/css/admin_countries.css">
<div class="col-md-8 col-lg-9 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">🌎 Countries Dashboard</h1>
        <a href="admin_countries_add.php"
            class="btn btn-success d-flex align-items-center px-4 py-2 shadow rounded-pill text-black text-decoration-none btn-add"style="width: 205px;">
            <i class="bi bi-plus-circle me-2"></i>
            <span>Add Country</span>
        </a>
    </div>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($_GET['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive rounded shadow">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Country</th>
                    <th>ISO Code</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($countries as $country): ?>
                    <tr class="text-center">
                        <td><?= $country['country_id']; ?></td>
                        <td><?= $country['country_name']; ?></td>
                        <td><?= $country['iso_code']; ?></td>
                        <td><?= $country['created_at']; ?></td>
                        <td><?= $country['updated_at']; ?></td>
                        <td>
                            <a href="admin_countries_edit.php?country_id=<?= $country['country_id']; ?>"
                                class="btn btn-sm btn-warning text-white text-decoration-none">
                                <i class="bi bi-pencil me-1" style="font-size: 18px;"></i>
                            </a>
                            <form method="POST" action="admin_countries_delete.php" class="d-inline" id="deleteForm<?= $country['country_id']; ?>">
                                <input type="hidden" name="country_id" value="<?= $country['country_id']; ?>">
                                <button type="button" class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?= $country['country_id']; ?>)">
                                    <i class="bi bi-trash me-1" style="font-size: 18px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76A2xnSb/J1A6E3tF0D1R7vlzpaTbv4Kv1z5g5yyhZEFkQSZ3a5FwWaRRC6au4j"
    crossorigin="anonymous"></script>

<script src="assets/js/script.js"></script>

<?php include_once('includes/footer.php'); ?>
</div>