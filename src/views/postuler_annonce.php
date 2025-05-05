
        <?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

// Vérifie que l'utilisateur est bien connecté
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'collaborateur') {
    header("Location: ../user/connexion.php");
    exit;
}

// Récupère les infos
$id_utilisateur = $_SESSION['user_id'];
$id_projet = $_POST['id_projet'] ?? null;

if (!$id_projet) {
    echo "Projet non spécifié.";
    exit;
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Vérifie s’il a déjà postulé
$check = $conn->prepare("SELECT * FROM Candidatures WHERE utilisateur_id = ? AND projet_id = ?");
$check->bind_param("ii", $id_utilisateur, $id_projet);
$check->execute();
$res = $check->get_result();

if ($res->num_rows > 0) {
    header("Location: annonce.php?id=$id_projet&msg=already_postulated");
    exit;
}

// Insère une nouvelle candidature
$stmt = $conn->prepare("INSERT INTO Candidatures (utilisateur_id, projet_id, statut, date_postulation) VALUES (?, ?, 'en attente', NOW())");
$stmt->bind_param("ii", $id_utilisateur, $id_projet);
$stmt->execute();

header("Location: annonce.php?id=$id_projet&msg=success");
exit;
?>
