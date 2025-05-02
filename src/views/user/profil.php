<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-quentin.css">
</head>
<body>

<?php 
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../../templates/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

// Connexion DB
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Si formulaire envoyé
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $prenom = $_POST['prenom'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description_profil'] ?? '';
        $langues = $_POST['langues_parlees'] ?? '';

        $sqlUpdate = "UPDATE Utilisateurs SET prenom = ?, nom = ?, description_profil = ?, langues_parlees = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ssssi", $prenom, $nom, $description, $langues, $user_id);
        $stmtUpdate->execute();
    }

    // Récupération des données mises à jour
    $sql = "SELECT * FROM Utilisateurs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<div class="content">
    <div class="profile-section">
        <form method="POST" action="">
            <div class="profile-container">
                <label for="file-upload">
                <img src="<?php echo $user['lien'] ?? '/Start-Hut/public/assets/img/APRIL.png'; ?>" id="profile-pic" class="profile-pic" alt="Photo de profil">
                    <div class="edit-text">Modifier la photo</div>
                </label>
                <input type="file" id="file-upload" class="CV-input" accept="image/*">
            </div>

            <div class="form-grid">
                <div class="form-box">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="input-field" placeholder="Votre prénom" 
                        value="<?php echo htmlspecialchars($user['prenom'] ?? ''); ?>">

                    <label>Nom</label>
                    <input type="text" name="nom" class="input-field" placeholder="Votre nom"
                        value="<?php echo htmlspecialchars($user['nom'] ?? ''); ?>">

                    <label>Adresse mail</label>
                    <input type="email" class="input-field" readonly
                        value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? 'Non connecté'); ?>">

                    <label>Mot de Passe</label>
                    <input type="password" class="input-field" placeholder="Nouveau mot de passe">  

                    <label>Statut</label>
                    <select class="dropdown" name="statut">
                        <option value="" disabled selected>Choisissez votre statut</option>
                        <option value="porteur" <?php echo isset($user['statut']) && $user['statut'] == 'emploi' ? 'selected' : ''; ?>>Porteur de projet</option>
                        <option value="collaborateur" <?php echo isset($user['statut']) && $user['statut'] == 'entrepreneur' ? 'selected' : ''; ?>>Collaborateur</option>
                    </select>

                    <label>Votre CV</label>
                    <input type="file" class="input-field">
                </div>

                <div class="form-box">
                    <label>Autres documents</label>
                    <input type="file" class="input-field">

                    <label>Ma description</label>
                    <textarea name="description_profil" class="input-field description" placeholder="Décrivez-vous. Soyez inspiré." style="height: 150px; resize: none;"><?php echo htmlspecialchars($user['description_profil'] ?? ''); ?></textarea>

                    <label>Langues parlées</label>
                    <input type="text" name="langues_parlees" class="input-field" placeholder="Vos langues"
                        value="<?php echo htmlspecialchars($user['langues_parlees'] ?? ''); ?>">
                </div>
            </div>

            <div class="button-container">        
                <button type="submit" class="save-button">Sauvegarder</button>
            </div>
        </form>
    </div>
</div>

<?php 
$conn->close();
include('../../templates/footer.php'); 
?>

<script>
    document.getElementById("file-upload").addEventListener("change", function(event) {
        let image = document.getElementById("profile-pic");
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
