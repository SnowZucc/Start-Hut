
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
        <?php        
        // // Affichage des erreurs PHP
        // ini_set('display_errors', 1);
        // error_reporting(E_ALL);       
                                                                                   
        include('../templates/header.php');                                                          // Inclusion du header contenant la navigation
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');
        
        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);              // Création objet PDO pour connexion MySQL
        
        $id_annonce = isset($_GET['id']) ? (int)$_GET['id'] : 0;                                      // Récupère ID URL ou 0 si absent
        
        // Récupération des informations de l'annonce
        $req = $bdd->prepare('SELECT p.*, u.nom, u.prenom, d.lien FROM Projets p 
                     JOIN Utilisateurs u ON p.createur = u.id 
                     LEFT JOIN Documents d ON p.id = d.projet AND d.type = "image"
                     WHERE p.id = ?');                                                                   // Préparation de la requête SQL avec jointure. Infos projet + lien de l'image depuis documeents
        $req->execute([$id_annonce]);                                                                 // Exécute requête avec paramètre ID
        $annonce = $req->fetch(PDO::FETCH_ASSOC);                                                    // Récupère résultat en tableau associatif
        
        if (!$annonce) {                                                                              // Si aucune annonce trouvée
            echo "Annonce non trouvée";                                                              // Affiche message d'erreur
            exit;                                                                                     // Arrête l'exécution du script
        }
        ?>                                                                                      
        
        <div class="content">
        <div class="containerAnnonceFlex">
    <!-- Colonne gauche -->
    <div class="annonceGauche">
        <h1 class="titreAnnonce"><?php echo htmlspecialchars($annonce['annonce_titre']); ?></h1>
        <img src="<?php echo $annonce['lien'] ?? 'https://vection-cms-prod.s3.eu-central-1.amazonaws.com/Adobe_Stock_525614074_8ab9bd18e3.jpeg'; ?>" alt="Image du projet" class="visuelAnnonce">
        <div class="description-bloc">
            <h3>Description</h3>
            <p><?php echo htmlspecialchars($annonce['annonce_description']); ?></p>
        </div>
        <div class="details-bloc">
            <h3>Détails</h3>
            <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($annonce['annonce_categorie']); ?></p>
            <p><strong>Compétences recherchées :</strong> <?php echo htmlspecialchars($annonce['annonce_competences_recherchees']); ?></p>
            <p><strong>Nombre de collaborateurs :</strong> <?php echo htmlspecialchars($annonce['annonce_collaborateurs_souhaites']); ?></p>
        </div>

<div class="remuneration-bloc">
    <h3>Rémunération</h3>
    <p>
        <?php 
            echo isset($annonce['remuneration']) && !empty($annonce['remuneration']) 
                ? htmlspecialchars($annonce['remuneration']) . ' €' 
                : "Non renseignée"; 
        ?>
    </p>
</div>


    </div>

    <!-- Colonne droite -->
    <div class="annonceDroite">
        <div class="carteProfil">
            <img src="/Start-Hut/public/assets/img/APRIL.png" alt="Photo de profil" class="profilImage">
            <h2><?php echo htmlspecialchars($annonce['prenom'] . ' ' . $annonce['nom']); ?></h2>
            <p><span>📍</span> Pays &nbsp;&nbsp; <span>💬</span> Langues</p>
            <button class="btnContact">Contactez moi</button>
        </div>
    </div>
</div>
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $user_type = $_SESSION['user_type'] ?? null;
            ?>


                <?php if ($user_type === 'porteur'): ?>
               
                <?php endif; ?>
                <?php if ($user_type === 'collaborateur'): ?>
                <div class="actionsAnnonce">
                    <form method="POST" action="postuler_annonce.php">
                        <input type="hidden" name="id_projet" value="<?php echo $annonce['id']; ?>">
                        <button type="submit" class="btnAction">Postuler</button>
                     </form>
                         <button class="btnAction btnSecondaire">Sauvegarder</button>
                </div> 
                <?php endif; ?>

                <!-- Boutons en bas -->
             



        </div>
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'success'): ?>
    <p style="color: green; font-weight: bold;">Votre candidature a bien été envoyée.</p>
<?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'already_postulated'): ?>
    <p style="color: orange; font-weight: bold;">Vous avez déjà postulé à ce projet.</p>
<?php endif; ?>


        <?php include('../templates/footer.php'); ?>    
    </body>
</html>