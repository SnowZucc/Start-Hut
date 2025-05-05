<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ressources - Start-Hut</title>
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css" />
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css" />
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/consultation.css" />
</head>
<body>

<?php include('../../templates/header.php'); ?>

<!-- Barre de navigation secondaire -->
<nav class="sub-navbar">
  <ul>
    <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
    <li><a href="espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
    <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
    <li><a href="ressource/ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressources.php' ? 'active' : '' ?>">Ressources</a></li>
  </ul>
</nav>

<main class="consultation-container">
  <aside class="sidebar">
    <button>Guides & Articles</button>
    <button>Templates & Documents</button>
    <button>Vidéos & Webinaires</button>
    <button>Mentors & Expert</button>
    <button>Outils Recommandés</button>
  </aside>

  <section class="content">
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
  </section>
</main>

<?php include('../../templates/footer.php'); ?>

</body>
</html>
