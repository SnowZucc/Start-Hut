<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mon Profil</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-quentin.css">
  </head>
  <body>
    <?php include('../../templates/header.php'); ?>  

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

        <!-- Grille des formulaires 1 -->
        <div class="form-grid">
            <div class="form-box">
                <label>Prénom</label>
                <input type="text" class="input-field" placeholder="Votre prénom">

                <label>Nom</label>
                <input type="text" class="input-field" placeholder="Votre nom">

                <label>Statut</label>
                <select class="dropdown">
                    <option value="" disabled selected>Choisissez votre statut</option>
                    <option value="emploi">En recherche de projet</option>
                    <option value="entrepreneur">Entrepreneur</option>
                </select>

                <label>Votre CV</label>
                <input type="file" class="input-field">

                <label>Autres documents</label>
                <input type="file" class="input-field">
            </div>

            <!-- Grille des formulaires 2 -->
            <div class="form-box">
                <!-- <label>Abonnement</label>
                <select class="dropdown">
                    <option value="" disabled selected>Choisissez une formule</option>
                    <option value="free">Formule gratuite</option>
                    <option value="suivie">Formule suivie</option>
                    <option value="suivie+">Formule suivie +</option>
                </select> -->

                <label>Ma description</label>
                <textarea class="input-field description" placeholder="Décrivez-vous. Soyez inspiré." style="height: 150px; resize: none;"></textarea>

                <label>Langues parlées</label>
                <input type="text" class="input-field" placeholder="Vos langues">

                <label>Langues parlées</label>
                <input type="text" class="input-field" placeholder="Vos langues">
            </div>
        </div> </div>
        
        <br> <br> <br> <br>
        <!-- Grille des formulaires 3 -->
        <div class="profile-section">
            <!-- Profil (photo + bouton de modification) -->
            <div class="profile-container">
        </div>

        <!-- Grille des formulaires 4 -->
            <div class="form-box">
                <label>Adresse mail</label>
                <input type="email" class="input-field" placeholder="
                    <?php                                               //<!-- Affiche le mail depuis la session -->
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (isset($_SESSION['user_id'])) {
                        echo $_SESSION['user_email'];
                    } else {
                        echo "Non connecté";
                    }
                    ?>
                ">  
            </div>

            <div class="form-box">
                <label>Mot de Passe</label>
                <input type="password" class="input-field" placeholder="Nouveau mot de passe">  
            </div>
        </div> 

        <div class="button-container">        
            <button type="submit" class="save-button">Sauvegarder</button>
        </div>
  </div>

    <?php include('../../templates/footer.php'); ?>
    
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
