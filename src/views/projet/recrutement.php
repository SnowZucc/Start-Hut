<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion d'équipe et Recrutement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-khaleb.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css">
    </head>
<body>
    <?php include('../../templates/header.php'); ?>
    <!-- Barre de navigation secondaire -->
    <nav class="sub-navbar">
        <ul>
        <li><a href="espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
        <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
        <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
        <li><a href="ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressources.php' ? 'active' : '' ?>">Ressources</a></li>
        </ul>
    </nav>
    <div class="recrutement-container">
        <div class="team-section">
            <h2>Mon équipe</h2>
            <div class="team-member">
                <img src="profile-placeholder.png" alt="Photo de profil">
                <div class="info">
                    <p><strong>Nom</strong></p>
                    <p>Rôle</p>
                    <button class="info-btn">Afficher Informations</button>
                </div>
                <div class="actions">
                    <button class="modify-role">Modifier Rôle</button>
                    <button class="remove">Retirer</button>
                </div>
            </div>
        </div>
        
        <div class="recruitment-section">
            <h2>Recrutement en cours</h2>
            <select class="competence-filter">
                <option value="all">Toutes les compétences</option>
                <option value="dev">Développement</option>
                <option value="design">Design</option>
                <option value="gestion">Gestion de projet</option>
            </select>
            
            <div class="recruitment-card">
                <img src="profile-placeholder.png" alt="Photo de profil">
                <div class="candidate-info">
                    <p><strong>Nom</strong> | Spécialité | Présentation</p>
                </div>
                <div class="actions">
                    <button class="accept">Accepter</button>
                    <button class="decline">Refuser</button>
                    <button class="chat">Chat</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('../../templates/footer.php'); ?>
</body>
</html>