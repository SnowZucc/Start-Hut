<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Startups en lancement</title>
      <meta name="description" content="Découvrez les nouvelles startups innovantes prêtes à révolutionner leur domaine.">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php include('header.php'); ?>         <!-- Rajoute le header par la magie de PHP  -->

    <div class="content">
      <input type="text" class="search-bar" placeholder="Recherchez par mot-clé, domaine ou compétence">

      <div class="grid">
        <select class="dropdown">
          <option value="" disabled selected>Catégorie</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Compétence</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Rémunération</option>
          <option value="dev">Développement</option>
          <option value="marketing">Marketing</option>
        </select>
      </div>

      <div class="grid">
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>EcoCharge</h3>
              <p>Rechargez vos appareils n'importe où grâce à nos batteries solaires compactes et durables.</p> 
            </figcaption>
        </figure>
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>SkillBoost</h3>
              <p>Apprenez des compétences en forte demande grâce à des micro-cours interactifs et certifiants.</p> 
            </figcaption>
        </figure>            
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>FoodieLink</h3>
              <p>Connectez-vous avec des cuisiniers amateurs et dégustez des repas faits maison près de chez vous.</p> 
            </figcaption>
        </figure>            
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>HomeSync</h3>
              <p>Centralisez la gestion de votre maison connectée avec une seule application intuitive.</p> 
            </figcaption>
        </figure>            
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>EventEase</h3>
              <p>Planifiez, organisez et gérez vos événements professionnels et privés en toute simplicité.</p> 
            </figcaption>
        </figure>            
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>TravelMatch</h3>
              <p>Trouvez des compagnons de voyage partageant vos centres d'intérêt et votre style d’aventure.</p> 
            </figcaption>
        </figure>
      </div>
    </div>
    <?php include('footer.php'); ?> <!-- Inclusion du footer -->
  </body>
</html>
