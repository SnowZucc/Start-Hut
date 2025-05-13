<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

// Redirection si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /Start-Hut/src/views/user/connexion.php");
    exit();
}

// Connexion à la base
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$annonce_id = $_GET['edit'] ?? null;
$annonce = [];

if ($annonce_id && is_numeric($annonce_id)) {
    $stmt = $conn->prepare("SELECT * FROM Projets WHERE id = ? AND createur = ?");
    $stmt->bind_param("ii", $annonce_id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $annonce = $result->fetch_assoc();

    if (!$annonce) {
        die("Annonce non trouvée ou vous n'avez pas les droits.");
    }
} else {
    die("ID d'annonce invalide.");
}

// Traitement formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['annonce_titre'];
    $description = $_POST['annonce_description'];
    $categorie = $_POST['annonce_categorie'];
    $competences = $_POST['annonce_competences_recherchees'];
    $collaborateurs = $_POST['annonce_collaborateurs_souhaites'];
    $etat = $_POST['annonce_etat'];

    $stmt = $conn->prepare("UPDATE Projets SET annonce_titre = ?, annonce_description = ?, annonce_categorie = ?, annonce_competences_recherchees = ?, annonce_collaborateurs_souhaites = ?, annonce_etat = ? WHERE id = ? AND createur = ?");
    $stmt->bind_param("ssssssii", $titre, $description, $categorie, $competences, $collaborateurs, $etat, $annonce_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header("Location: /Start-Hut/src/views/projet/espace-projet.php?success=update");
        exit();
    } else {
        $error_message = "Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'annonce</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-quentin.css">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/src/templates/head.php'); ?>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/src/templates/header.php'); ?>

    <div class="annonce-edit-container">
    <h2>Modifier l'annonce</h2>
    <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>

    <form method="post">
        <div class="annonce-form-group">
            <label for="annonce_titre">Titre de l'annonce</label>
            <input type="text" name="annonce_titre" class="input-field" id="annonce_titre" value="<?= htmlspecialchars($annonce['annonce_titre']) ?>" required>
        </div>

        <div class="annonce-form-group">
            <label for="annonce_categorie">Catégorie</label>
            <input type="text" name="annonce_categorie" class="input-field" id="annonce_categorie" value="<?= htmlspecialchars($annonce['annonce_categorie']) ?>" required>
        </div>

        <div class="annonce-form-group">
            <label for="annonce_collaborateurs_souhaites">Collaborateurs souhaités</label>
            <input type="number" name="annonce_collaborateurs_souhaites" class="input-field" id="annonce_collaborateurs_souhaites" value="<?= htmlspecialchars($annonce['annonce_collaborateurs_souhaites']) ?>">
        </div>

        <div class="annonce-form-group">
            <label for="annonce_etat">État</label>
            <select name="annonce_etat" class="dropdown" id="annonce_etat">
                <option value="Brouillon" <?= $annonce['annonce_etat'] == 'Brouillon' ? 'selected' : '' ?>>Brouillon</option>
                <option value="Publiée" <?= $annonce['annonce_etat'] == 'Publiée' ? 'selected' : '' ?>>Publiée</option>
                <option value="Clôturée" <?= $annonce['annonce_etat'] == 'Clôturée' ? 'selected' : '' ?>>Clôturée</option>
            </select>
        </div>

        <div class="annonce-form-group">
            <label for="annonce_description">Description</label>
            <textarea name="annonce_description" class="description" id="annonce_description"><?= htmlspecialchars($annonce['annonce_description']) ?></textarea>
        </div>

        <div class="annonce-form-group">
            <label for="annonce_competences_recherchees">Compétences recherchées</label>
            <input type="text" name="annonce_competences_recherchees" class="input-field" id="annonce_competences_recherchees" value="<?= htmlspecialchars($annonce['annonce_competences_recherchees']) ?>">
        </div>

        <div class="annonce-button-container">
            <input type="submit" class="save-button" value="Enregistrer les modifications">
            <a href="/Start-Hut/src/views/projet/espace-projet.php" class="annuler-lien">Annuler</a>
        </div>
    </form>
</div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/src/templates/footer.php'); ?>
</body>
</html>
