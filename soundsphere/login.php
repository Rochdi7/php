<?php
session_start();
require_once 'config/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $db = new Database();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin'];  // Set is_admin if needed
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Adresse e-mail ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        $error = "Erreur lors de la connexion : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Se Connecter</title>

</head>

<body>

<div class="container login-container">
    <div class="form-container">
        <div class="form-section">
            <h1 class="form-title">Se Connecter</h1>
            <?php if (!empty($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="text" name="email" class="form-control" placeholder="Adresse e-mail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="show-password" id="show-password" class="form-check-input">
                    <label for="show-password" class="form-check-label" style="margin-top: 3px;">Afficher le mot de passe</label>
                </div>
                <button class="btn btn-login" type="submit">Se Connecter</button>
            </form>
            <a href="inscription.php" class="link-seconnecter">Tu n'as pas de compte ? Inscris-toi !</a>
        </div>
        <div class="image-section">
            <img src="assets/images/rapper.jpg" alt="Login Image" class="img-fluid" style="border-radius: 10px;">
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>