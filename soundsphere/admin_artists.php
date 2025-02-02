<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$connection = $db->getConnection();

// Fetch artists from the database
$query = "SELECT * FROM artists";
$result = $connection->query($query);

if (!$result) {
    die("Error fetching artists: " . $connection->error);
}

$artists = $result->fetchAll();
?>
<link rel="stylesheet" href="assets/css/admin_artist.css">
<div class="col-md-8 col-lg-9 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">🎤 Artists Dashboard</h1>
        <a href="admin_artists_add.php"
            class="btn btn-success d-flex align-items-center px-4 py-2 shadow rounded-pill text-black text-decoration-none btn-add" style="width: 180px;">
            <i class="bi bi-plus-circle me-2"></i>
            <span>Add Artist</span>
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
                    <th>Name</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artists as $artist): ?>
                    <tr id="artistRow<?= $artist['artist_id']; ?>" class="text-center">
                        <td><?= $artist['artist_id']; ?></td>
                        <td><?= htmlspecialchars($artist['artist_name']); ?></td>
                        <td>
                            <?php
                            // Fetch the country name for the artist based on country_id
                            $country_query = "SELECT country_name FROM countries WHERE country_id = :country_id";
                            $country_stmt = $connection->prepare($country_query);
                            $country_stmt->bindParam(':country_id', $artist['country_id']);
                            $country_stmt->execute();
                            $country = $country_stmt->fetch();
                            echo $country ? htmlspecialchars($country['country_name']) : 'Unknown';
                            ?>
                        </td>
                        <td><?= $artist['created_at']; ?></td>
                        <td><?= $artist['updated_at']; ?></td>
                        <td>
                            <a href="admin_artist_edit.php?id=<?= $artist['artist_id']; ?>"
                                class="btn btn-sm btn-warning text-white text-decoration-none">
                                <i class="bi bi-pencil me-1" style="font-size: 18px;"></i>
                            </a>
                            <!-- Delete button -->
                            <form method="POST" action="admin_artist_delete.php" class="d-inline" id="deleteForm<?= $artist['artist_id']; ?>">
                                <input type="hidden" name="artist_id" value="<?= $artist['artist_id']; ?>">
                                <button type="button" class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?= $artist['artist_id']; ?>)">
                                    <i class="bi bi-trash me-1"  style="font-size: 18px;"></i>
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