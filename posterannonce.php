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
                <!-- Sous barre (étapes pour poster une annonce) -->

                <div class="progress-container">
                    <div class="progress-step active"><span>1</span> Aperçu</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step"><span>2</span> Abonnement</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step"><span>3</span> Publier</div>
                </div>
                <div class="containerposter">
                <form action="annonce-abonnement.php" method="POST" enctype="multipart/form-data">

                 
            <div class="form-group">
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" maxlength="80" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie *</label>
                <select id="categorie" name="categorie" required>
                    <option value="">Choisissez une catégorie</option>
                    <option value="tech">Technologie</option>
                    <option value="art">Art</option>
                    <option value="business">Business</option>
                </select>
            </div>
            <div class="form-group">
                <label for="competences">Compétences recherchées *</label>
                <textarea id="competences" name="competences" required></textarea>
            </div>
            <div class="form-group">
                <label for="collaborateurs">Nombre de collaborateurs souhaités</label>
                <input type="number" id="collaborateurs" name="collaborateurs" min="1" value="1">
            </div>
            <div class="form-group">
                <label for="roles">Rôles à pourvoir *</label>
                <textarea id="roles" name="roles" required></textarea>
            </div>
            <div class="form-group">
                <label for="remuneration">Rémunération *</label>
                <input type="text" id="remuneration" name="remuneration" required>
            </div>
            <div class="form-group file-input">
                <label for="video">Vidéo de présentation</label>
                <input type="file" id="video" name="video" accept="video/mp4">
            </div>
            <button type="submit" class="submit-btn">Sauvegarder & Continuer</button>
        </form>
    </div>
            

            

             </div>



        <?php include('footer.php'); ?>    
    </body>
</html>