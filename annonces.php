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
      <input type="text" class="search-bar" placeholder="Recherchez par mot-clé, domaine ou compétence">

      <div class="grid">
        <select class="dropdown">
          <option value="" disabled selected>Catégorie</option>
          <option value="volvo">Développement</option>
          <option value="saab">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Compétence</option>
          <option value="volvo">Développement</option>
          <option value="saab">Marketing</option>
        </select>
        <select class="dropdown">
          <option value="" disabled selected>Rémunération</option>
          <option value="volvo">Développement</option>
          <option value="saab">Marketing</option>
        </select>
      </div>

      <div class="grid">
        <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Annonce 2</h3>
              <p>Description de l'image 2</p> 
            </figcaption>
          </figure>
          <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Annonce 2</h3>
              <p>Description de l'image 2</p> 
            </figcaption>
          </figure>            
          <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Mark</h3>
              <p>Give me the Zuck</p> 
            </figcaption>
          </figure>            
          <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Annonce 2</h3>
              <p>Description de l'image 2</p> 
            </figcaption>
          </figure>            
          <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Annonce 2</h3>
              <p>Description de l'image 2</p> 
            </figcaption>
          </figure>            
          <figure>
            <img src="https://wallsdesk.com/wp-content/uploads/2017/01/Mark-Zuckerberg-Wallpapers.jpg">
            <figcaption>
              <h3>Annonce 2</h3>
              <p>Description de l'image 2</p> 
            </figcaption>
          </figure>
        </div>
      </div>
  </body>
</html>