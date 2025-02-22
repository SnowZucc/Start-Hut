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
    <?php include('header.php'); ?>
    
        <h1 class="inscription" >INSCRIPTION</h1>
        <p class="already-registered"> Déjà inscrit ? <a href="connexion.php">Se Connecter</a></p> <!--  ATTENTION Modifier le lien de connexion lors de la création de la page de connexion -->

        <form action= "inscription.php" method="POST" class="inscription">
            <div class="form-group">
                <label for="email">Adresse mail<span class="required"></span></label>
                <input type="email" name= "email" class="input-field" placeholder="Veuillez saisir votre adresse mail" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe <span class="required">*</span></label>
                <input type="password" name= "password" class="input-field" placeholder="Veuillez saisir votre mot de passe" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmer votre mot de passe <span class="required">*</sapn></label>
                <input type="password" name= "password_confirmation" class="input-field" placeholder="Veuillez saisir votre mot de passe" required>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="cgu" required>
                <label for="cgu">J'ai lu et j'accepte les CGU*<a href="#"><!-- Ajouter les conditons générales d'utilisation -->
            </div>

            <div class="button-container">
                <button type="submit" class="btnInscription">S'inscrire</button>
            </div>
        </form>

    <?php include('footer.php'); ?>    
    </body>
</html>