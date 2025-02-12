<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include('header.php'); ?>             <!-- Rajoute le header par la magie de PHP  -->
        
        <div class="content">                       <!-- on mets tout dans cette classe pour que les info soient centré -->
            <div class="landing">
                <div class="landing-text">
                    <h1>START-HUT</h1>                <!-- Titre 1 : start hut de la landing page -->
                    <p>
                        L’outil le plus simple <br>   <!-- ici le br permet de sauter les lignes dans le paragraphe -->
                        pour <span class="highlight">transformer</span> vos idées en startups. <!-- permet de différencier le mot transformer du reste du texte -->
                    </p>      
                    <button class="btn">EN SAVOIR PLUS</button>      <!-- Bouton en savoir plus qui enverra vers une page qu'on fera plus
                                                    tard ou yaura des info sur lentreprise, prq start-hut et comment sa marche  -->
                </div>
                <div class="landing-image">   <!-- image temporaire si vous avez des idées de image send it to me-->
                    <img src="landing.png" alt="Illustration">
                </div>
            </div>
        </div>
    </body>
</html>