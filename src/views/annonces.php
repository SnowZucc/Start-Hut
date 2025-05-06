<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Annonces - Start-Hut</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-louis.css">
      <?php include('../templates/head.php'); ?>
  </head>
  <body>
    <?php include('../templates/header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);      // Connexion a la DB

    // Recherche par mots clés
    $q = $_GET['q'] ?? '';      // Prend q= dans l'URL sinon une chaine vide. ?? = si vide, '' = chaine vide
    $sql = "SELECT p.*, d.lien FROM Projets p LEFT JOIN Documents d ON p.id = d.projet AND d.type = 'image' WHERE p.annonce_titre LIKE '%$q%' OR p.annonce_description LIKE '%$q%'"; // Cherche dans les colonnes annonce_titre et annonce_description + l'image depuis documents
    $result = $conn->query($sql);
    ?>

    <div class="content">
      <form method="GET" action="annonces.php">     <!-- Soumet un GET à la même page... -->
        <input type="text" name="q" class="search-bar" placeholder="Recherchez par mot-clé, domaine ou compétence">  <!-- ... avec q dans l'url -->
      </form>

      <div class="grid">
        <select class="dropdown">
          <option value="" disabled selected>Catégorie</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Compétence</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Rémunération</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
      </div>

      <div class="grid">
        <?php
        // Afficher les annonces récupérées par le PHP en haut dans une boucle
            while($row = $result->fetch_assoc()) {
                echo "<a href='annonce.php?id=" . $row["id"] . "' class='nav-links'>";
                echo "<figure>";
                echo "<img src='" . ($row["lien"] ?? 'https://vection-cms-prod.s3.eu-central-1.amazonaws.com/Adobe_Stock_525614074_8ab9bd18e3.jpeg') . "'>"; // Cherche l'image depuis le lien dans la db dans documents, sinon image par défaut
                echo "<figcaption>";
                echo "<h3>" . htmlspecialchars($row["annonce_titre"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["annonce_description"]) . "</p>";
                echo "</figcaption>";
                echo "</figure>";
                echo "</a>";
            }
        $conn->close();
        ?>
      </div>
    </div>
    <?php include('../templates/footer.php'); ?> <!-- Inclusion du footer -->
  </body>
</html>
