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
        <?php include('header.php'); ?> <!-- Rajoute le header par la magie de PHP -->
        
        <div class="content">
            <form action="posterannonce-publier.php" method="POST" enctype="multipart/form-data" class="annonce">
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
                </div>

                <div class="aperçu-card">
                    <!-- Affichage dynamique des informations -->
                    <h3 id="titre-apercu"><?php echo htmlspecialchars($_SESSION['titre'] ?? $_POST['titre'] ?? ''); ?></h3>
                    <p><strong>Catégorie :</strong> <span id="categorie-apercu"><?php echo htmlspecialchars($_SESSION['categorie'] ?? $_POST['categorie'] ?? ''); ?></span></p>
                    <p><strong>Compétences recherchées :</strong> <span id="competences-apercu"><?php echo htmlspecialchars($_SESSION['competences'] ?? $_POST['competences'] ?? ''); ?></span></p>
                    <p><strong>Nombre de collaborateurs :</strong> <span id="collaborateurs-apercu"><?php echo htmlspecialchars($_SESSION['collaborateurs'] ?? $_POST['collaborateurs'] ?? ''); ?></span></p>
                    <p><strong>Rôles à pourvoir :</strong> <span id="roles-apercu"><?php echo htmlspecialchars($_SESSION['roles'] ?? $_POST['roles'] ?? ''); ?></span></p>
                    <p><strong>Rémunération :</strong> <span id="remuneration-apercu"><?php echo htmlspecialchars($_SESSION['remuneration'] ?? $_POST['remuneration'] ?? ''); ?></span></p>

                    <!-- Affichage vidéo uniquement si la vidéo est téléchargée -->
                    <?php if (!empty($_SESSION['video'])): ?>
                        <div id="video-preview-container">
                            <strong>Vidéo de présentation :</strong>
                            <video id="video-apercu" controls>
                                <source src="<?php echo htmlspecialchars($_SESSION['video']); ?>" type="video/mp4">
                                Votre navigateur ne supporte pas la balise vidéo.
                            </video>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="navigation-buttons">
                    <button type="button" class="back-btn" onclick="history.back()">Retour</button>
                    <button type="submit" class="publish-btn">Publier l'annonce</button>
                </div>
            </form>
        </div>

        <?php include('footer.php'); ?>
        <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les champs de texte
    $titre = $_POST['titre'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $competences = $_POST['competences'] ?? '';
    $collaborateurs = $_POST['collaborateurs'] ?? '';
    $roles = $_POST['roles'] ?? '';
    $remuneration = $_POST['remuneration'] ?? '';

    // Traitement de la vidéo
    $video = '';
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $videoName = $_FILES['video']['name'];
        $videoTmpName = $_FILES['video']['tmp_name'];
        $videoType = $_FILES['video']['type'];
        $videoSize = $_FILES['video']['size'];

        // Définir un répertoire pour enregistrer les vidéos
        $uploadDir = 'uploads/';
        $videoPath = $uploadDir . basename($videoName);

        // Vérifier si le fichier est une vidéo
        if ($videoType == 'video/mp4') {
            // Déplacer le fichier dans le répertoire de destination
            if (move_uploaded_file($videoTmpName, $videoPath)) {
                $video = $videoPath; // Chemin du fichier vidéo
            } else {
                echo "Erreur lors du téléchargement de la vidéo.";
            }
        } else {
            echo "Le fichier n'est pas une vidéo valide.";
        }
    }


    // Rediriger ou afficher un message de succès
    header("Location: aperçu-annonce.php"); 
    exit();
}
?>
    </body>
</html>
