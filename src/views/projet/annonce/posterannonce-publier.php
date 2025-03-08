<?php
session_start(); // Démarrer la session


// Vérifier si les valeurs existent dans $_SESSION, sinon définir des valeurs par défaut
$annonce_titre = $_SESSION['titre'] ?? 'A définir';
$annonce_description = $_SESSION['description'] ?? 'A définir';
$annonce_competences_recherchees = $_SESSION['competences'] ?? 'A définir';
$annonce_categorie = $_SESSION['categorie'] ?? 'A définir';
$annonce_collaborateurs_souhaites = $_SESSION['collaborateurs'] ?? 0; // Nombre donc par défaut 0
$annonce_remuneration = $_SESSION['remuneration'] ?? 0; // Nombre donc par défaut 0
$annonce_abonnement = $_SESSION['abonnement'] ?? 'basic'; // Par défaut "basic"
$roles = $_SESSION['roles'] ?? null;


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-meryem.css">
    <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
</head>
<body>
    <?php include('../../../templates/header.php'); ?>

    <div class="content">
        <div class="progress-container">
            <div class="progress-step"><span>1</span> Aperçu</div>
            <div class="progress-separator">></div>
            <div class="progress-step"><span>2</span> Abonnement</div>
            <div class="progress-separator">></div>
            <div class="progress-step active"><span>3</span> Publier</div>
        </div>

        <div class="container-aperçu">
            <h2>📝 Aperçu de votre annonce</h2>
            <h3 class="verfier">Vérifiez toutes les informations avant publication</h3>

            <p><strong>Titre :</strong> <?php echo htmlspecialchars($annonce_titre); ?></p>
            <p><strong>Description :</strong> <?php echo htmlspecialchars($annonce_description); ?></p>
            <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($annonce_categorie); ?></p>
            <p><strong>Compétences :</strong> <?php echo htmlspecialchars($annonce_competences_recherchees); ?></p>
            <p><strong>Nombre de collaborateurs :</strong> <?php echo htmlspecialchars($annonce_collaborateurs_souhaites); ?></p>
            <p><strong>Rôles :</strong> <?php echo nl2br(htmlspecialchars($roles)); ?></p>
            <p><strong>Rémunération :</strong> <?php echo htmlspecialchars($annonce_remuneration); ?></p>
            <p><strong>✅ Abonnement choisi :</strong> <?php echo htmlspecialchars($annonce_abonnement); ?></p>
        </div>

        <div class="navigation-buttons">
            <form method="POST">
                <button type="submit" class="next-btn">Publier</button>
                <div id="message-success" class="message success" style="display: none;">Annonce publier !</div>
            </form>
        </div>
    </div>

    
    <?php include('../../../templates/footer.php'); ?>
    
    <!-- Envoie de l'annonce crée a la db -->
    <?php
   
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs POST de la sessuin precendent

            $annonce_titre = $_SESSION['titre'] ?? 'A définir';
            $nom = $_SESSION['titre'] ?? 'Projet sans nom';
            $annonce_description = $_SESSION['description'] ?? 'A définir';
            $annonce_competences_recherchees = $_SESSION['competences'] ?? 'A définir';
            $annonce_categorie = $_SESSION['categorie'] ?? 'A définir';
            $annonce_collaborateurs_souhaites = $_SESSION['collaborateurs'] ?? 0; // Nombre donc par défaut 0
            $annonce_remuneration = $_SESSION['remuneration'] ?? 0; // Nombre donc par défaut 0
            $annonce_abonnement = $_SESSION['abonnement'] ?? 'basic'; // Par défaut "basic"
            $createur = $_SESSION['user_id'] ?? null; // Récupérer l'ID de l'utilisateur connecté

            if (!$createur) {
                die("Erreur : L'utilisateur connecté n'est pas défini !");
            }
                        

      
    
            $sql = "INSERT INTO Projets (createur,nom,annonce_titre, annonce_description, annonce_competences_recherchees, annonce_categorie, annonce_collaborateurs_souhaites, annonce_remuneration, annonce_abonnement, annonce_date_creation) VALUES ('$createur','$nom','$annonce_titre', '$annonce_description', '$annonce_competences_recherchees', '$annonce_categorie', '$annonce_collaborateurs_souhaites', '$annonce_remuneration', '$annonce_abonnement',NOW())";
    
            if ($conn->query($sql) === TRUE) {
                echo "<script>document.getElementById('message-success').style.display = 'block';</script>";
            }
        
       
    
    }

    $conn->close();
    ?>

</body>
</html>
