<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Start-Hut - Annonces</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-louis.css">
  </head>
  <body>
    <?php include('../templates/header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->

    <?php
    $conn = new mysqli("localhost", "root", "", "StartHut");      // Connexion a la DB

    // Recherche par mots clés
    $q = $_GET['q'] ?? '';      // Prend q= dans l'URL sinon une chaine vide. ?? = si vide, '' = chaine vide
    $sql = "SELECT * FROM Projets WHERE annonce_titre LIKE '%$q%' OR annonce_description LIKE '%$q%'"; // Cherche dans les colonnes annonce_titre et annonce_description
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
                echo "<img src='https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg'>";
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
