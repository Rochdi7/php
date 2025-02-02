<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$connection = $db->getConnection();

$stmt = $connection->prepare("SELECT id, first_name, last_name, email, is_admin FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="assets/css/admin_users.css">
<div class="col-md-8 col-lg-9 py-4 text-white main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">👥 Users Management</h1>
        <a href="admin_user_add.php" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow rounded-pill text-black text-decoration-none btn-add" style=" width: 180px; ">
            <i class="bi bi-plus-circle me-2"></i>
            <span>Add User</span>
        </a>
    </div>

    <div class="table-responsive rounded shadow">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr id="userRow<?= $user['id']; ?>" class="text-center">
                        <td><?= htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= $user['is_admin'] ? 'Admin' : 'User'; ?></td>
                        <td>
                            <a href="admin_user_edit.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-warning text-white text-decoration-none">
                                <i class="bi bi-pencil me-1" style="font-size: 18px;"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?= $user['id']; ?>)">
                                <i class="bi bi-trash me-1" style="font-size: 18px;"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

<?php include_once('includes/footer.php'); ?>
</div>