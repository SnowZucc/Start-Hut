<?php
session_start(); // démarrage de la session

// Vérification de la connexion de l'utilisateur
if(!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /Start-Hut/src/views/user/connexion.php");
    exit();
}

// Vérification des données de session nécessaires
$missing_data = false;
$required_fields = ['titre', 'description', 'categorie', 'competences', 'roles', 'remuneration', 'abonnement'];
foreach($required_fields as $field) {
    if(!isset($_SESSION[$field]) || empty($_SESSION[$field])) {
        $missing_data = true;
        break;
    }
}

// Redirection si des données sont manquantes
if($missing_data) {
    header("Location: posterannonce.php");
    exit();
}

// Traitement du formulaire de publication
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['publish'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }
    
    // Préparation des données pour insertion
    $createur = $_SESSION['user_id'];
    $titre = $_SESSION['titre'];
    $description = $_SESSION['description'];
    $categorie = $_SESSION['categorie'];
    $competences = $_SESSION['competences'];
    $collaborateurs = $_SESSION['collaborateurs'] ?? 1;
    $roles = $_SESSION['roles'];
    $remuneration = $_SESSION['remuneration'];
    $abonnement = $_SESSION['abonnement'];
    $date_creation = date('Y-m-d H:i:s');
    
    // Insertion dans la base de données
    $sql = "INSERT INTO Projets (createur, nom, principe_du_projet, annonce_date_creation, annonce_titre, 
            annonce_description, annonce_competences_recherchees, annonce_categorie, 
            annonce_collaborateurs_souhaites, annonce_etat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'ouvert')";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssi", 
        $createur, 
        $titre, // Utilisation du titre comme nom du projet
        $description, // Utilisation de la description comme principe du projet
        $date_creation,
        $titre,
        $description,
        $competences,
        $categorie,
        $collaborateurs
    );
    
    if ($stmt->execute()) {
        // Effacer les données de session utilisées pour l'annonce
        foreach($required_fields as $field) {
            unset($_SESSION[$field]);
        }
        unset($_SESSION['collaborateurs']);
        
        // Rediriger vers la page des annonces avec un message de succès
        header("Location: monannonce.php?success=1");
        exit();
    } else {
        $error = "Erreur lors de la publication: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
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
        <title>Publier votre annonce - Start-Hut</title>
    </head>
    <body>
        <?php include('../../../templates/header.php'); ?>
        
        <div class="content">
            <!-- Barre de progression -->
            <div class="progress-container">
                <div class="progress-step"><span>1</span> Aperçu</div>
                <div class="progress-separator">></div>
                <div class="progress-step"><span>2</span> Abonnement</div>
                <div class="progress-separator">></div>
                <div class="progress-step active"><span>3</span> Publier</div>
            </div>
            
            <div class="containerpublier">
                <h2>Récapitulatif de votre annonce</h2>
                
                <?php if(isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <div class="recap-annonce">
                    <div class="recap-section">
                        <h3>Informations générales</h3>
                        <p><strong>Titre:</strong> <?php echo htmlspecialchars($_SESSION['titre'] ?? ''); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($_SESSION['description'] ?? ''); ?></p>
                    </div>
                    
                    <div class="recap-section">
                        <h3>Détails du projet</h3>
                        <p><strong>Catégorie:</strong> <?php echo htmlspecialchars($_SESSION['categorie'] ?? ''); ?></p>
                        <p><strong>Compétences recherchées:</strong> <?php echo htmlspecialchars($_SESSION['competences'] ?? ''); ?></p>
                        <p><strong>Nombre de collaborateurs:</strong> <?php echo htmlspecialchars($_SESSION['collaborateurs'] ?? '1'); ?></p>
                        <p><strong>Rôles à pourvoir:</strong> <?php echo nl2br(htmlspecialchars($_SESSION['roles'] ?? '')); ?></p>
                        <p><strong>Rémunération:</strong> <?php echo htmlspecialchars($_SESSION['remuneration'] ?? ''); ?></p>
                    </div>
                    
                    <div class="recap-section">
                        <h3>Abonnement choisi</h3>
                        <p><strong>Formule:</strong> <?php echo htmlspecialchars(ucfirst($_SESSION['abonnement'] ?? '')); ?></p>
                        <?php 
                        $abonnement = $_SESSION['abonnement'] ?? '';
                        $prix = '';
                        switch($abonnement) {
                            case 'basic':
                                $prix = '0$';
                                break;
                            case 'standard':
                                $prix = '9.99$/mois';
                                break;
                            case 'premium':
                                $prix = '19.99$/mois';
                                break;
                        }
                        ?>
                        <p><strong>Prix:</strong> <?php echo $prix; ?></p>
                    </div>
                </div>
                
                <form action="posterannonce-publier.php" method="POST">
                    <div class="confirmation-checkbox">
                        <input type="checkbox" id="confirm" name="confirm" required>
                        <label for="confirm">Je confirme que les informations ci-dessus sont exactes et je souhaite publier cette annonce.</label>
                    </div>
                    
                    <div class="navigation-buttons">
                        <a href="posterannonce-abonnement.php" class="back-btn">Retour</a>
                        <button type="submit" name="publish" class="submit-btn">Publier l'annonce</button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php include('../../../templates/footer.php'); ?>
    </body>
</html>
