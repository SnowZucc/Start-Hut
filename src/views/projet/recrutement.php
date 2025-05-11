<?php
error_reporting(E_ERROR); // Affiche uniquement les erreurs fatales
ini_set('display_errors', 0); // N'affiche pas les erreurs à l'écran
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement - Start-Hut</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css"> 
</head>
<?php
include('../../templates/header.php');?>
<body>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');
session_start();

$porteur_id = $_SESSION['user_id'] ?? null;
$equipe = [];
$candidatures = [];

if ($porteur_id) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // 1. Récupérer les membres de l'équipe avec aussi leurs photos
    $stmt_equipe = $conn->prepare("
        SELECT u.id AS id_utilisateur, p.id AS id_projet, u.nom, u.prenom, u.email,
               d.lien AS photo_profil
        FROM ParticipantsProjets pp
        JOIN Utilisateurs u ON pp.id_participant = u.id
        JOIN Projets p ON pp.id_projet = p.id
        LEFT JOIN Documents d ON u.id = d.proprietaire AND d.type = 'image' 
        WHERE p.createur = ?
    ");
    $stmt_equipe->bind_param("i", $porteur_id);
    $stmt_equipe->execute();
    $result_equipe = $stmt_equipe->get_result();
    $equipe = $result_equipe->fetch_all(MYSQLI_ASSOC);
    $stmt_equipe->close();

    // 2. Récupérer les candidatures avec aussi les photos
    $stmt = $conn->prepare("
        SELECT 
            u.nom, u.prenom, u.email,
            p.annonce_titre,
            c.utilisateur_id, c.projet_id,
            c.statut, c.date_postulation,
            d.lien AS photo_profil
        FROM Candidatures c
        JOIN Utilisateurs u ON c.utilisateur_id = u.id
        JOIN Projets p ON c.projet_id = p.id
        LEFT JOIN Documents d ON u.id = d.proprietaire AND d.type = 'image'
        WHERE p.createur = ?
        ORDER BY c.date_postulation DESC
    ");
    $stmt->bind_param("i", $porteur_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $candidatures = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $conn->close();
}
?>


<!-- Barre de navigation secondaire -->

<nav class="sub-navbar">
    <ul>
    <li><a href="espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
    <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
    <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
    <li><a href="ressource/ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressources.php' ? 'active' : '' ?>">Ressources</a></li>
    </ul>
</nav>

<main class="recrutement-container">
    <!-- Section Mon Équipe -->
    <section class="mon-equipe">
    <h2>Mon équipe</h2>
<div class="equipe-liste">
<?php if (empty($equipe)) : ?>
    <p>Aucun membre pour le moment.</p>
<?php else : ?>
    <?php foreach ($equipe as $membre) : ?>
        <div class="equipe-card">
            <div class="equipe-avatar">
                <img src="<?php echo $membre['photo_profil'] ?? '/Start-Hut/public/assets/img/APRIL.png'; ?>" alt="Avatar">
            </div>
            <div class="equipe-info">
                <h3><?= htmlspecialchars($membre['prenom'] . ' ' . $membre['nom']) ?></h3>
                <p><?= htmlspecialchars($membre['email']) ?></p>
                
            </div>
            <div class="recrutement-actions">
                <button class="btn-chat">Chat</button>
            </div>
     
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
    </section>

    <!-- Section Recrutement en cours -->
    <section class="recrutement-en-cours">
    <h2>Recrutement en cours</h2>

    <?php if (empty($candidatures)) : ?>
        <p>Aucun collaborateur n’a encore postulé à vos annonces.</p>
    <?php else : ?>
        <div class="recrutement-liste">
        <?php foreach ($candidatures as $candidat) : ?>
            <?php if ($candidat['statut'] === 'refuse') continue; ?>
                <div class="recrutement-card">
                    <div class="recrutement-avatar">
                        <img src="<?php echo $candidat['photo_profil'] ?? '/Start-Hut/public/assets/img/APRIL.png'; ?>" alt="Avatar">
                    </div>
                    <div class="recrutement-info">
                        <h3><?= htmlspecialchars($candidat['prenom'] . ' ' . $candidat['nom']) ?></h3>
                        <p><strong>Projet :</strong> <?= htmlspecialchars($candidat['annonce_titre']) ?></p>
                        <p><strong>Email :</strong> <?= htmlspecialchars($candidat['email']) ?></p>
                        <p><strong>Statut :</strong> <?= htmlspecialchars($candidat['statut']) ?></p>
                        <p><strong>Date de candidature :</strong> <?= htmlspecialchars($candidat['date_postulation']) ?></p>
                    </div>
                    <div class="recrutement-actions">
                        <form action="traiter_candidature.php" method="POST" style="display:inline;">
        <input type="hidden" name="utilisateur_id" value="<?= htmlspecialchars($candidat['utilisateur_id']) ?>">
        <input type="hidden" name="projet_id" value="<?= htmlspecialchars($candidat['projet_id']) ?>">
        <input type="hidden" name="action" value="accepter">
        <button type="submit" class="btn-accepter">Accepter</button>
    </form>
                         <!-- Formulaire pour refuser -->
    <form action="traiter_candidature.php" method="POST" style="display:inline;">
        <input type="hidden" name="utilisateur_id" value="<?= $candidat['utilisateur_id'] ?>">
        <input type="hidden" name="projet_id" value="<?= $candidat['projet_id'] ?>">
        <input type="hidden" name="action" value="refuser">
        <button type="submit" class="btn-refuser">Refuser</button>
    </form>
                        <button class="btn-chat">Chat</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

</main>

<?php include('../../templates/footer.php'); ?>

</body>
</html>
