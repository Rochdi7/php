<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$connection = $db->getConnection();

// Fetch albums and associated artists
$stmt = $connection->prepare("SELECT a.id, a.name, a.release_date, a.cover_image, b.artist_name 
                              FROM albums a 
                              JOIN artists b ON a.artist_id = b.artist_id");
$stmt->execute();
$albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if albums data is returned
if ($albums === false) {
    // Handle query failure
    $albums = [];
}
?>

<link rel="stylesheet" href="assets/css/admin_albums.css">
<div class="col-md-8 col-lg-9 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">🎶 Albums Dashboard</h1>
        <a href="admin_album_add.php" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow rounded-pill text-black text-decoration-none btn-add">
            <i class="bi bi-plus-circle me-2"></i>
            <span>Add Album</span>
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
                    <th>Album Name</th>
                    <th>Artist</th>
                    <th>Release Date</th>
                    <th>Cover Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($albums)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No albums available</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($albums as $album): ?>
                        <tr id="albumRow<?= $album['id']; ?>" class="text-center">
                            <td><?= htmlspecialchars($album['name']); ?></td>
                            <td><?= htmlspecialchars($album['artist_name']); ?></td>
                            <td><?= htmlspecialchars($album['release_date']); ?></td>
                            <td>
                                <img src="<?= htmlspecialchars($album['cover_image']); ?>" alt="Cover Image" class="img-fluid rounded-circle" style="max-width: 100px; height: auto;" />
                            </td>
                            <td>
                                <a href="admin_album_edit.php?id=<?= $album['id']; ?>" class="btn btn-sm btn-warning text-white text-decoration-none">
                                    <i class="bi bi-pencil me-1"></i>
                                </a>
                                <!-- Delete button -->
                                <button type="button" class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?= $album['id']; ?>)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for delete confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this album? This action cannot be undone.</p>
                <input type="hidden" id="albumIdToDelete">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteAlbum()">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>


<?php include_once('includes/footer.php'); ?>
</div>