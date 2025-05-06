<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement - Start-Hut</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    <?php include('../../templates/head.php'); ?>
</head>
<body>

<?php include('../../templates/header.php'); ?>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');


$porteur_id = $_SESSION['user_id'] ?? null;
$candidatures = [];

if ($porteur_id) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "
        SELECT 
            u.nom, u.prenom, u.email,
            p.annonce_titre,
            c.statut, c.date_postulation
        FROM Candidatures c
        JOIN Utilisateurs u ON c.utilisateur_id = u.id
        JOIN Projets p ON c.projet_id = p.id
        WHERE p.createur = ?
        ORDER BY c.date_postulation DESC
    ";
    $stmt = $conn->prepare($sql);
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
            <!-- Carte 1 -->
            <div class="equipe-card">
                <div class="equipe-avatar">
                    <img src="https://img.freepik.com/vecteurs-libre/paysage-printemps-tente-montagnes_23-2148820229.jpg" alt="Avatar">
                </div>
                <div class="equipe-info">
                    <h3>Nom</h3>
                    <p>Rôle</p>
                    <button class="btn-info">Afficher Informations</button>
                </div>
                <div class="recrutement-actions">
                        <button class="btn-chat">Chat</button>
                </div>
                <div class="equipe-actions">
                    <button class="btn-retirer">Retirer</button>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="equipe-card">
                <div class="equipe-avatar">
                    <img src="https://img.freepik.com/vecteurs-libre/paysage-printemps-tente-montagnes_23-2148820229.jpg" alt="Avatar">
                </div>
                <div class="equipe-info">
                    <h3>Nom</h3>
                    <p>Rôle</p>
                    <button class="btn-info">Afficher Informations</button>
                </div>
                <div class="recrutement-actions">
                        <button class="btn-chat">Chat</button>
                </div>
                <div class="equipe-actions">
                    <button class="btn-retirer">Retirer</button>
                </div>
            </div>

            <!-- Carte 3 -->
            <div class="equipe-card">
                <div class="equipe-avatar">
                    <img src="https://img.freepik.com/vecteurs-libre/paysage-printemps-tente-montagnes_23-2148820229.jpg" alt="Avatar">
                </div>
                <div class="equipe-info">
                    <h3>Nom</h3>
                    <p>Rôle</p>
                    <button class="btn-info">Afficher Informations</button>
                </div>
                <div class="recrutement-actions">
                        <button class="btn-chat">Chat</button>
                </div>
                <div class="equipe-actions">
                    <button class="btn-retirer">Retirer</button>
                </div>
            </div>
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
                <div class="recrutement-card">
                    <div class="recrutement-avatar">
                        <img src="https://randomuser.me/api/portraits/lego/2.jpg" alt="Avatar">
                    </div>
                    <div class="recrutement-info">
                        <h3><?= htmlspecialchars($candidat['prenom'] . ' ' . $candidat['nom']) ?></h3>
                        <p><strong>Projet :</strong> <?= htmlspecialchars($candidat['annonce_titre']) ?></p>
                        <p><strong>Email :</strong> <?= htmlspecialchars($candidat['email']) ?></p>
                        <p><strong>Statut :</strong> <?= htmlspecialchars($candidat['statut']) ?></p>
                        <p><strong>Date de candidature :</strong> <?= htmlspecialchars($candidat['date_postulation']) ?></p>
                    </div>
                    <div class="recrutement-actions">
                        <button class="btn-accepter">Accepter</button>
                        <button class="btn-refuser">Refuser</button>
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
