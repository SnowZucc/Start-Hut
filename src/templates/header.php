<div class="navbar-container">
    <nav class="navbar">
        <div class="logo">
            <a href="/Start-Hut/public/index.php"><img src="/Start-Hut/public/assets/img/logo.png" alt="Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="/Start-Hut/src/views/annonces.php">Rejoindre un projet</a></li>
            <li><a href="/Start-Hut/src/views/projet/annonce/posterannonce.php">Poster une annonce</a></li>
            <li><a href="/Start-Hut/src/views/abonnements.php">Abonnement</a></li>
            <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
        </ul>
        <div class="auth-buttons"> 
            <?php         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        } if (!isset($_SESSION['user_id'])) : ?>    <!-- Si la session est définie -->
                <a href="/Start-Hut/src/views/user/connexion.php" class="signup">Connexion</a>
            <?php else : ?>                                 <!-- Sinon -->
                <a href="/Start-Hut/src/views/projet/espace-projet.php" class="signup">Espace projet</a>
                <a href="/Start-Hut/src/views/user/profil.php" class="signup">Mon profil</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="navbar-border"></div> <!-- Bordure largeur de tout l'écran-->
</div>