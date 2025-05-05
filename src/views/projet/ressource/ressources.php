<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-fatma.css">
        <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
        
       
    </head>
<body>
    <?php include('../../../templates/header.php'); ?>
    <div class="content">
        <!-- Barre de navigation secondaire -->
        <nav class="sub-navbar">
          <ul>
          <li><a href="../espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == '../espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
          <li><a href="../recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == '../recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
          <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
          <li><a href="ressource/ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressource/ressources.php' ? 'active' : '' ?>">Ressources</a></li>
          </ul>
        </nav>
    </div>

   

    <div class="main-container">
  <!-- Sidebar -->
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


    <?php include('../../../templates/footer.php'); ?>
</body>
</html>
