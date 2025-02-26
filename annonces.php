<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Startups en lancement</title>
      <meta name="description" content="Découvrez les nouvelles startups innovantes prêtes à révolutionner leur domaine.">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php include('header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->

    <!-- Connexion a la DB -->
    <?php
    $conn = new mysqli("localhost", "root", "", "StartHut");
    
    // Récupérer les projets depuis la base de données
    $sql = "SELECT * FROM Projets";
    $result = $conn->query($sql);
    ?>

    <div class="content">
      <input type="text" class="search-bar" placeholder="Recherchez par mot-clé, domaine ou compétence">

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
                echo "<figure>";
                echo "<img src='https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg'>";
                echo "<figcaption>";
                echo "<h3>" . htmlspecialchars($row["annonce_titre"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["annonce_description"]) . "</p>";
                echo "</figcaption>";
                echo "</figure>";
            }
        $conn->close();
        ?>
      </div>
    </div>
    <?php include('footer.php'); ?> <!-- Inclusion du footer -->
  </body>
</html>
