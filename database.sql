CREATE DATABASE StartHut;
USE StartHut;

CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL UNIQUE,
    type ENUM('porteur', 'utilisateur') NOT NULL
);

CREATE TABLE Projets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    createur INT NOT NULL UNIQUE,
    nom VARCHAR(255) NOT NULL UNIQUE,
    taches_effectuees INT NOT NULL UNIQUE DEFAULT 0 CHECK (taches_effectuees >= 0),
    principe_du_projet TEXT NOT NULL UNIQUE,
    definition_du_marche TEXT UNIQUE,
    analyse_de_la_demande TEXT UNIQUE,
    analyse_de_la_concurrence TEXT UNIQUE,

    postuleurs_a_l_annonce INT,
    annonce_date_creation DATETIME NOT NULL UNIQUE,
    annonce_titre VARCHAR(255) NOT NULL UNIQUE,
    annonce_description TEXT NOT NULL UNIQUE,
    annonce_competences_recherchees ENUM ('developpeur', 'designer', 'marketing', 'communication', 'autre') NOT NULL,
    annonce_categorie ENUM ('technologies', 'education', 'business', 'autre') NOT NULL,
    annonce_collaborateurs_souhaites INT NOT NULL UNIQUE,
    annonce_etat ENUM ('ouvert', 'ferme') NOT NULL UNIQUE,

    FOREIGN KEY (createur) REFERENCES Utilisateurs(id),

    FOREIGN KEY (postuleurs_a_l_annonce) REFERENCES Utilisateurs(id)
);

CREATE TABLE ParticipantsProjets (      -- Table de liaison entre Utilisateurs et Projets
    id_projet INT NOT NULL UNIQUE,
    id_participant INT NOT NULL,
    role ENUM('chef', 'membre') NOT NULL UNIQUE,

    FOREIGN KEY (id_projet) REFERENCES Projets(id),
    FOREIGN KEY (id_participant) REFERENCES Utilisateurs(id)
);

CREATE TABLE Taches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    projet INT NOT NULL UNIQUE,
    nom VARCHAR(255) NOT NULL UNIQUE,
    priorite ENUM('basse', 'moyenne', 'haute') NOT NULL UNIQUE,
    etat ENUM('à faire', 'en cours', 'terminée') NOT NULL UNIQUE,

    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Abonnements (
    type INT PRIMARY KEY,
    prix DOUBLE NOT NULL UNIQUE CHECK (prix >= 0),
    duree INT NOT NULL UNIQUE
);

CREATE TABLE Documents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    proprietaire INT UNIQUE,
    projet INT UNIQUE,
    lien VARCHAR(255) NOT NULL UNIQUE,
    type ENUM('texte', 'image', 'video', 'pdf') NOT NULL UNIQUE,

    FOREIGN KEY (proprietaire) REFERENCES Utilisateurs(id),
    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Competences (
    nom VARCHAR(100) PRIMARY KEY NOT NULL,
    domaine VARCHAR(100) NOT NULL
);

CREATE TABLE Qualifications (     -- Table de liaison entre Utilisateurs et Competences
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT NOT NULL UNIQUE,
    id_competence VARCHAR(100) NOT NULL,
     niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL UNIQUE,

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_competence) REFERENCES Competences(nom)
);

CREATE TABLE Langues (
    nom VARCHAR(100) PRIMARY KEY NOT NULL
);

CREATE TABLE ParlerLangue (     -- Table de liaison entre Utilisateurs et Langues
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT NOT NULL UNIQUE,
    id_langue VARCHAR(100) NOT NULL,
    niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL UNIQUE,

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_langue) REFERENCES Langues(nom)
);

CREATE TABLE Messages_forum (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL UNIQUE,
    categorie VARCHAR(100) NOT NULL UNIQUE,
    reponse_a INT UNIQUE,
    date DATETIME NOT NULL UNIQUE,
    contenu TEXT NOT NULL UNIQUE,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (reponse_a) REFERENCES Messages_forum(id)
);

CREATE TABLE Messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL UNIQUE,
    id_destinataire INT NOT NULL UNIQUE,
    contenu TEXT NOT NULL UNIQUE,
    date DATETIME NOT NULL UNIQUE,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_destinataire) REFERENCES Utilisateurs(id)
);

-- Exemples d'utilisation
INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, type)
VALUES ('Dupont', 'Jean', 'jean.dupont@example.com', 'motdepassehash123', 'utilisateur');

INSERT INTO Projets (createur, nom, taches_effectuees, principe_du_projet, definition_du_marche, analyse_de_la_demande, analyse_de_la_concurrence, postuleurs_a_l_annonce, annonce_date_creation, annonce_titre, annonce_description, annonce_competences_recherchees, annonce_categorie, annonce_collaborateurs_souhaites, annonce_etat)
VALUES (1, 'Projet Alpha', 0, 'Principe du projet Alpha', 'Définition du marché Alpha', 'Analyse de la demande Alpha', 'Analyse de la concurrence Alpha', 1, '2023-10-01 10:00:00', 'Titre de l\'annonce Alpha', 'Description de l\'annonce Alpha', 'developpeur', 'technologies', 3, 'ouvert');

INSERT INTO ParticipantsProjets (id_projet, id_participant, role)
VALUES (1, 1, 'chef');

INSERT INTO Taches (projet, nom, priorite, etat)
VALUES (1, 'Tâche 1', 'haute', 'à faire');

INSERT INTO Abonnements (type, prix, duree)
VALUES (1, 19.99, 30);

INSERT INTO Documents (proprietaire, projet, lien, type)
VALUES (1, 1, 'http://example.com/document1.pdf', 'pdf');

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