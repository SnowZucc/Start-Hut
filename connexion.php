<?php
session_start();
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "StartHut");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, email, mot_de_passe, type FROM Utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['mot_de_passe']) {
            // Connexion réussie, créer session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_type'] = $user['type'];

            header("Location: index.php"); // Rediriger vers la page d'accueil
            exit;
        } else {
            $error_message = "Mot de passe incorrect";
        }
    } else {
        $error_message = "Aucun compte associé à cette adresse email";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="stylesheet" href="stylesguillaume.css?v=4">
</head>
<body>
    <?php include('header.php'); ?>

    <div class="content">
        <h1 class="connexion-title">CONNEXION</h1>

        <?php if (!empty($error_message)): ?>    <!-- Si il y a une erreur -->
            <div class="error-message"><?php echo $error_message; ?></div>  <!-- Affiche l'erreur -->
        <?php endif; ?>

        <div class="form-container">
            <form action="connexion.php" method="POST" class="connexion">
                <div class="form-group">
                    <label for="email">Adresse mail <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="input-field" placeholder="Votre adresse mail" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe <span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Votre mot de passe" required>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="forgot-password">Mot de passe oublié ?</a>
                </div>

                <div class="button-container">
                    <button type="submit" class="btnConnexion">Se connecter</button>
                </div>
                <p class="register-link">Pas encore de compte ? <a href="inscription.php">S’Inscrire</a></p>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
