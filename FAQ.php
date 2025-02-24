<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAQ – Start-Hut</title>
  <meta name="description" content="FAQ – Tout ce qu'il faut savoir sur Start-Hut">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Style de base */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #000;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #00A859; /* Vert */
    }
    /* Conteneur principal */
    .faq-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
    }
    /* Style des items FAQ */
    .faq-item {
      border-bottom: 1px solid #ccc;
      padding: 15px 0;
      transition: background-color 0.3s;
    }
    .faq-item:hover {
      background-color: #f9f9f9;
    }
    /* Style de la question */
    .faq-question {
      cursor: pointer;
      font-size: 1.1em;
      font-weight: bold;
      color: #00A859;
      position: relative;
      padding-right: 20px;
    }
    .faq-question::after {
      content: '+';
      position: absolute;
      right: 0;
      font-size: 1.3em;
      color: #000;
    }
    /* Affichage de la réponse */
    .faq-answer {
      display: none;
      margin-top: 10px;
      padding-left: 20px;
      color: #000;
    }
    /* Item actif : réponse visible */
    .faq-item.active .faq-answer {
      display: block;
    }
    .faq-item.active .faq-question::after {
      content: '-';
    }
  </style>
</head>
<body>
  <?php include('header.php'); ?> <!-- Inclusion du header -->

  <div class="faq-container">
    <h1>FAQ – Tout ce qu'il faut savoir sur Start-Hut</h1>

    <div class="faq-item">
      <div class="faq-question">Comment puis-je m'inscrire ?</div>
      <div class="faq-answer">
        <p>Vous pouvez vous inscrire en cliquant sur le bouton "S'inscrire" en haut à droite de la page d'accueil.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Quels sont les modes de paiement acceptés ?</div>
      <div class="faq-answer">
        <p>Nous acceptons les paiements par carte de crédit, PayPal et virement bancaire.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Comment réinitialiser mon mot de passe ?</div>
      <div class="faq-answer">
        <p>Vous pouvez réinitialiser votre mot de passe en cliquant sur "Mot de passe oublié" sur la page de connexion.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Comment contacter le support technique ?</div>
      <div class="faq-answer">
        <p>Vous pouvez contacter notre support technique via le formulaire de contact ou par téléphone au 07 45 45 67 89.</p>
      </div>
    </div>
  </div>

  <script>
    // Permet de basculer l'affichage des réponses au clic sur la question
    document.querySelectorAll('.faq-question').forEach(function(question) {
      question.addEventListener('click', function() {
        this.parentElement.classList.toggle('active');
      });
    });
  </script>

  <?php include('footer.php'); ?> <!-- Inclusion du footer -->
</body>
</html>
