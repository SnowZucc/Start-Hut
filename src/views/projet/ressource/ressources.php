
<?php
// ressources.php
include 'data.php';
$type = $_GET['type'] ?? 'guides';
?>
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
    <ul>
      <li><a href="#" class="active">Guides & Articles</a></li>
      <li><a href="#">Templates & Documents</a></li>
      <li><a href="#">Vidéos & Webinaires</a></li>
      <li><a href="#">Mentors & Experts</a></li>
      <li><a href="#">Outils Recommandés</a></li>
    </ul>
  </aside>

  <!-- Zone principale -->
  <section class="content-area">
    <div class="cards-container">
      <div class="card"></div>
      <div class="card"></div>
      <div class="card"></div>
      <div class="card"></div>
      <div class="card"></div>
      <div class="card"></div>
    </div>

    <!-- Texte explicatif invisible sur le site (juste pour dev, à supprimer ensuite) -->
    <!--
    “Espace de Consultation” (Affichage du contenu sélectionné)
    ➜ Affichage dynamique :
    - Si “Guides” → Articles sous format cartes avec aperçu et bouton “Lire plus”.
    - Si “Templates” → Fichiers téléchargeables avec aperçu.
    - Si “Vidéos” → Lecteur intégré avec section commentaires.
    - Si “Mentors” → Liste avec profils, spécialités et bouton “Contacter”.
    -->
  </section>
</div>


    <?php include('../../../templates/footer.php'); ?>
</body>
</html>