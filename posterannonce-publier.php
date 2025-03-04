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
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/styles/stylesmeryem.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include('header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
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
                <p>Vérifiez toutes les informations avant publication. Vous pouvez encore modifier votre annonce.</p>

             <!-- utilisation des donnée recuperer de lautre session -->
                <p><strong>Titre :</strong> <?php echo htmlspecialchars($titre); ?></p>
                <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($categorie); ?></p>
                <p><strong>Compétences :</strong> <?php echo htmlspecialchars($competences); ?></p>
                <p><strong>Nombre de collaborateurs :</strong> <?php echo htmlspecialchars($collaborateurs); ?></p>
                <p><strong>Rôles :</strong> <?php echo nl2br(htmlspecialchars($roles)); ?></p>
                <p><strong>Rémunération :</strong> <?php echo htmlspecialchars($remuneration); ?></p>
                <p><strong>✅ Abonnement choisi :</strong> <?php echo htmlspecialchars($abonnement); ?></p>


                </div>
                <div class="navigation-buttons">
                <!-- meme probleme !!!!!! -->
                <button type="button" class="back-btn" onclick="window.location.href='posterannonce-abonnement.php'">Retour</button>

                    <button type="submit" class="next-btn">Continuer</button>
                </div>
            </div>

            </div>



            <?php include('footer.php'); ?>   

    </body>
</html>
