<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/styles-meryem.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="assets/css/projects-populaires.css"> <!-- Ton CSS pour la section "projets populaires" -->
    </head>
    <body>
    <?php include('../src/templates/header.php'); ?>    

    <div class="content">
        <!-- Hero Section -->
        <section class="landing">
            <div class="landing-text">
                <h1>START-HUT</h1>
                <p>L'outil le plus simple <br> pour <span class="highlight">transformer</span> vos idées en startups.</p>
                <a href="../src/views/annonces.php" class="btnlanding">
                    <span>Voir tous les projets</span>
                    <i class="fas fa-arrow-right arrow-icon"></i>
                </a>
            </div>
            <div class="landing-image">
                <img src="https://img.freepik.com/free-vector/business-team-discussing-ideas-startup_74855-4380.jpg?w=1380&t=st=1714579429~exp=1714580029~hmac=64a3984348efb08d9be17b07ed4e31ba3495af40fc0e6f2de1e62cf247741b5c" alt="Illustration de startups">
            </div>
        </section>

        <!-- New Popular Projects Section -->
        <section class="popular-section">
            <div class="container mx-auto px-4 py-16">
            <div class ="textepop"> <!-- texte --> <h2>Projet<br> <span class ="highlight"> populaires</span> <!-- pour stylisée le mot populaire uniquement --> </h2> </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mt-10">
                    <!-- Project 1 -->
                    <div class="project-card rounded-lg p-6 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="icon-container h-20 w-20 rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <i class="fas fa-laptop-code text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Lancer une app web</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Plateforme web pour connecter des artisans locaux avec des clients à la recherche de services personnalisés et d'artisanat de qualité.</p>
                        <a href="#" class="btn-details text-white font-medium py-2 px-5 rounded-full inline-block mt-auto">Voir détails</a>
                    </div>
                    
                    <!-- Project 2 -->
                    <div class="project-card rounded-lg p-6 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="icon-container h-20 w-20 rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <i class="fas fa-chart-line text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Startup de service</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Service innovant de conseils aux entreprises centré sur la transition écologique et l'optimisation des ressources énergétiques.</p>
                        <a href="#" class="btn-details text-white font-medium py-2 px-5 rounded-full inline-block mt-auto">Voir détails</a>
                    </div>
                    
                    <!-- Project 3 -->
                    <div class="project-card rounded-lg p-6 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="icon-container h-20 w-20 rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <i class="fas fa-brain text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">#IA Générative</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Solution d'IA générative spécialisée dans la création de contenus pédagogiques adaptés aux besoins spécifiques des élèves.</p>
                        <a href="#" class="btn-details text-white font-medium py-2 px-5 rounded-full inline-block mt-auto">Voir détails</a>
                    </div>
                    
                    <!-- Project 4 -->
                    <div class="project-card rounded-lg p-6 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="icon-container h-20 w-20 rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <i class="fas fa-money-bill-wave text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Plateforme finance</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Application de gestion financière intuitive permettant aux particuliers d'optimiser leur épargne et d'investir dans des projets durables.</p>
                        <a href="#" class="btn-details text-white font-medium py-2 px-5 rounded-full inline-block mt-auto">Voir détails</a>
                    </div>
                    
                    <!-- Project 5 -->
                    <div class="project-card rounded-lg p-6 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="icon-container h-20 w-20 rounded-full flex items-center justify-center mb-4 shadow-sm">
                            <i class="fas fa-dumbbell text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Appli de fitness</h3>
                        <p class="text-gray-600 mb-6 flex-grow">Solution fitness connectée qui crée des programmes d'entraînement personnalisés basés sur les objectifs et contraintes physiques de chaque utilisateur.</p>
                        <a href="#" class="btn-details text-white font-medium py-2 px-5 rounded-full inline-block mt-auto">Voir détails</a>
                    </div>
                </div>
                
                <div class="text-center mt-12">
                <a href="../src/views/annonces.php" class="btn-explorer">
                        Explorer tous les projets
                        <i class="fas fa-arrow-right arrow-icon"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="pourquoi-section">
            <div class="conteneur-pourquoinouschoisir">
                <div class="imagepourquoinouschoisir">
                    <img src="https://img.freepik.com/free-vector/business-team-brainstorm-idea-lightbulb-from-jigsaw-working-team-collaboration-enterprise-cooperation-colleagues-mutual-assistance-concept-pinkish-coral-bluevector-isolated-illustration_335657-1651.jpg?w=1380&t=st=1714579570~exp=1714580170~hmac=f57de609bdb0c839b777737ee9be8437e66a57705325e23927d6a38e111dbfcf" alt="Collaboration d'équipe">
                </div>
                <div class="textepourquoinouschoisir">
                    <h2>Lancez vous, c'est facile.</h2>
                    <div class="liste-choix">
                        <figure>
                            <img src="https://img.icons8.com/ios/50/27ae60/conference-call.png" alt="Talents">
                            <figcaption>
                                <h3>Trouvez les bons talents</h3>
                                <p>Accédez à une communauté de profils motivés et compétents pour construire votre équipe idéale.</p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="https://img.icons8.com/ios/50/27ae60/idea.png" alt="Vision">
                            <figcaption>
                                <h3>Définissez votre vision</h3>
                                <p>Donnez à votre projet une direction précise pour attirer les meilleurs profils.</p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="https://img.icons8.com/ios/50/27ae60/handshake.png" alt="Collaboration">
                            <figcaption>
                                <h3>Bâtissez des collaborations solides</h3>
                                <p>Travaillez avec des personnes de confiance pour faire avancer votre projet dans les meilleures conditions.</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include('../src/templates/footer.php'); ?>    
    </body>
</html>
