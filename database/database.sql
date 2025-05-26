CREATE DATABASE StartHut;
USE StartHut;

CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    description_profil VARCHAR(255),
    langues_parlees VARCHAR(255),
    type ENUM('porteur', 'collaborateur', 'admin') NOT NULL
);

CREATE TABLE Projets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    createur INT NOT NULL,
    nom VARCHAR(255) NOT NULL UNIQUE,
    taches_effectuees INT NOT NULL  DEFAULT 0 CHECK (taches_effectuees >= 0),
    principe_du_projet TEXT NOT NULL ,
    definition_du_marche TEXT ,
    analyse_de_la_demande TEXT ,
    analyse_de_la_concurrence TEXT ,

    annonce_date_creation DATETIME NOT NULL ,
    annonce_titre VARCHAR(255) NOT NULL ,
    annonce_description TEXT NOT NULL ,
    annonce_competences_recherchees ENUM ('developpeur', 'designer', 'marketing', 'communication', 'autre') NOT NULL,
    annonce_categorie ENUM ('technologies', 'education', 'business', 'autre') NOT NULL,
    annonce_collaborateurs_souhaites INT NOT NULL ,
    annonce_remuneration DOUBLE NOT NULL DEFAULT 0 CHECK (annonce_remuneration >= 0),
    annonce_etat ENUM ('ouvert', 'ferme') NOT NULL ,

    FOREIGN KEY (createur) REFERENCES Utilisateurs(id)
);


CREATE TABLE Candidatures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    projet_id INT NOT NULL,
    date_postulation DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en attente', 'accepte', 'refuse') DEFAULT 'en attente',

    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (projet_id) REFERENCES Projets(id)
);


CREATE TABLE ParticipantsProjets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_projet INT NOT NULL,
    id_participant INT NOT NULL,
    role ENUM('chef', 'membre') NOT NULL,
    UNIQUE (id_projet, id_participant),
    FOREIGN KEY (id_projet) REFERENCES Projets(id),
    FOREIGN KEY (id_participant) REFERENCES Utilisateurs(id)
);


CREATE TABLE Taches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    projet INT NOT NULL ,
    nom VARCHAR(255) NOT NULL ,
    priorite ENUM('basse', 'moyenne', 'haute') NOT NULL ,
    etat ENUM('à faire', 'en cours', 'terminée') NOT NULL ,

    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Abonnements (
    type INT PRIMARY KEY,
    prix DOUBLE NOT NULL  CHECK (prix >= 0),
    duree INT NOT NULL 
);

CREATE TABLE Documents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    proprietaire INT ,
    projet INT ,
    lien VARCHAR(255) NOT NULL,
    type ENUM('texte', 'image', 'video', 'pdf') NOT NULL ,

    FOREIGN KEY (proprietaire) REFERENCES Utilisateurs(id),
    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Competences (
    nom VARCHAR(100) PRIMARY KEY NOT NULL,
    domaine VARCHAR(100) NOT NULL
);

CREATE TABLE Qualifications (     -- Table de liaison entre Utilisateurs et Competences
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT NOT NULL ,
    id_competence VARCHAR(100) NOT NULL,
     niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL ,

     UNIQUE (id_utilisateur, id_competence),    -- Un utilisateur ne peut pas avoir deux fois la même compétence

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_competence) REFERENCES Competences(nom)
);

CREATE TABLE Langues (
    nom VARCHAR(100) PRIMARY KEY NOT NULL
);

CREATE TABLE ParlerLangue (     -- Table de liaison entre Utilisateurs et Langues
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT NOT NULL ,
    id_langue VARCHAR(100) NOT NULL ,
    niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL ,

    UNIQUE (id_utilisateur, id_langue),    -- Un utilisateur ne peut pas parler deux fois la même langue

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_langue) REFERENCES Langues(nom)
);

CREATE TABLE Messages_forum (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL ,
    categorie VARCHAR(100) NOT NULL ,
    reponse_a INT ,
    date DATETIME NOT NULL ,
    contenu TEXT NOT NULL ,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (reponse_a) REFERENCES Messages_forum(id)
);

CREATE TABLE Messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL ,
    id_destinataire INT ,
    contenu TEXT NOT NULL ,
    date DATETIME NOT NULL ,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_destinataire) REFERENCES Utilisateurs(id)
);

CREATE TABLE Contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE Annonces_Sauvegardees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_projet INT NOT NULL,
    date_sauvegarde DATETIME DEFAULT CURRENT_TIMESTAMP,

    UNIQUE(id_utilisateur, id_projet), -- Empêche un doublon

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id)
        ON DELETE CASCADE,
    FOREIGN KEY (id_projet) REFERENCES Projets(id)
        ON DELETE CASCADE
);



-- Exemples d'utilisation
-- Utilisateurs mdp : motdepassehash123

INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, description_profil, langues_parlees, type)
VALUES ('Scénat', 'Jean', 'jean.dupont@example.com', '$2y$10$8cFccmfc6dbRvqwgLvY72OMvXu42pzDmTtT2s68SFhgu3X9Xxn5Dq', 'Je suis Jean, créateur de projets depuis 1999', 'Francais', 'collaborateur');
INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, description_profil, langues_parlees, type)
VALUES ('Echtebez', 'Philippe', 'jean.dupont2@example.com', '$2y$10$8cFccmfc6dbRvqwgLvY72OMvXu42pzDmTtT2s68SFhgu3X9Xxn5Dq', 'Je suis Jean, créateur de projets depuis 1999', 'Francais', 'porteur');
INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, description_profil, langues_parlees, type)
VALUES ('Alexandre', 'Louis', 'louis.alexandre@tutanota.com', '$2y$10$fcMAF5eBfJ5ipRcwafCRAepegQ2Lz0RlaHK4nDaMJmNTC36DPb.6G', 'Je suis Louis, créateur de projets depuis 1999', 'Francais', 'admin');

INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, description_profil, langues_parlees, type)
VALUES ('Martin', 'Sophie', 'sophie.martin@example.com', '$2y$10$8cFccmfc6dbRvqwgLvY72OMvXu42pzDmTtT2s68SFhgu3X9Xxn5Dq', 'Passionnée d\'innovation et de startups', 'Francais', 'porteur');

INSERT INTO Projets (createur, nom, taches_effectuees, principe_du_projet, definition_du_marche, analyse_de_la_demande, analyse_de_la_concurrence, annonce_date_creation, annonce_titre, annonce_description, annonce_competences_recherchees, annonce_categorie, annonce_collaborateurs_souhaites, annonce_remuneration, annonce_etat)
VALUES (1, 'Rarissimo', 0, 'Site web de vente objets rares', 'Définition du marché Alpha', 'Analyse de la demande Alpha', 'Analyse de la concurrence Alpha', '2023-10-01 10:00:00', 'Rarissimo', 'Site web de vente objets rares', 'developpeur', 'technologies', 3, 1500, 'ouvert');
INSERT INTO Projets (createur, nom, taches_effectuees, principe_du_projet, definition_du_marche, analyse_de_la_demande, analyse_de_la_concurrence, annonce_date_creation, annonce_titre, annonce_description, annonce_competences_recherchees, annonce_categorie, annonce_collaborateurs_souhaites, annonce_remuneration, annonce_etat)
VALUES (1, 'Junioro', 0, 'Application mobiles pour les junior entreprises', 'Définition du marché Beta', 'Analyse de la demande Beta', 'Analyse de la concurrence Beta', '2023-10-01 10:00:00', 'Junioro', 'Application mobiles pour les junior entreprises', 'developpeur', 'technologies', 3, 1500, 'ouvert');

INSERT INTO ParticipantsProjets (id_projet, id_participant, role)
VALUES (1, 1, 'chef');

INSERT INTO Taches (projet, nom, priorite, etat)
VALUES (1, 'Tâche 1', 'haute', 'à faire');

INSERT INTO Abonnements (type, prix, duree)
VALUES (1, 19.99, 30);

