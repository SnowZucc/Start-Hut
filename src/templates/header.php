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
                
                <?php if ($user_type === 'admin'): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
                <?php endif; ?>

                <?php if ($user_type === 'porteur'): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/projet/annonce/posterannonce.php">Poster une annonce</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
                <?php endif; ?>
                <?php if ($user_type === 'collaborateur'): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
                <?php endif; ?>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
                    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
                    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
                    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
                <?php endif; ?>

    
            </ul>

            <div class="auth-buttons">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="/Start-Hut/src/views/user/connexion.php" class="signup">Se connecter</a>
                <?php else: ?>
                    <?php if ($user_type === 'admin'): ?>
                        <a href="/Start-Hut/src/views/admin.php" class="signup">Panneau admin</a>
                    <?php elseif ($user_type === 'porteur'): ?>
                        <a href="/Start-Hut/src/views/projet/espace-projet.php" class="signup">Espace projet</a>
                    <?php elseif ($user_type === 'collaborateur'): ?>
                        <a href="/Start-Hut/src/views/projet/espace-collaborateur.php" class="signup">Espace collaborateur</a>
                    <?php endif; ?>
                    <a href="/Start-Hut/src/views/user/profil.php" class="signup">Mon profil</a>
                    
                    <?php
                    // Modifs au fonctionnement du header pour régler le problème de session already closed
                    // Récupération de l'image de profil
                    // On s'assure que $conn est disponible et est la connexion principale
                    // Ne pas redéclarer require_once pour config.php si déjà fait par le script appelant
                    // Ne pas créer une nouvelle connexion $conn ici si elle existe déjà
                    
                    $user_image_lien = '/Start-Hut/public/assets/img/APRIL.png'; // Image par défaut
                    if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error && isset($_SESSION['user_id'])) {
                        $user_id_header = $_SESSION['user_id'];
                        $sql_header = "SELECT d.lien FROM Documents d WHERE d.proprietaire = ? AND d.type = 'image' LIMIT 1";
                        $stmt_header = $conn->prepare($sql_header);
                        if ($stmt_header) {
                            $stmt_header->bind_param("i", $user_id_header);
                            $stmt_header->execute();
                            $result_header = $stmt_header->get_result();
                            if ($user_image_assoc = $result_header->fetch_assoc()) {
                                if (!empty($user_image_assoc['lien'])) {
                                    $user_image_lien = $user_image_assoc['lien'];
                                }
                            }
                            $stmt_header->close();
                        } // Ne pas faire $conn->close() ici finalement
                    }
                    ?>
                    
                    <a href="/Start-Hut/src/views/user/profil.php" class="profile-image-link">
                        <img src="<?php echo htmlspecialchars($user_image_lien); ?>" class="header-profile-pic" alt="Photo de profil">
                    </a>
                <?php endif; ?>
            </div>
    </nav> 

    <div class="navbar-border"></div> <!-- Bordure largeur de tout l'écran-->
</div>

<style>
.auth-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-profile-pic {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-image-link {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>