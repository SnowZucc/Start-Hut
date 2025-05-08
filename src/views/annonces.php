
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Annonces - Start-Hut</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
      <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-louis.css">
      <?php include('../templates/head.php'); ?>
  </head>
  <body>
    <?php include('../templates/header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/Start-Hut/config/config.php');

// Connexion à la base de données avec les constantes définies dans config.php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Récupération des valeurs des filtres depuis l'URL (méthode GET), sinon valeurs par défaut (chaîne vide)
$q = $_GET['q'] ?? '';               // Mot-clé saisi dans la barre de recherche
$categorie = $_GET['categorie'] ?? '';     // Filtre sur la catégorie (ex : business)
$competence = $_GET['competence'] ?? '';   // Filtre sur les compétences recherchées (ex : développeur)
$remuneration = $_GET['remuneration'] ?? '';// Filtre sur la rémunération (ex : 0-500)

// Tableau pour stocker dynamiquement les conditions WHERE de la requête
$conditions = [];

// Tableau pour stocker les valeurs à associer aux ? de la requête préparée
$params = [];

// Si un mot-clé est saisi, on filtre sur le titre ou la description de l'annonce
if (!empty($q)) {
    $conditions[] = "(p.annonce_titre LIKE ? OR p.annonce_description LIKE ?)";
    $params[] = "%$q%";  // Ajout du mot-clé avec les jokers % pour LIKE
    $params[] = "%$q%";
}

// Si une catégorie est sélectionnée, on ajoute une condition sur la colonne annonce_categorie
if (!empty($categorie)) {
    $conditions[] = "p.annonce_categorie = ?";
    $params[] = $categorie;
}

// Si une compétence est sélectionnée, on filtre sur la colonne annonce_competences_recherchees
if (!empty($competence)) {
    $conditions[] = "p.annonce_competences_recherchees = ?";
    $params[] = $competence;
}

// Filtrage sur les tranches de rémunération
if (!empty($remuneration)) {
    if ($remuneration === "0-500") {
        $conditions[] = "p.annonce_remuneration BETWEEN 0 AND 500";
    } elseif ($remuneration === "500-1000") {
        $conditions[] = "p.annonce_remuneration BETWEEN 500 AND 1000";
    } elseif ($remuneration === "1000+") {
        $conditions[] = "p.annonce_remuneration > 1000";
    }
}

// Construction de la requête SQL avec une jointure gauche sur les documents (pour récupérer une image associée)
$sql = "SELECT p.*, d.lien 
        FROM Projets p 
        LEFT JOIN Documents d ON p.id = d.projet AND d.type = 'image'";

// Si des conditions ont été ajoutées, on les concatène dans la requête avec AND
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Préparation sécurisée de la requête SQL
$stmt = $conn->prepare($sql);

// Si des paramètres ont été définis, on les associe à la requête avec bind_param
if ($params) {
    $types = str_repeat("s", count($params)); // Tous les paramètres sont de type string ici
    $stmt->bind_param($types, ...$params);
}

// Exécution de la requête
$stmt->execute();

// Récupération du résultat de la requête dans un objet mysqli_result
$result = $stmt->get_result();

    
    ?>

    <div class="content">
    <form method="GET" action="annonces.php">
  <div class="filtres-container">
    <input type="text" name="q" class="dropdown" placeholder="Mot-clé" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">

    <select name="categorie" class="dropdown">
      <option value="">Catégorie</option>
      <option value="technologies" <?= ($_GET['categorie'] ?? '') === 'technologies' ? 'selected' : '' ?>>Technologies</option>
      <option value="education" <?= ($_GET['categorie'] ?? '') === 'education' ? 'selected' : '' ?>>Éducation</option>
      <option value="business" <?= ($_GET['categorie'] ?? '') === 'business' ? 'selected' : '' ?>>Business</option>
    </select>

    <select name="competence" class="dropdown">
      <option value="">Compétence</option>
      <option value="developpeur" <?= ($_GET['competence'] ?? '') === 'developpeur' ? 'selected' : '' ?>>Développeur</option>
      <option value="designer" <?= ($_GET['competence'] ?? '') === 'designer' ? 'selected' : '' ?>>Designer</option>
      <option value="marketing" <?= ($_GET['competence'] ?? '') === 'marketing' ? 'selected' : '' ?>>Marketing</option>
      <option value="communication" <?= ($_GET['competence'] ?? '') === 'communication' ? 'selected' : '' ?>>Communication</option>
    </select>

    <select name="remuneration" class="dropdown">
      <option value="">Rémunération</option>
      <option value="0-500" <?= ($_GET['remuneration'] ?? '') === '0-500' ? 'selected' : '' ?>>0 - 500 €</option>
      <option value="500-1000" <?= ($_GET['remuneration'] ?? '') === '500-1000' ? 'selected' : '' ?>>500 - 1000 €</option>
      <option value="1000+" <?= ($_GET['remuneration'] ?? '') === '1000+' ? 'selected' : '' ?>>1000 € et +</option>
    </select>

    <button type="submit" class="btn-filtrer">Filtrer</button>
  </div>
</form>



      <div class="grid">
        <?php
        // Afficher les annonces récupérées par le PHP en haut dans une boucle
            while($row = $result->fetch_assoc()) {
                echo "<a href='annonce.php?id=" . $row["id"] . "' class='nav-links'>";
                echo "<figure>";
                echo "<img src='" . ($row["lien"] ?? 'https://vection-cms-prod.s3.eu-central-1.amazonaws.com/Adobe_Stock_525614074_8ab9bd18e3.jpeg') . "'>"; // Cherche l'image depuis le lien dans la db dans documents, sinon image par défaut
                echo "<figcaption>";
                echo "<h3>" . htmlspecialchars($row["annonce_titre"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["annonce_description"]) . "</p>";
                echo "</figcaption>";
                echo "</figure>";
                echo "</a>";
            }
        $conn->close();
        ?>
      </div>
    </div>
    <?php include('../templates/footer.php'); ?> <!-- Inclusion du footer -->
  </body>
</html>
