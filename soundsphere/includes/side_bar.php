<?php
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/side_bar.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<nav class="sidebar">
    <div class="sidebar-header" style="margin-bottom: 30px;">
        <i class="fas fa-headphones-alt"></i> SoundSphere
    </div>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true): ?>
    <?php endif; ?>
    <a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt">
        </i> Admin Dashboard
    </a>
    <a href="admin_users.php"><i class="fas fa-users-cog">
        </i> Manage Users</a>

    <a href="admin_artists.php">
        <i class="fas fa-user"></i> Manage Artists
    </a>

    <a href="admin_countries.php">
        <i class="fas fa-tags"></i> Manage Countries
    </a>

    <a href="admin_albums.php">
        <i class="fas fa-music"></i> Manage Albums
    </a>


    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

<style>
    .main-content {
        margin-left: 250px;
        padding: 20px;
        height: 100vh;
        overflow-y: auto;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
