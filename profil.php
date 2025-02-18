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
         <form method="post" action="">
            <label for="statut">Statut :</label>
            <select name="Statut" id="statut">
              <option value="Collaborateur">Collaborateur</option>
              <option value="Porteur de projet">Porteur de projet</option>
          </select>
          <input type="submit" name="submit" value="Selectionner">
        </form>
        <form method="post" action="">
            <label for="abonnement">Abonnement :</label>
            <select name="Abonnement" id="abonnement">
              <option value="Formule gratuite">Formule gratuite</option>
              <option value="Formule payante">Formule payante</option>
              <option value="Formule payante +">Formule payante +</option>
          </select>
          <input type="submit" name="submit" value="Selectionner">
        </form>
        <form method="post" action="">
            <label for="Language">Language :</label>
            <select name="Language" id="Language">
              <option value="Français">Français</option>
              <option value="Anglais">Anglais</option>
              <option value="Allemand">Allemand</option>
              <option value="Espagnol">Espagnol</option>
              <option value="Chinois">Chinois</option>
          </select>
          <input type="submit" name="submit" value="Selectionner">
        </form>
           
    </div> 

    <?php include('footer.php'); ?>
  </body>
</html>

    






