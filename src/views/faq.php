<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAQ Start-Hut</title>
  <meta name="description" content="FAQ – Tout ce qu'il faut savoir sur Start-Hut">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles.css">
  <link rel="stylesheet" href="/Start-Hut/public/assets/css/styles-khaleb.css">
</head>
<body>
  <?php include('../templates/header.php'); ?> 
  <div class="content"> 
  <div class="contentFAQ">
    <h1>Foire aux questions (FAQ)</h1>
    <p>Bienvenue dans notre section FAQ ! Vous trouverez ici les réponses aux questions les plus fréquentes concernant Start-Hut.</p>
  <!-- Section Inscription et Gestion du Compte -->
  <div class="faq-section">
    <h2>Inscription et Gestion du Compte</h2>
    <div class="faq-item">
    <div class="faq-bloc">
      <div class="faq-question">Comment créer un compte sur Start-Hut ?</div>
      <div class="faq-toggle"></div>
    </div>
      <div class="faq-answer">
        <p>Expliquez le processus d’inscription et les informations requises.</p>
      </div>
    </div>

    <div class="faq-item">
    <div class="faq-bloc">
      <div class="faq-question">Comment puis-je modifier ou supprimer mon compte ?</div>
      <div class="faq-toggle"></div>
    </div>
      <div class="faq-answer">
        <p>Fournissez des instructions sur la gestion des paramètres personnels.</p>
      </div>
    </div>

    <div class="faq-item">
    <div class="faq-bloc">
      <div class="faq-question">Que faire en cas d'oubli de mot de passe ?</div>
      <div class="faq-toggle"></div>
    </div>
      <div class="faq-answer">
        <p>Décrivez la procédure de réinitialisation du mot de passe.</p>
      </div>
    </div>
  </div>

  <!-- Section Sécurité et Confidentialité -->
  <div class="faq-section">
    <h2>Sécurité et Confidentialité</h2>
    <div class="faq-item">
    <div class="faq-bloc">
      <div class="faq-question">Comment protégez-vous mes données personnelles ?</div>
      <div class="faq-toggle"></div>
    </div>
      <div class="faq-answer">
        <p>Nous utilisons des protocoles de sécurité avancés pour garantir la protection de vos informations.</p>
      </div>
    </div>

    <div class="faq-item">
    <div class="faq-bloc">
      <div class="faq-question">Quels sont mes droits concernant mes données sur Start-Hut ?</div>
      <div class="faq-toggle"></div>
    </div>
      <div class="faq-answer">
        <p>Vous pouvez demander l'accès, la modification ou la suppression de vos données à tout moment.</p>
      </div>
    </div>
  </div>

  <!-- Section Paiements et Facturation -->
  <div class="faq-section">
      <h2>Paiements et Facturation</h2>
      <div class="faq-item">
      <div class="faq-bloc">
        <div class="faq-question">Quels modes de paiement acceptez-vous ?</div>
        <div class="faq-toggle"></div>
      </div>
        <div class="faq-answer">
          <p>Nous acceptons les paiements par carte bancaire, PayPal et virement bancaire.</p>
        </div>
      </div>

      <div class="faq-item">
      <div class="faq-bloc">
        <div class="faq-question">Comment annuler mon abonnement ?</div>
        <div class="faq-toggle"></div>
      </div>
        <div class="faq-answer">
          <p>Vous pouvez annuler votre abonnement via votre espace personnel ou en contactant notre support.</p>
        </div>
      </div>
  </div>

  <!-- Section Gestion des Services -->
  <div class="faq-section">
      <h2>Gestion des Services</h2>
      <div class="faq-item">
      <div class="faq-bloc">
        <div class="faq-question">Comment créer un projet ?</div>
        <div class="faq-toggle"></div>
      </div>
      <div class="faq-answer">
        <p>Vous pouvez créer un projet en accédant à votre tableau de bord et en suivant les étapes indiquées.</p>
      </div>
      </div>

      <div class="faq-item">
      <div class="faq-bloc">
        <div class="faq-question">Comment rejoindre un projet ?</div>
        <div class="faq-toggle"></div>
      </div>
        <div class="faq-answer">
          <p>Recherchez un projet dans la section dédiée et postulez en fonction de vos compétences.</p>
        </div>
      </div>

      <div class="faq-item">
      <div class="faq-bloc">
        <div class="faq-question">Existe-t-il une communauté ou un forum pour échanger ?</div>
        <div class="faq-toggle"></div>
      </div>
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
          <p>Nous sommes là pour vous aider.</p>
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
        <label for="name">Nom <span style="color: red">*</span></label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email <span style="color: red">*</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Votre message <span style="color: red">*</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" class="help-button">Envoyer</button>
      </form>
    </div>
  </div>

  <script>
  document.querySelectorAll('.faq-bloc').forEach(header => {
    header.addEventListener('click', () => {
      const item = header.closest('.faq-item');
      item.classList.toggle('active');
    });
  });
  </script>
  <script>
  // Sélection des éléments
  const openModalBtn = document.getElementById('open-help-modal');
  const modal = document.getElementById('help-modal');
  const closeModalBtn = document.querySelector('.close-modal');

  // Ouvrir la modale
  openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
  });

  // Fermer la modale
  closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Fermer si on clique en dehors de la modale
  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  </script>

  <?php include('../templates/footer.php'); ?>

</body>
</html>
