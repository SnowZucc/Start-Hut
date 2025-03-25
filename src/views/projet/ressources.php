<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-fatma.css">
        <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
    </head>
    <body>
        <?php include('../../templates/header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
             <div class="content">                       <!-- on mets tout dans cette classe pour que les info soient centré -->
                <!-- Barre de navigation secondaire -->
                <nav class="sub-navbar">
                    <ul>
                    <li><a href="espace-projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'espace-projet.php' ? 'active' : '' ?>">Mes annonces</a></li>
                    <li><a href="recrutement.php" class="<?= basename($_SERVER['PHP_SELF']) == 'recrutement.php' ? 'active' : '' ?>">Recrutement</a></li>
                    <li><a href="projet.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projet.php' ? 'active' : '' ?>">Projet</a></li>
                    <li><a href="ressources.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ressources.php' ? 'active' : '' ?>">Ressources</a></li>
                    </ul>
                </nav>


            </div>

       
    </body>
</html>

<div class="main-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul>
            <li><a href="#">Guides & Articles</a></li>
            <li><a href="#">Templates & Documents</a></li>
            <li><a href="#">Vidéos & Webinaires</a></li>
            <li><a href="#">Mentors & Expert</a></li>
            <li><a href="#">Outils Recommandés</a></li>
        </ul>
    </aside>

    <!-- Zone principale avec les cartes -->
    <section class="content-area">
        <div class="cards-container">
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
        </div>
    </section>
    <?php include('../../templates/footer.php'); ?>    
</div>