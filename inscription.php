<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inscription</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css?v=2">
  </head>

    <body>
    <?php include('header.php'); ?>
    <div class="content">
        <h1 class="inscription-title">INSCRIPTION</h1>

        <div class="form-container">
            <form action="inscription.php" method="POST" class="inscription">

                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="lastname">Nom <span class="required">*</span></label>
                        <input type="text" id="lastname" name="lastname" class="input-field" placeholder="Votre nom" required>
                    </div>

                    <div class="form-group half-width">
                        <label for="firstname">Prénom <span class="required">*</span></label>
                        <input type="text" id="firstname" name="firstname" class="input-field" placeholder="Votre prénom" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Adresse mail <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="input-field" placeholder="Veuillez saisir votre adresse mail" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe <span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Veuillez saisir votre mot de passe" required>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmer votre mot de passe <span class="required">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-field" placeholder="Veuillez confirmer votre mot de passe" required>
                </div>

                <div class="form-group">
                    <label>Statut <span class="required">*</span></label>
                    <div class="statut-container">
                        <div class="statut-option">
                            <input type="checkbox" id="porteur" name="statut" value="porteur">
                            <label for="porteur">Porteur de projet</label>
                        </div>
                        <div class="statut-option">
                            <input type="checkbox" id="collaborateur" name="statut" value="collaborateur">
                            <label for="collaborateur">Collaborateur</label>
                        </div>
                    </div>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="cgu" required>
                    <label for="cgu">J'ai lu et j'accepte les <a href="#">Conditions Générales d’Utilisation</a></label>
                </div>

                <div class="button-container">
                    <button type="submit" class="btnInscription">S'inscrire</button>
                </div>
            </form>
        </div>

        <p class="already-registered">Déjà inscrit ? <a href="connexion.php">Se Connecter</a></p>
    </div>
    
    <?php include('footer.php'); ?>    
    </body>
</html>
