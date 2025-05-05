<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Collaborateur</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    
</head>
<body>

<?php include('../../templates/header.php'); ?>

<!-- Barre de navigation secondaire --> 
<nav class="sub-navbar">
    <ul>
    <li><a href="historique.php" class="<?= basename($_SERVER['PHP_SELF']) == 'historique.php' ? 'active' : '' ?>">Historique</a></li>
    <li><a href="dashbord.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashbord.php' ? 'active' : '' ?>">Dashbord</a></li>
    </ul>
</nav>

<!-- Inclusion automatique de la page Mes annonces par défaut -->
<?php include('historique.php'); ?>

<?php include('../../templates/footer.php'); ?>

</body>
</html>