-- Images pour les utilisateurs
INSERT INTO Documents (proprietaire, lien, type)
VALUES (1, 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&crop=face', 'image');

INSERT INTO Documents (proprietaire, lien, type)
VALUES (2, 'https://i.etsystatic.com/10914225/r/il/219147/2049245914/il_1588xN.2049245914_60h3.jpg', 'image');

INSERT INTO Documents (proprietaire, lien, type)
VALUES (3, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400', 'image');

-- Images pour les projets
INSERT INTO Documents (projet, lien, type)
VALUES (1, 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=600&h=400&fit=crop', 'image');

INSERT INTO Documents (projet, lien, type)
VALUES (2, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=400&fit=crop', 'image');

INSERT INTO Competences (nom, domaine)
VALUES ('Programmation', 'Informatique');

INSERT INTO Qualifications (id_utilisateur, id_competence, niveau)
VALUES (1, 'Programmation', 'expert');

INSERT INTO Langues (nom)
VALUES ('Français');

INSERT INTO ParlerLangue (id_utilisateur, id_langue, niveau)
VALUES (1, 'Français', 'expert');

INSERT INTO Messages_forum (id_expediteur, categorie, reponse_a, date, contenu)
VALUES (1, 'Général', NULL, '2023-10-01 10:00:00', 'Contenu du message du forum');

INSERT INTO Messages (id_expediteur, id_destinataire, contenu, date)
VALUES (1, 2, 'Contenu du message privé', '2023-10-01 10:00:00');

INSERT INTO Projets (
    createur, nom, taches_effectuees, principe_du_projet,
    definition_du_marche, analyse_de_la_demande, analyse_de_la_concurrence,
    annonce_date_creation, annonce_titre, annonce_description,
    annonce_competences_recherchees, annonce_categorie,
    annonce_collaborateurs_souhaites, annonce_remuneration, annonce_etat
) VALUES
-- Projet 1 : CleanDrop
(1, 'CleanDrop', 0, 'Développement d’un boîtier connecté pour économiser l’eau à chaque douche.',
 'Marché des objets connectés éco-responsables.',
 'De plus en plus de foyers souhaitent contrôler leur consommation d’eau.',
 'Peu de solutions intelligentes avec retour d\'information en temps réel.',
 '2025-05-01 09:30:00', 'Développeur embarqué pour CleanDrop',
 'Rejoins une équipe motivée pour créer une solution innovante de gestion de l’eau !',
 'developpeur', 'technologies', 2, 0, 'ouvert'),

-- Projet 2 : BookLoop
(2, 'BookLoop', 1, 'Application de troc de livres entre particuliers.',
 'Marché de l’économie circulaire et du livre d’occasion.',
 'Les étudiants et lecteurs réguliers cherchent des solutions économiques.',
 'Aucun acteur dominant le marché francophone.',
 '2025-05-02 15:00:00', 'Designer pour une app mobile de troc de livres',
 'Crée avec nous une interface ludique et intuitive pour les amoureux de la lecture.',
 'designer', 'education', 1, 100, 'ouvert'),

-- Projet 3 : FoodSense
(3, 'FoodSense', 0, 'Application de détection des allergènes dans les aliments à partir d\'une simple photo.',
 'Marché des applications santé et alimentation.',
 'Les personnes allergiques veulent identifier rapidement les risques.',
 'Des apps existent, mais peu fiables ou trop lentes.',
 '2025-05-04 11:45:00', 'Rejoins FoodSense : IA et santé au menu !',
 'Tu es passionné(e) d’IA et santé ? Viens créer une app qui sauve des vies !',
 'developpeur', 'technologies', 3, 200, 'ouvert'),

-- Projet 4 : YouniFeed
(4, 'YouniFeed', 2, 'Plateforme collaborative pour que les étudiants partagent leurs bons plans repas et recettes économiques.',
 'Ciblage des étudiants et jeunes actifs.',
 'Forte demande pour cuisiner pas cher et bien manger.',
 'Pas de plateforme francophone orientée “communauté étudiante”.',
 '2025-05-05 14:15:00', 'Community manager pour startup étudiante',
 'Aide-nous à animer une communauté jeune, fun et engagée !',
 'communication', 'autre', 2, 0, 'ouvert'),

-- Projet 5 : SafeSteps
(3, 'SafeSteps', 1, 'Semelles intelligentes pour seniors, détectant les chutes et alertant les proches.',
 'Silver Economy en plein essor.',
 'Les familles veulent des dispositifs discrets et fiables.',
 'Peu de solutions non-invasives.',
 '2025-05-06 08:30:00', 'Développeur embarqué ou hardware pour SafeSteps',
 'Tu veux allier tech et impact social ? Ce projet est pour toi !',
 'developpeur', 'technologies', 2, 150, 'ouvert'),

-- Projet 6 : LinguaLoop
(4, 'LinguaLoop', 4, 'Appli mobile de pratique des langues via échange audio anonyme entre natifs.',
 'Marché des apps linguistiques en croissance constante.',
 'Beaucoup cherchent à pratiquer sans stress ou jugement.',
 'Les apps comme Duolingo ne proposent pas d’échanges vocaux anonymes.',
 '2025-05-07 17:00:00', 'Co-fondateur marketing pour app linguistique',
 'On a la vision tech, on veut booster la croissance ! Tu es partant ?',
 'marketing', 'education', 1, 0, 'ouvert');

-- Images pour les nouveaux projets
INSERT INTO Documents (projet, lien, type) 
VALUES (3, "https://media.istockphoto.com/id/1408371424/fr/photo/application-mobile-pour-suivre-les-calories-consomm%C3%A9es.webp?s=2048x2048&w=is&k=20&c=aRVpR24AWbs5ucMu8LRLOMIUQZBMyzCB8_ZWOtxzE70=", 'image');

INSERT INTO Documents (projet, lien, type) 
VALUES (4, "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400", 'image');

INSERT INTO Documents (projet, lien, type) 
VALUES (5, "https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400", 'image');

INSERT INTO Documents (projet, lien, type) 
VALUES (6, "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=400", 'image');

INSERT INTO Documents (projet, lien, type) 
VALUES (7, "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400", 'image');

INSERT INTO Documents (projet, lien, type) 
VALUES (8, "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400", 'image'); 