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
                <!-- Sous barre (étapes pour poster une annonce) -->

                <div class="progress-container">
                    <div class="progress-step active"><span>1</span> Aperçu</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step"><span>2</span> Abonnement</div>
                    <div class="progress-separator">></div>
                    <div class="progress-step"><span>3</span> Publier</div>
                </div>
                <!-- Barre de progression  -->
                <div class="containerposter">
                <form action="posterannonce-abonnement.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="titre">Titre <span class="highlight2">*</span></label>
                    <small>Le titre de votre projet est le meilleur endroit pour inclure les mots-clés que les collaborateurs utiliseront pour rechercher un projet comme le vôtre</small>
                    <input type="text" id="titre" name="titre" maxlength="80" required>
                </div>
                <div class="form-group">
                    <label for="description">Description<span class="highlight2">*</span></label>
                    <small>Decrivez votre project</small>
                    <input type="text" id="description" name="description" maxlength="250" required>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie <span class="highlight2">*</span></label>
                    <small>Choisissez la catégorie qui convient le mieux à votre projet</small>
                    <select id="categorie" name="categorie" required>
                        <option value="">Choisissez une catégorie</option>
                        <option value="technologie">Technologie</option>
                        <option value="education">Education</option>
                        <option value="business">Business</option>
                        <option value="autre">autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="competences">Compétences recherchées <span class="highlight2">*</span> </label>
                    <small>Les compétences permettent aux collaborateurs captivés par votre projet de savoir s’ils peuvent en faire partie ou non</small>
                    <select id="competences" name="competences" required>
                        <option value="">Choisissez une ou plusieurs compétences</option>
                        <option value="developpeur">Développement</option>
                        <option value="designe">Designer</option>
                        <option value="marketing">Marketing</option>
                        <option value="communication">Communication</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="collaborateurs">Nombre de collaborateurs souhaités</label>
                    <small>Le nombre de collaborateurs permettra aux potentiels collaborateurs de savoir s’il y en a encore des places disponibles</small>
                    <input type="number" id="collaborateurs" name="collaborateurs" min="1" value="1">
                </div>
                <div class="form-group">
                    <label for="roles">Rôles à pourvoir <span class="highlight2">*</span></label>
                    <textarea id="roles" name="roles" required></textarea>
                </div>
                <div class="form-group">
                    <label for="remuneration">Rémunération <span class="highlight2">*</span></label>
                    <input type="text" id="remuneration" name="remuneration" required>
                </div>
            
                <button type="submit" class="submit-btn">Sauvegarder & Continuer</button>
            </form>
        </div>
            

        

             </div>



        <?php include('../../../templates/footer.php'); ?>    
    </body>
</html>
