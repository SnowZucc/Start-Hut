<?php
session_start(); // démarre la session

// Vérification de la connexion de l'utilisateur
if(!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /Start-Hut/src/views/user/connexion.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['abonnement'])) {
    // dabord lutilisateur chosir l'abonnement
    $_SESSION['abonnement'] = $_POST['abonnement'];

   // une fois fais sa renvoie vers publier avec continuer
    header("Location: posterannonce-publier.php?success=1");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sauvegarde des données du formulaire dans la session
    if (isset($_POST['titre'])) {
        // Si on vient de la première page du formulaire
        $_SESSION['titre'] = $_POST['titre'] ?? '';
        $_SESSION['categorie'] = $_POST['categorie'] ?? '';
        $_SESSION['competences'] = $_POST['competences'] ?? '';
        $_SESSION['collaborateurs'] = $_POST['collaborateurs'] ?? '';
        $_SESSION['remuneration'] = $_POST['remuneration'] ?? '';
        $_SESSION['description'] = $_POST['description'] ?? '';
    } elseif (isset($_POST['abonnement'])) {
        // Si on choisit l'abonnement
        $_SESSION['abonnement'] = $_POST['abonnement'];

        // Redirection vers la page de publication
        header("Location: posterannonce-publier.php");
        exit();
    } 
}

// Redirection si des données essentielles sont manquantes
$required_fields = ['titre', 'description', 'categorie', 'competences', 'roles', 'remuneration'];
$missing_data = false;
foreach($required_fields as $field) {
    if(!isset($_SESSION[$field]) || empty($_SESSION[$field])) {
        $missing_data = true;
        break;
    }
}

if($missing_data) {
    header("Location: posterannonce.php");
    exit();
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
        <title>Choisir un abonnement - Start-Hut</title>
    </head>
    <body>
        <?php include('../../../templates/header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
             <div class="content">                       <!-- on met tout dans cette classe pour que les info soient centrées -->
     

                <!-- Barre de progression -->
                 <div class="progress-container">
                    <div class="progress-step"><span>1</span> Aperçu</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step active"><span>2</span> Abonnement</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step"><span>3</span> Publier</div>
                 </div>
                 


                 <div class="containerabonnement">  
                 <form action="posterannonce-abonnement.php" method="POST">

                    
            <!-- Options d'abonnement -->
            <div class="texte-choix-abonnement">  
            Choisissez votre abonnement pour publier votre annonce
            </div>
            <div class="plans">
             <!-- Bloc représentant l'offre BASIC -->
            <div class="plan basic">
                <h2>BASIC</h2>
                <ul> <!-- avantage de loffre-->
                    <li>Publier des projets</li>
                    <li>Visibilité standard</li>
                    <li>Pas de mise en avant</li>
                </ul>
                <p class="price">0$</p> <!-- Affichage du prix de l'abonnement -->
                
                <input type="radio" name="abonnement" value="basic" required <?php echo (isset($_SESSION['abonnement']) && $_SESSION['abonnement'] == 'basic') ? 'checked' : ''; ?>>
            </div>
            <!-- Bloc représentant l'offre STANDARD -->
            <div class="plan standard">
                <h2>STANDARD</h2>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait BASIC</li>
                    <li>Visibilité améliorée</li>
                    <li>Suivi de base (barre d'avancement, outils collaboratifs de base)</li>
                    <li>Mise en avant</li>
                </ul>
                <p class="price">9.99$/mois</p>
                
                <input type="radio" name="abonnement" value="standard" <?php echo (isset($_SESSION['abonnement']) && $_SESSION['abonnement'] == 'standard') ? 'checked' : ''; ?>>
            </div>
           <!-- Bloc représentant l'offre PREMIUM -->
            <div class="plan premium">
                <h2>PREMIUM</h2>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait STANDARD</li>
                    <li>Visibilité maximale</li>
                    <li>Ressources pédagogiques</li>
                    <li>Documents d'étude de marché prédéfinis</li>
                </ul>
                <p class="price">19.99$/mois</p>
                
                <input type="radio" name="abonnement" value="premium" <?php echo (isset($_SESSION['abonnement']) && $_SESSION['abonnement'] == 'premium') ? 'checked' : ''; ?>>
            </div>
        </div>
    </div>
    <!-- Boutons de navigation -->
     
    <div class="navigation-buttons">
                    <a href="posterannonce.php" class="back-btn">Retour</a>
                    <button type="submit" class="next-btn">Continuer</button>
                </div>
            </form>
            </div>



            <?php include('../../../templates/footer.php'); ?>    
    </body>
</html>