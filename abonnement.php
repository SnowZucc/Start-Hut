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
        <div class="containerabonnement">  
            <!-- Si vous avez dautre idées pour le textes et les prix nhesitez pas -->
        <h2>Toutes nos offres</h2>
        <h1>Consultez nos abonnements et accédez à des fonctionnalités exclusives pour optimiser votre expérience.</h1>
        <div class="plans">
             <!-- Bloc représentant l'offre BASIC -->
            <div class="plan basic">
                <h2>Basic</h2>
                <p class="price">0€</p> <!-- Affichage du prix de l'abonnement -->
                
                <ul> <!-- avantage de loffre-->
                    <li>Publier des projets</li>
                    <li>Visibilité standard</li>
                    <li>Pas de mise en avant</li>
                </ul>
                
                <p class="condition"><a href="#">Offre soumise à conditions.</a></p>
                <button>Choisir</button><!-- Boutton inscription qui renvoie vers linscription du coup -->
            </div>
            <!-- Bloc représentant l'offre STANDARD -->
            <div class="plan standard">
                <h2>Standard</h2>
                <p class="price">9.99€/mois</p>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait BASIC</li>
                    <li>Visibilité améliorée</li>
                    <li>Suivi de base (barre d’avancement, outils collaboratifs de base)</li>
                    <li>Mise en avant</li>
                </ul>
                
                <p class="condition"><a href="#">Offre soumise à conditions.</a></p>
                <button>Choisir</button><!-- bouton qui renvoie aussi a linscription ou connexion -->
            </div>
           <!-- Bloc représentant l'offre PREMIUM -->
            <div class="plan premium">
                <h2>Premium</h2>
                <p class="price">19.99€/mois</p>
                <ul> <!-- avantage de loffre-->
                    <li>Avantages du forfait STANDARD</li>
                    <li>Visibilité maximale</li>
                    <li>Ressources pédagogiques</li>
                    <li>Documents d’étude de marché prédéfinis</li>
                </ul>
                
                <p class="condition"><a href="#">Offre soumise à conditions.</a></p>
                <button>Choisir</button> <!-- bouton qui renvoie aussi a linscription ou connexion -->
            </div>
        </div>
    </div>
    </div>
    
        <?php include('footer.php'); ?>    
    </body>
</html>