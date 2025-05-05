<!-- Style pour retirer le soulignage et l'effet bleu des liens -->
<style>
    footer a {
        text-decoration: none;
        color: inherit;
    }
</style>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Navigation Principale</h3>

            <?php         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        } if (!isset($_SESSION['user_id'])) : ?>    <!-- Si la session est définie -->
            <p><a href="/Start-Hut/public/index.php">Accueil</a></p>
            <p><a href="/Start-Hut/src/views/annonces.php">Annonces</a></p>
            
            <p><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></p>
            <?php else : ?>                                 <!-- Sinon -->
                <p><a href="/Start-Hut/public/index.php">Accueil</a></p>
            <p><a href="/Start-Hut/src/views/annonces.php">Annonces</a></p>
            <p><a href="/Start-Hut/src/views/projet/annonce/posterannonce.php">Poster une annonce</a></p>
            <p><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></p>
            <?php endif; ?>
         
        </div>
        <div class="footer-section">
            <h3>Espace Client</h3>
            <?php         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        } if (!isset($_SESSION['user_id'])) : ?>    <!-- Si la session est définie -->
                <p><a href="/Start-Hut/src/views/user/connexion.php">Connexion</a></p>
                <p><a href="/Start-Hut/src/views/contact.php">Contact</a></p>
                
            <?php else : ?>                                 <!-- Sinon -->
                <p><a href="/Start-Hut/src/views/projet/espace-projet.php" >Espace projet</a></p>
                <p><a href="/Start-Hut/src/views/user/profil.php" >Mon profil</a></p>
                <p><a href="/Start-Hut/src/views/contact.php">Contact</a></p>
            <?php endif; ?>
            
          
        </div>
        <?php         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        } if (!isset($_SESSION['user_id'])) : ?>    <!-- Si la session est définie -->
                
            <?php else : ?>                                 <!-- Sinon -->
                <div class="footer-section">
            <h3>Mon projet</h3>
            <p><a href="/Start-Hut/src/views/projet/espace-projet.php">Espace projet</a></p>
            <p><a href="/Start-Hut/src/views/projet/espace-projet.php">Mes annonces</a></p>
            <p><a href="/Start-Hut/src/views/projet/recrutement.php">Recrutement</a></p>
            <p><a href="/Start-Hut/src/views/projet/ressources.php">Ressources</a></p>
        </div>
            <?php endif; ?>
        
        <div class="footer-section">
            <h3>Légales</h3>
            <p><a href="/Start-Hut/src/views/legal/cgu.php">CGU</a></p>
            <p><a href="/Start-Hut/src/views/legal/mentions.php">Mentions légales</a></p>
            <p><a href="/Start-Hut/src/views/legal/cookies.php">Politiques des cookies</a></p>
        </div>
    </div>
    <div class="footer-bottom">
   
    
    © 2025 StartHut - Tous droits réservés.
</div>

  
</footer>
