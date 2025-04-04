<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Insert new user into the database
        $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, email, role, password) VALUES (:first_name, :last_name, :email, :role, :password)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        header("Location: admin_users.php?message=User added successfully");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<link rel="stylesheet" href="assets/css/admin_users.css">
<div class="col-md-9 col-lg-10 py-4 main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Add New User</h1>
    </div>

    <form class="d-flex justify-content-center flex-column align-items-center" method="POST">
        <div class="col-md-6 mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control form-add" id="first_name" placeholder="Enter first name" name="first_name" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control form-add" id="last_name" placeholder="Enter last name" name="last_name" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-add" id="email" placeholder="Enter email" name="email" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select form-add" id="role" name="role" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-add" id="password" placeholder="Enter password" name="password" required>
        </div>

        <div class="d-flex justify-content-end">
            <a href="admin_users.php" class="btn me-2 btn-cancel text-center">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
            <button type="submit" class="btn btn-custom d-flex align-items-center px-4 py-2 shadow-sm rounded-pill"style="width: 160px">
                <i class="bi bi-save me-2"></i> Save User
            </button>
        </div>
    </form>
</div>

<?php include_once('includes/footer.php'); ?>
</div>