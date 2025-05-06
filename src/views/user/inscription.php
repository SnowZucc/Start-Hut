<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inscription-Start-Hut</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-guillaume.css?v=4">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css?v=2">
      <?php include('../../templates/head.php'); ?>
  </head> 

    <body>
    <?php include('../../templates/header.php'); ?>
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
                            <input type="radio" id="porteur" name="statut" value="porteur" required>
                            <label for="porteur">Porteur de projet</label>
                        </div>
                        <div class="statut-option">
                            <input type="radio" id="collaborateur" name="statut" value="collaborateur">
                            <label for="collaborateur">Collaborateur</label>
                        </div>
                    </div>
                </div>


                <div class="checkbox-container">
                    <input type="checkbox" id="cgu" required>
                    <label for="cgu">J'ai lu et j'accepte les <a href="../legal/CGU.php">Conditions Générales d'Utilisation</a></label>
                </div>

                <div class="button-container">
                    <button type="submit" class="btnInscription">S'inscrire</button>
                </div>
                <div id="message-success" class="message success" style="display: none;">Inscription réussie !</div>
            </form>
        </div>

        <p class="already-registered">Déjà inscrit ? <a href="connexion.php">Se Connecter</a></p>
    </div>
    
    <?php include('../../templates/footer.php'); ?>    

    <!-- PArtie PHP : envoie de l'inscription à la DB -->
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {     // Si la méthode POST est invoquée (lorsque le bouton "S'inscrire" est cliqué)
        $nom = $_POST['lastname'];
        $prenom = $_POST['firstname'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['password'];
        $statut = isset($_POST['statut']) ? $_POST['statut'] : '';  // BUG : ca met tout le temps porteur
     

        $sql = "INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, type) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$statut')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>document.getElementById('message-success').style.display = 'block';</script>";
        }
    }

    $conn->close();
    ?>
    </body>
</html>