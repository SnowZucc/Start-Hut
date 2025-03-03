<div class="navbar-container">
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="src/img/logo.png" alt="Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="annonces.php">Rejoindre un projet</a></li>
            <li><a href="posterannonce.php">Poster une annonce</a></li>
            <li><a href="abonnement.php">Abonnement</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
        </ul>
        <div class="auth-buttons"> 
            <?php session_start(); if (!isset($_SESSION['user_id'])) : ?>    <!-- Si la session est définie -->
                <a href="connexion.php" class="signup">Connexion</a>
            <?php else : ?>                                 <!-- Sinon -->
                <a href="profil.php" class="signup">Mon profil</a>
                <a href="monannonce.php" class="signup">Mes annonces</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="navbar-border"></div> <!-- Bordure largeur de tout l'écran-->
</div>