<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAQ Start-Hut</title>
  <meta name="description" content="FAQ – Tout ce qu'il faut savoir sur Start-Hut">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php include('header.php'); ?>
  <div class="content">
    <div class="landing">
      <div class="landing-text">
        <input type="text" class="search-bar" placeholder="Rechercher">
        <h2>FAQ – Tout ce qu'il faut savoir sur Start-Hut</h2>

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

      </div> <!-- .landing-text -->
    </div> <!-- .landing -->
  </div> <!-- .content -->

  <script>
    // Bascule l'affichage des réponses au clic sur la question
    document.querySelectorAll('.faq-question').forEach(function(question) {
      question.addEventListener('click', function() {
        this.parentElement.classList.toggle('active');
      });
    });
  </script>

  <?php include('footer.php'); ?>
</body>
</html>
