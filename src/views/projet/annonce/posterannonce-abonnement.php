<?php
session_start(); // demarre la session


 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['abonnement'])) {
    // dabord lutilisateur chosir l'abonnement
    $_SESSION['abonnement'] = $_POST['abonnement'];

   // une fois fais sa renvoie vers publier avec continuer
    header("Location: posterannonce-publier.php?success=1");
    exit();
}



    // test pour vérifié si les données sont bie envoyé
    // echo "<h2>Données reçues :</h2>";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
  




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sauvegarde des données du formulaire dans la session
    $_SESSION['titre'] = $_POST['titre'] ?? '';
    $_SESSION['categorie'] = $_POST['categorie'] ?? '';
    $_SESSION['competences'] = $_POST['competences'] ?? '';
    $_SESSION['collaborateurs'] = $_POST['collaborateurs'] ?? '';
    $_SESSION['roles'] = $_POST['roles'] ?? '';
    $_SESSION['remuneration'] = $_POST['remuneration'] ?? '';
    $_SESSION['description'] = $_POST['remuneration'] ?? '';
  
  
  
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
    </head>
    <body>
        <?php include('../../../templates/header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
             <div class="content">                       <!-- on mets tout dans cette classe pour que les info soient centré -->
     

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

                    
            <!-- Si vous avez dautre idées pour le textes et les prix nhesitez pas -->
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
                
                <input type="radio" name="abonnement" value="basic" required >
            </div>
            <!-- Bloc représentant l'offre STANDARD -->
            <div class="plan standard">
                <h2>STANDARD</h2>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait BASIC</li>
                    <li>Visibilité améliorée</li>
                    <li>Suivi de base (barre d’avancement, outils collaboratifs de base)</li>
                    <li>Mise en avant</li>
                </ul>
                <p class="price">9.99$/mois</p>
                
                <input type="radio" name="abonnement" value="standard">
            </div>
           <!-- Bloc représentant l'offre PREMIUM -->
            <div class="plan premium">
                <h2>PREMIUM</h2>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait STANDARD</li>
                    <li>Visibilité maximale</li>
                    <li>Ressources pédagogiques</li>
                    <li>Documents d’étude de marché prédéfinis</li>
                </ul>
                <p class="price">19.99$/mois</p>
                
                <input type="radio" name="abonnement" value="premium">
            </div>
        </div>
    </div>
    <!-- Boutons de navigation -->
     
    <div class="navigation-buttons">  
                    <button type="submit" class="next-btn">Continuer</button>
                </div>
            </div>



            <?php include('../../../templates/footer.php'); ?>    
    </body>
</html>