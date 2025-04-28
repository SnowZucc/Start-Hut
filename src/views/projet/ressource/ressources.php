<?php
// ressources.php
include 'data.php';
$type = $_GET['type'] ?? 'guides';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressources - Start-Hut</title>
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-fatma.css">
</head>
<body>
    <?php include('../../templates/header.php'); ?>

    <div class="content">
        <!-- Barre de navigation secondaire -->
        <nav class="sub-navbar">
            <ul>
                <li><a href="espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
                <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
                <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
                <li><a href="ressources.php" class="active">Ressources</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                <li><a href="?type=guides" class="<?= $type == 'guides' ? 'active' : '' ?>">Guides & Articles</a></li>
                <li><a href="?type=templates" class="<?= $type == 'templates' ? 'active' : '' ?>">Templates & Documents</a></li>
                <li><a href="?type=videos" class="<?= $type == 'videos' ? 'active' : '' ?>">Vidéos & Webinaires</a></li>
                <li><a href="?type=mentors" class="<?= $type == 'mentors' ? 'active' : '' ?>">Mentors & Experts</a></li>
                <li><a href="?type=outils" class="<?= $type == 'outils' ? 'active' : '' ?>">Outils Recommandés</a></li>
            </ul>
        </aside>

        <!-- Zone principale -->
        <section class="content-area">
            <div class="cards-container">
                <?php if ($type == 'guides'): ?>
                    <?php foreach ($guides as $item): ?>
                        <div class="card">
                            <h3><?= $item['title'] ?></h3>
                            <p><?= $item['excerpt'] ?></p>
                            <a href="<?= $item['link'] ?>">Lire plus</a>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($type == 'templates'): ?>
                    <?php foreach ($templates as $item): ?>
                        <div class="card">
                            <h3><?= $item['title'] ?></h3>
                            <a href="<?= $item['file'] ?>" download>Télécharger</a>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($type == 'videos'): ?>
                    <?php foreach ($videos as $item): ?>
                        <div class="card video">
                            <h3><?= $item['title'] ?></h3>
                            <iframe src="<?= $item['url'] ?>" frameborder="0" allowfullscreen></iframe>
                            <textarea placeholder="Votre commentaire..."></textarea>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($type == 'mentors'): ?>
                    <?php foreach ($mentors as $item): ?>
                        <div class="card">
                            <h3><?= $item['name'] ?></h3>
                            <p>Spécialité : <?= $item['specialty'] ?></p>
                            <a href="<?= $item['contact'] ?>">Contacter</a>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($type == 'outils'): ?>
                    <div class="card">
                        <p>Section Outils Recommandés en cours de construction...</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <?php include('../../templates/footer.php'); ?>
</body>
</html>