<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $birthday = trim($_POST['birthday']);
    $photo = 'default.jpg';
    $gender = trim($_POST['gender']);
    $is_active = 1;
    $is_admin = 0;

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Tous les champs marqués d'un * sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse e-mail invalide.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            $db = new Database();
            $connection = $db->getConnection();
            $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $emailExists = $stmt->fetchColumn();

            if ($emailExists > 0) {
                $error = "Cet email est déjà utilisé.";
            } else {

                $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, email, password, birthday, photo, gender, is_active, is_admin) 
                                              VALUES (:first_name, :last_name, :email, :password, :birthday, :photo, :gender, :is_active, :is_admin)");

                $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':first_name', $first_name);
                $stmt->bindParam(':last_name', $last_name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $passwordhashed);
                $stmt->bindParam(':birthday', $birthday);
                $stmt->bindParam(':photo', $photo);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':is_active', $is_active);
                $stmt->bindParam(':is_admin', $is_admin);

                $stmt->execute();
                $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            }
        } catch (PDOException $e) {
            $error = "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/inscrtiption.css">

    <title>Inscription</title>

</head>

<body>

    <div class="container signup-container">
        <div class="form-container">
            <h1 class="form-title">Welcome to the World of Streaming Music!</h1>
            <form action="" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Prénom *</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Prénom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Nom *</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="birthday" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" name="birthday" placeholder="Date de naissance">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Genre</label>
                        <select name="gender" class="form-control">
                            <option value="male">Homme</option>
                            <option value="female">Femme</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Adresse e-mail *</label>
                        <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe *</label>
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm_password" class="form-label">Confirmez le mot de passe *</label>
                        <input type="password" class="form-control" name="confirm_password"
                            placeholder="Confirmez le mot de passe" required>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-continue">Inscription</button>
                </div>
                <div class="social-connect">
                    <p>Connect with Social</p>
                    <div class="social-connect-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-google"></i>
                        <i class="fab fa-apple"></i>
                    </div>
                </div>
                <div class="already-account">
                    <p>Avez-vous déjà un compte ? <a href="login.php">Se Connecter</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>