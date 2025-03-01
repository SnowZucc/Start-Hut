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
                </div>

            </div>



            <?php include('footer.php'); ?>    
    </body>
</html>