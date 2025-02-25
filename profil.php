<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php include('header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->
      <div class="content">
         <div class="name">
             <input type="text" class="nom" placeholder="Votre nom">
         </div> 
         <div class="name">
             <input type="text" class="nom" placeholder="Votre prénom">
         </div> 
         <div class="name">
             <input type="text" class="nom" placeholder="Adresse mail">
         </div> 
         <div class="name">
             <input type="text" class="nom" placeholder="Votre mot de passe">
         </div>
         <div class="grid">
            <select class="dropdown">
              <option value="" disabled selected>Statut</option>
              <option value="volvo">Entrepreneur</option>
              <option value="saab">En recherche d'emploi</option>
              <option value="saab">Investisseur</option>
            </select>
            <select class="dropdown">
              <option value="" disabled selected>Abonnement</option>
              <option value="volvo">Formule gratuite</option>
              <option value="saab">Formule suivie</option>
              <option value="saab">Formule suivie +</option>
            </select>
            <select class="dropdown">
              <option value="" disabled selected>Pays</option>
              <option value="volvo">France</option>
              <option value="saab">Allemagne</option>
              <option value="saab">Angleterre</option>
              <option value="saab">Espagne</option>
              <option value="saab">Japon</option>
              <option value="saab">Etats-Unis</option>
              <option value="saab">Chine</option>
              <option value="saab">Russie</option>
            </select>
          </div>
        
        </div>
           
    </div> 

    <?php include('footer.php'); ?>
  </body>
</html>

    






