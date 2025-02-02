<?php
include_once('config/db.php');

$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    try {
        // Delete user from the database
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();

        echo "User deleted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
