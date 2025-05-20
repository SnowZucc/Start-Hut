<?php
error_reporting(E_ERROR); // Affiche uniquement les erreurs fatales
ini_set('display_errors', 0); // N'affiche pas les erreurs à l'écran
?>
<div class="navbar-container">
    <nav class="navbar">
        <div class="logo">
            <a href="/Start-Hut/public/index.php"><img src="/Start-Hut/public/assets/img/logo.png" alt="Logo"></a>
        </div>


<!-- Bouton hamburger -->
<button class="hamburger" onclick="toggleMenu()">
  ☰
</button>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_type = $_SESSION['user_type'] ?? null;
?>

<ul class="nav-links mobile-menu">
  <?php if ($user_type === 'porteur'): ?>
    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
    <li><a href="/Start-Hut/src/views/projet/annonce/posterannonce.php">Poster une annonce</a></li>
    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
  <?php elseif ($user_type === 'collaborateur'): ?>
    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
  <?php else: ?>
    <li><a href="/Start-Hut/src/views/annonces.php">Annonces</a></li>
    <li><a href="/Start-Hut/src/views/abonnements.php">Tarification</a></li>
    <li><a href="/Start-Hut/src/views/faq.php">FAQ</a></li>
    <li><a href="/Start-Hut/src/views/contact.php">Nous contacter</a></li>
  <?php endif; ?>
</ul>

<div class="auth-buttons mobile-menu">
  <?php if (!isset($_SESSION['user_id'])): ?>
    <a href="/Start-Hut/src/views/user/connexion.php" class="signup">Se connecter</a>
  <?php else: ?>
    <?php if ($user_type === 'porteur'): ?>
      <a href="/Start-Hut/src/views/projet/espace-projet.php" class="signup">Espace projet</a>
    <?php elseif ($user_type === 'collaborateur'): ?>
      <a href="/Start-Hut/src/views/projet/espace-collaborateur.php" class="signup">Espace collaborateur</a>
    <?php endif; ?>
    <a href="/Start-Hut/src/views/user/profil.php" class="signup">Mon profil</a>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT d.lien FROM Documents d WHERE d.proprietaire = ? AND d.type = 'image'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_image = $result->fetch_assoc();
    $conn->close();
    ?>

    <a href="/Start-Hut/src/views/user/profil.php" class="profile-image-link">
      <img src="<?php echo $user_image['lien'] ?? '/Start-Hut/public/assets/img/APRIL.png'; ?>" class="header-profile-pic" alt="Photo de profil">
    </a>
  <?php endif; ?>
</div>


    <div class="navbar-border"></div> <!-- Bordure largeur de tout l'écran-->
</div>

<script>
  function toggleMenu() {
    document.querySelector('.nav-links').classList.toggle('show');
    document.querySelector('.auth-buttons').classList.toggle('show');
  }
</script>


