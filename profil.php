<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mon Profil</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php include('header.php'); ?>  

    <div class="content">
    <div class="profile-section">
        <!-- Profil (photo + bouton de modification) -->
        <div class="profile-container">
            <label for="file-upload">
                <img src="default-profile.jpg" id="profile-pic" class="profile-pic" alt="Photo de profil">
                <div class="edit-text">Modifier la photo</div>
            </label>
            <input type="file" id="file-upload" class="CV-input" accept="image/*">
        </div>

        <!-- Grille des formulaires -->
        <div class="form-grid">
            <div class="form-box">
                <label>Prénom</label>
                <input type="text" class="input-field" placeholder="Votre pseudo">

                <label>Nom</label>
                <input type="text" class="input-field" placeholder="Votre nom">

                <label>Date de naissance</label>
                <input type="date" class="input-field">

                <label>Adresse mail</label>
                <input type="email" class="input-field" placeholder="Votre adresse mail">

                <label>Mot de Passe</label>
                <input type="password" class="input-field" placeholder="Votre mot de passe">
                <small>Modifier votre mot de passe.</small>

                <label>Statut</label>
                <select class="dropdown">
                    <option value="" disabled selected>Choisissez votre statut</option>
                    <option value="entrepreneur">Entrepreneur</option>
                    <option value="emploi">En recherche d'emploi</option>
                    <option value="investisseur">Investisseur</option>
                </select>

                <label>CV</label>
                <input type="file" class="input-field">
                <small>Taille maximale : 30 200 ko - .pdf</small>
            </div>

            <div class="form-box">
                <label>Abonnement</label>
                <select class="dropdown">
                    <option value="" disabled selected>Choisissez une formule</option>
                    <option value="free">Formule gratuite</option>
                    <option value="suivie">Formule suivie</option>
                    <option value="suivie+">Formule suivie +</option>
                </select>

                <label>Documents</label>
                <input type="file" class="input-field">
                <small>Taille maximale : 30 200 ko - .pdf</small>

                <label>Pays</label>
                <input type="text" class="input-field" placeholder="Votre pays">
            </div>
        </div>
    </div>

    <div class="button-container">        
        <button type="submit" class="save-button">Sauvegarder</button>
    </div>
  /div>

    <?php include('footer.php'); ?>
    
    <script>
        document.getElementById("file-upload").addEventListener("change", function(event) {
            let image = document.getElementById("profile-pic");
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result; // Mise à jour de l'image
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

  </body>
</html>
