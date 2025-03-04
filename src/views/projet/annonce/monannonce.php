<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mes annonces</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
  </head>
  <body>
    <!-- <?php include('../../../templates/header.php'); ?> -->   <!-- Retiré car inclus dans espace projets -->

    <div class="content">
        <h2 class="page-title">Mes annonces</h2>

        <?php
        $conn = new mysqli("localhost", "root", "", "StartHut");
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Projets";
        $result = $conn->query($sql);

        // Pour chaque annonce dans la db, on boucle et on affiche les informations de l'annonce
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  // fetch_assoc() récupère les données sous forme de tableau associatif
                echo '<div class="annonce-container">';
                echo '<div class="annonce-image">';
                echo '<img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">';
                echo '</div>';
                
                echo '<div class="annonce-info">';
                echo '<h3>' . htmlspecialchars($row["annonce_titre"]) . '</h3>';
                echo '<p>' . htmlspecialchars($row["annonce_description"]) . '</p>';
                echo '<p>Catégorie: ' . htmlspecialchars($row["annonce_categorie"]) . '</p>';
                echo '<p>Compétences recherchées: ' . htmlspecialchars($row["annonce_competences_recherchees"]) . '</p>';
                echo '<p>Collaborateurs souhaités: ' . htmlspecialchars($row["annonce_collaborateurs_souhaites"]) . '</p>';
                echo '</div>';

                echo '<div class="etat-annonce">';
                echo '<p>État: ' . htmlspecialchars($row["annonce_etat"]) . '</p>';
                echo '</div>';

                echo '<div class="button-container">';
                echo '<button class="delete-button" data-id="' . $row["id"] . '">Supprimer</button>';
                echo '<button class="edit-button" data-id="' . $row["id"] . '">Modifier</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Aucune annonce</p>";
        }
        
        $conn->close();
        ?>

    </div>

  </body>
</html>
