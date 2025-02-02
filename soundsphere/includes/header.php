<?php
include_once('config/db.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Prepare and execute the query to fetch the user's photo from the database
    $db = new Database();
    $pdo = $db->getConnection();
    $stmt = $pdo->prepare("SELECT photo FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if user exists and fetch the photo
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        $_SESSION['photo'] = $user['photo'];  // Store the photo in session
    } else {
        $_SESSION['photo'] = 'default.png';  // Fallback image if user doesn't have one
    }
}
?>

<link rel="stylesheet" href="assets/css/header.css">

<div class="navbar navbar-expand-lg navbar-dark" style="height: 90px;">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <!-- Left Icon Button (Home) -->
        <button class="icon-button" id="home-button">
            <i class="fa fa-home"></i>
        </button>

        <!-- Search Bar -->
        <input type="text" class="search-bar" style="width: 500px;" placeholder="Search music, artists, albums...">

        <!-- Right Icon Button (Parcourir) -->
        <button class="icon-button" id="parcourir-button">
            <i class="fa fa-search"></i>
        </button>
    </div>

    <div class="user-profile ms-auto">
        <!-- Profile Image -->
        <?php if (isset($_SESSION['photo'])): ?>
            <img src="assets/images/<?php echo htmlspecialchars($_SESSION['photo']); ?>" alt="User Image" id="user-avatar">
        <?php else: ?>
            <img src="assets/images/default.png" alt="Default User Image" id="user-avatar">
        <?php endif; ?>

        <!-- Dropdown Menu for Profile and Settings -->
        <div class="user-dropdown">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>
