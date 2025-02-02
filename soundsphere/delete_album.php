<?php
include_once('config/db.php');
include_once('includes/header.php');
include_once('includes/side_bar.php');

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Delete the album
        $stmt = $conn->prepare("DELETE FROM albums WHERE id = :id");
        $stmt->execute([':id' => $id]);

        header("Location: admin_albums.php?message=Album deleted successfully");
        exit;
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
