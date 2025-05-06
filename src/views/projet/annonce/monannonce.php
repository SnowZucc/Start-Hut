<?php
session_start(); // démarre la session

// Vérification de la connexion de l'utilisateur
if(!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /Start-Hut/src/views/user/connexion.php");
    exit();
}

// Suppression d'une annonce
if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }
    
    // Vérifier que l'annonce appartient bien à l'utilisateur
    $stmt = $conn->prepare("SELECT id FROM Projets WHERE id = ? AND createur = ?");
    $stmt->bind_param("ii", $_GET['delete'], $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        // Supprimer l'annonce
        $stmt = $conn->prepare("DELETE FROM Projets WHERE id = ?");
        $stmt->bind_param("i", $_GET['delete']);
        $stmt->execute();
        
        $success_message = "L'annonce a été supprimée avec succès.";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mes annonces</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
      <?php include('../../../templates/head.php'); ?>
      <script>
      // Script pour la confirmation de suppression
      function confirmDelete(id) {
          if(confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')) {
              window.location.href = 'monannonce.php?delete=' + id;
          }
      }
      </script>
  </head>
  <body>
    <!-- <?php include('../../../templates/header.php'); ?> -->   <!-- Retiré car inclus dans espace projets -->

    <div class="content">
        <h2 class="page-title">Mes annonces</h2>
        
        <?php if(isset($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <?php if(isset($_GET['success'])): ?>
            <div class="success-message">Votre annonce a été publiée avec succès !</div>
        <?php endif; ?>

        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Utiliser des requêtes préparées pour éviter les injections SQL
        $stmt = $conn->prepare("SELECT * FROM Projets WHERE createur = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Pour chaque annonce dans la db, on boucle et on affiche les informations de l'annonce
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  // fetch_assoc() récupère les données sous forme de tableau associatif
                echo '<div class="annonce-container">';
                echo '<div class="annonce-image">';
                
                // Récupérer l'image associée au projet si elle existe
                $img_stmt = $conn->prepare("SELECT lien FROM Documents WHERE projet = ? AND type = 'image' LIMIT 1");
                $img_stmt->bind_param("i", $row["id"]);
                $img_stmt->execute();
                $img_result = $img_stmt->get_result();
                
                if($img_result->num_rows > 0) {
                    $img_row = $img_result->fetch_assoc();
                    echo '<img src="' . htmlspecialchars($img_row["lien"]) . '">';
                } else {
                    // Image par défaut
                    echo '<img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">';
                }
                
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
                echo '<p>Date de publication: ' . date('d/m/Y', strtotime($row["annonce_date_creation"])) . '</p>';
                echo '</div>';

                echo '<div class="button-container">';
                echo '<button class="delete-button" onclick="confirmDelete(' . $row["id"] . ')">Supprimer</button>';
                echo '<a href="posterannonce.php?edit=' . $row["id"] . '" class="edit-button">Modifier</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="no-annonces">';
            echo '<p>Vous n\'avez pas encore publié d\'annonces.</p>';
            echo '<a href="annonce/posterannonce.php" class="create-button">Créer une annonce</a>';
            echo '</div>';
        }
        
        $conn->close();
        ?>

    </div>

  </body>
</html>
