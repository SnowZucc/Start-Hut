<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement - Start-Hut</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css">
</head>
<body>

<?php include('../../templates/header.php'); ?>

<!-- Barre de navigation secondaire -->
<nav class="sub-navbar">
    <ul>
        <li><a href="espace-projet.php">Mes annonces</a></li>
        <li><a href="recrutement.php" class="active">Recrutement</a></li>
        <li><a href="projet.php">Projet</a></li>
        <li><a href="ressources.php">Ressources</a></li>
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
                <div class="equipe-actions">
                    <button class="btn-modifier">Modifier Rôle</button>
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
                <div class="equipe-actions">
                    <button class="btn-modifier">Modifier Rôle</button>
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
                <div class="equipe-actions">
                    <button class="btn-modifier">Modifier Rôle</button>
                    <button class="btn-retirer">Retirer</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Recrutement en cours -->
    <section class="recrutement-en-cours">
        <h2>Recrutement en cours</h2>
        <div class="filtre-competence">
            <select>
                <option value="all">Compétence</option>
                <option value="dev">Développement</option>
                <option value="design">Design</option>
                <option value="marketing">Marketing</option>
            </select>
        </div>

        <div class="recrutement-liste">
            <!-- Carte 1 -->
            <div class="recrutement-card">
                <div class="recrutement-avatar">
                    <img src="https://img.freepik.com/vecteurs-libre/paysage-printemps-tente-montagnes_23-2148820229.jpg" alt="Avatar">
                </div>
                <div class="recrutement-info">
                    <h3>Nom</h3>
                    <p>Spécialité | Présentation</p>
                </div>
                <div class="recrutement-actions">
                    <button class="btn-accepter">Accepter</button>
                    <button class="btn-refuser">Refuser</button>
                    <button class="btn-chat">Chat</button>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="recrutement-card">
                <div class="recrutement-avatar">
                    <img src="https://img.freepik.com/vecteurs-libre/paysage-printemps-tente-montagnes_23-2148820229.jpg" alt="Avatar">
                </div>
                <div class="recrutement-info">
                    <h3>Nom</h3>
                    <p>Spécialité | Présentation</p>
                </div>
                <div class="recrutement-actions">
                    <button class="btn-accepter">Accepter</button>
                    <button class="btn-refuser">Refuser</button>
                    <button class="btn-chat">Chat</button>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('../../templates/footer.php'); ?>

</body>
</html>
