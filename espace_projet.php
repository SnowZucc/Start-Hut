<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Projet</title>
    <link rel="stylesheet" href="styles.css?v=4">
    <link rel="stylesheet" href="src/styles/stylesguillaume.css?v=4">
</head>
<body>

<?php include('header.php'); ?>

<!-- Barre de navigation secondaire -->
<nav class="sub-navbar">
    <ul>
    <li><a href="espace_projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'mes_annonces.php' ? 'active' : '' ?>">Mes annonces</a></li>
    <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
    <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
    <li><a href="ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressources.php' ? 'active' : '' ?>">Ressources</a></li>
    </ul>
</nav>

<!-- Inclusion automatique de la page Mes annonces par défaut -->
<?php include('mes_annonces.php'); ?>

<?php include('footer.php'); ?>

</body>
</html>
