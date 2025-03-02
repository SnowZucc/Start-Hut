<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mes annonces</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php include('header.php'); ?>

    <div class="content">
        <h2 class="page-title">Mes annonces</h2>

        <div class="annonce-container">
            <!-- Image de l'annonce -->
            <div class="annonce-image">
                <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
                <figcaption>
            </div>

            <!-- Informations de l'annonce -->
            <div class="annonce-info">
                
                <label></label>
                <input type="text" class="newinput-field" placeholder="Description">
            </div>

            <!-- État de l'annonce -->
                <select class="newdropdown">
                    <option value="" disabled selected>État</option>
                    <option value="entrepreneur">En cours de création </option>
                    <option value="emploi">En attente</option>
                    <option value="investisseur">Statut avancé</option>
                </select>
        </div>

        <!-- Boutons -->
        <div class="button-container">
            <button class="delete-button">Supprimer</button>
            <button class="edit-button">Modifier</button>
        </div>
    </div>

  </body>
</html>
