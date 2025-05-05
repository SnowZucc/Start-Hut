<div class="navbar-container">
    <nav class="navbar">
        <div class="logo">
            <a href="/Start-Hut/public/index.php"><img src="/Start-Hut/public/assets/img/logo.png" alt="Logo"></a>
        </div>

            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $user_type = $_SESSION['user_type'] ?? null;
            ?>

            <ul class="nav-links">
                

                <?php if ($user_type === 'porteur'): ?>
                    <li><a href="/Start-Hut/src/views/projet/annonce/posterannonce.php">Poster une annonce</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                <?php endif; ?>
                <?php if ($user_type === 'collaborateur'): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                <?php endif; ?>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                <?php endif; ?>

    
            </ul>

            <div class="auth-buttons">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="/Start-Hut/src/views/user/connexion.php" class="signup">Se connecter</a>
                <?php else: ?>
                    <?php if ($user_type === 'porteur'): ?>
                        <a href="/Start-Hut/src/views/projet/espace-projet.php" class="signup">Espace projet</a>
                    <?php elseif ($user_type === 'collaborateur'): ?>
                        <a href="/Start-Hut/src/views/projet/espace-collaborateur.php" class="signup">Espace collaborateur</a>
                    <?php endif; ?>
                    <a href="/Start-Hut/src/views/user/profil.php" class="signup">Mon profil</a>
                <?php endif; ?>
            </div>
    </nav> 

    <div class="navbar-border"></div> <!-- Bordure largeur de tout l'écran-->
</div>

