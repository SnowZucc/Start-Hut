<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesmeryem.css">
    </head>
    <body>
        <?php include('header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
             <div class="content">                       <!-- on mets tout dans cette classe pour que les info soient centré -->
             <div class="containerAnnonce">
        <div class="profilAnnonceur">
            <img src="APRIL.png" alt="Photo de profil" class="profile-img">
            <div class="infoAnnonceur">
                <h2>Nom de l’annonceur</h2>
                <p><span class="icon">📍</span> Pays | <span class="icon">💬</span> Langues</p>
                <button class="contact-btn">Contactez moi</button>
            </div>
        </div>
        
        <div class="projetAnnonce">
            <h3>Nom du projet</h3>
            <img src="APRIL.png" alt="Image du projet" class="project-img">
            <p class="description-title">Description</p>
            <p class="description-content">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
        </div>

        <div class="detailsAnnonce">
            <h3>Détails</h3>
            <div class="details-content">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</div>
        </div>

        <div class="actions">
            <button class="postuler">Postuler</button>
            <button class="sauvegarder">Sauvegarder</button>
        </div>
    </div>

            </div>



        <?php include('footer.php'); ?>    
    </body>
</html>