<?php
session_start(); // Démarrer la session


// Récupérer les informations de la session
$abonnement = $_SESSION['abonnement'] ?? 'Non renseigné';
$titre = $_SESSION['titre'] ?? 'Non renseigné';
$categorie = $_SESSION['categorie'] ?? 'Non renseignée';
$competences = $_SESSION['competences'] ?? 'Non renseignées';
$collaborateurs = $_SESSION['collaborateurs'] ?? 'Non renseigné';
$roles = $_SESSION['roles'] ?? 'Non renseignés';
$remuneration = $_SESSION['remuneration'] ?? 'Non renseignée';
$description = $_SESSION['description'] ?? 'Non renseignée';
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
                    <div class="progress-step"><span>2</span> Abonnement</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step active"><span>3</span> Publier</div>
                 </div>
                 <div class="container-aperçu">
                <h2>📝 Aperçu de votre annonce</h2>
                <h3 class="verfier">Vérifiez toutes les informations avant publication</h3>

             <!-- utilisation des donnée recuperer de lautre session -->
                <p><strong>Titre :</strong> <?php echo htmlspecialchars($titre); ?></p>
                <p><strong>Description :</strong> <?php echo htmlspecialchars($description); ?></p>
                <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($categorie); ?></p>
                <p><strong>Compétences :</strong> <?php echo htmlspecialchars($competences); ?></p>
                <p><strong>Nombre de collaborateurs :</strong> <?php echo htmlspecialchars($collaborateurs); ?></p>
                <p><strong>Rôles :</strong> <?php echo nl2br(htmlspecialchars($roles)); ?></p>
                <p><strong>Rémunération :</strong> <?php echo htmlspecialchars($remuneration); ?></p>
                <p><strong>✅ Abonnement choisi :</strong> <?php echo htmlspecialchars($abonnement); ?></p>


                </div>
                <div class="navigation-buttons">
            
               

                    <button type="submit" class="next-btn">Publier</button>
                </div>
            </div>

            </div>



            <?php include('../../../templates/footer.php'); ?>   

    </body>
</html>