
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
    <?php 

    include('../../templates/header.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

    // Connexion à la base de données
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupération des données de l'utilisateur
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM Utilisateurs WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }
    ?> 

    <div class="content">
        <div class="profile-section">
            <!-- Photo de profil -->
            <div class="profile-container">
                <label for="file-upload">
                    <img src="default-profile.jpg" id="profile-pic" class="profile-pic" alt="Photo de profil">
                    <div class="edit-text">Modifier la photo</div>
                </label>
                <input type="file" id="file-upload" class="CV-input" accept="image/*">
            </div>

            <!-- Grille des formulaires -->
            <div class="form-grid">
                <!-- Colonne gauche -->
                <div class="form-box">
                    <label>Prénom</label>
                    <input type="text" class="input-field" placeholder="Votre prénom" 
                        value="<?php echo isset($user) ? htmlspecialchars($user['prenom']) : ''; ?>">

                    <label>Nom</label>
                    <input type="text" class="input-field" placeholder="Votre nom"
                        value="<?php echo isset($user) ? htmlspecialchars($user['nom']) : ''; ?>">

                    <label>Adresse mail</label>
                    <input type="email" class="input-field" placeholder="<?php 
                        if (isset($_SESSION['user_email'])) {
                            echo htmlspecialchars($_SESSION['user_email']);
                        } else {
                            echo 'Non connecté';
                        }
                    ?>">

                    <label>Mot de Passe</label>
                    <input type="password" class="input-field" placeholder="Nouveau mot de passe">  

                    <label>Statut</label>
                    <select class="dropdown">
                        <option value="" disabled selected>Choisissez votre statut</option>
                        <option value="emploi">En recherche de projet</option>
                        <option value="entrepreneur">Entrepreneur</option>
                    </select>

                    <label>Votre CV</label>
                    <input type="file" class="input-field">
                </div>

                <!-- Colonne droite -->
                <div class="form-box">
                    <label>Autres documents</label>
                    <input type="file" class="input-field">

                    <label>Ma description</label>
                    <textarea class="input-field description" placeholder="Décrivez-vous. Soyez inspiré." style="height: 150px; resize: none;"></textarea>

                    <label>Langues parlées</label>
                    <input type="text" class="input-field" placeholder="Vos langues">
                </div>
            </div>

            <!-- Bouton -->
            <div class="button-container">        
                <button type="submit" class="save-button">Sauvegarder</button>
            </div>
        </div>
    </div>

    <?php 
    $conn->close();
    include('../../templates/footer.php'); 
    ?>
    
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
