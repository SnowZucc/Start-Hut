<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAQ Start-Hut</title>
  <meta name="description" content="FAQ – Tout ce qu'il faut savoir sur Start-Hut">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-khaleb.css">
</head>
<body>
  <?php include('../templates/header.php'); ?> 
  <div class="content"> 
  <div class="contentFAQ">
  <h1>FAQ – Tout ce qu'il faut savoir sur Start-Hut</h1>
  <!-- Section Inscription et Gestion du Compte -->
  <div class="faq-section">
    <h2>Inscription et Gestion du Compte</h2>
    <div class="faq-item">
      <div class="faq-question">Comment créer un compte sur Start-Hut ?</div>
      <div class="faq-answer">
        <p>Expliquez le processus d’inscription et les informations requises.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Comment puis-je modifier ou supprimer mon compte ?</div>
      <div class="faq-answer">
        <p>Fournissez des instructions sur la gestion des paramètres personnels.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Que faire en cas d'oubli de mot de passe ?</div>
      <div class="faq-answer">
        <p>Décrivez la procédure de réinitialisation du mot de passe.</p>
      </div>
    </div>
  </div>

  <!-- Section Sécurité et Confidentialité -->
  <div class="faq-section">
    <h2>Sécurité et Confidentialité</h2>
    <div class="faq-item">
      <div class="faq-question">Comment protégez-vous mes données personnelles ?</div>
      <div class="faq-answer">
        <p>Nous utilisons des protocoles de sécurité avancés pour garantir la protection de vos informations.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Quels sont mes droits concernant mes données sur Start-Hut ?</div>
      <div class="faq-answer">
        <p>Vous pouvez demander l'accès, la modification ou la suppression de vos données à tout moment.</p>
      </div>
    </div>
  </div>

  <!-- Section Paiements et Facturation -->
  <div class="faq-section">
      <h2>Paiements et Facturation</h2>
      <div class="faq-item">
        <div class="faq-question">Quels modes de paiement acceptez-vous ?</div>
        <div class="faq-answer">
          <p>Nous acceptons les paiements par carte bancaire, PayPal et virement bancaire.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Comment annuler mon abonnement ?</div>
        <div class="faq-answer">
          <p>Vous pouvez annuler votre abonnement via votre espace personnel ou en contactant notre support.</p>
        </div>
      </div>
  </div>

  <!-- Section Gestion des Services -->
  <div class="faq-section">
      <h2>Gestion des Services</h2>
      <div class="faq-item">
        <div class="faq-question">Comment créer un projet ?</div>
        <div class="faq-answer">
          <p>Vous pouvez créer un projet en accédant à votre tableau de bord et en suivant les étapes indiquées.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Comment rejoindre un projet ?</div>
        <div class="faq-answer">
          <p>Recherchez un projet dans la section dédiée et postulez en fonction de vos compétences.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Existe-t-il une communauté ou un forum pour échanger ?</div>
        <div class="faq-answer">
          <p>Oui, vous pouvez rejoindre notre forum de discussion pour échanger avec d'autres utilisateurs.</p>
        </div>
      </div>
  </div>
   
  <!-- Section Contactez-nous stylisée dans une box -->

    <div class="contact-section">
      <div class="contact-container">
        <div class="contact-text">
          <h2>Besoin d'aide ?</h2>
          <p>Nous sommes là pour vous aider. Contactez-nous pour toute question ou assistance.</p>
          <button id="open-help-modal" class="contact-button">Contactez-nous</button>
        </div>
        <div class="contact-image">
          <img src="/Start-Hut/public/assets/img/image-aide.png" alt="image d'aide" >
        </div>
      </div>
    </div>
    </div>
  </div> 

  <!-- Fenêtre pop-up pour le formulaire d'aide -->
  <div id="help-modal" class="modal" style="display: none;">
    <div class="modal-content">
      <span class="close-modal">&times;</span>
      <h2>Formulaire d'aide</h2>
      <form action="#" method="POST" class="help-form">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Votre message :</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" class="help-button">Envoyer</button>
      </form>
    </div>
  </div>
 

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.faq-question').forEach(function(question) {
      question.addEventListener('click', function() {
        this.parentElement.classList.toggle('active');
      });
    });
    var modal = document.getElementById("help-modal");
    var openModalBtn = document.getElementById("open-help-modal");
    var closeModalBtn = document.querySelector(".close-modal");

    openModalBtn.addEventListener("click", function() {
      modal.style.display = "flex";
    });

    closeModalBtn.addEventListener("click", function() {
      modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });
  </script>
  <?php include('../templates/footer.php'); ?>
</body>
</html>
