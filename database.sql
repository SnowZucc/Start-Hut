CREATE DATABASE StartHut;
USE StartHut;

CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    type ENUM('porteur', 'utilisateur') NOT NULL
);

CREATE TABLE Projets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    createur INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    taches_effectuees INT NOT NULL,
    principe_du_projet TEXT NOT NULL,
    definition_du_marche TEXT,
    analyse_de_la_demande TEXT,
    analyse_de_la_concurrence TEXT,

    postuleurs_a_l_annonce INT,
    annonce_date_creation DATETIME NOT NULL,
    annonce_titre VARCHAR(255) NOT NULL,
    annonce_description TEXT NOT NULL,
    annonce_competences_recherchees ENUM ('developpeur', 'designer', 'marketing', 'communication', 'autre') NOT NULL,
    annonce_categorie ENUM ('technologies', 'education', 'business', 'autre') NOT NULL,
    annonce_collaborateurs_souhaites INT NOT NULL,
    annonce_etat ENUM ('ouvert', 'ferme') NOT NULL,

    FOREIGN KEY (createur) REFERENCES Utilisateurs(id),

    FOREIGN KEY (postuleurs_a_l_annonce) REFERENCES Utilisateurs(id)
);

CREATE TABLE ParticipantsProjets (      -- Table de liaison entre Utilisateurs et Projets
    id_projet INT NOT NULL,
    id_participant INT NOT NULL,
    role ENUM('chef', 'membre') NOT NULL,

    FOREIGN KEY (id_projet) REFERENCES Projets(id),
    FOREIGN KEY (id_participant) REFERENCES Utilisateurs(id)
);

CREATE TABLE Taches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    projet INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    priorite ENUM('basse', 'moyenne', 'haute') NOT NULL,
    etat ENUM('à faire', 'en cours', 'terminée') NOT NULL,

    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Abonnements (
    type INT PRIMARY KEY,
    prix DOUBLE NOT NULL,
    duree INT NOT NULL
);

CREATE TABLE Documents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    proprietaire INT,
    projet INT,
    lien VARCHAR(255) NOT NULL,
    type ENUM('texte', 'image', 'video', 'pdf') NOT NULL,

    FOREIGN KEY (proprietaire) REFERENCES Utilisateurs(id),
    FOREIGN KEY (projet) REFERENCES Projets(id)
);

CREATE TABLE Competences (
    nom VARCHAR(100) PRIMARY KEY NOT NULL,
    domaine VARCHAR(100) NOT NULL
);

CREATE TABLE Qualications (     -- Table de liaison entre Utilisateurs et Competences
    id_utilisateur INT NOT NULL,
    id_competence VARCHAR(100) NOT NULL,
    -- niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL,     -- a mettre ?

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_competence) REFERENCES Competences(nom)
);

CREATE TABLE Langues (
    nom VARCHAR(100) PRIMARY KEY
);

CREATE TABLE ParlerLangue (     -- Table de liaison entre Utilisateurs et Langues
    id_utilisateur INT NOT NULL,
    id_langue VARCHAR(100) NOT NULL,
    -- niveau ENUM('debutant', 'intermediaire', 'expert') NOT NULL,    -- a mettre ?

    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_langue) REFERENCES Langues(nom)
);

CREATE TABLE Messages_forum (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL,
    categorie VARCHAR(100) NOT NULL,
    reponse_a INT,
    date DATETIME NOT NULL,
    contenu TEXT NOT NULL,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (reponse_a) REFERENCES Messages_forum(id)
);

CREATE TABLE Messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_expediteur INT NOT NULL,
    id_destinataire INT NOT NULL,
    contenu TEXT NOT NULL,
    date DATETIME NOT NULL,

    FOREIGN KEY (id_expediteur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_destinataire) REFERENCES Utilisateurs(id)
);

INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, type)
VALUES ('Dupont', 'Jean', 'jean.dupont@example.com', 'motdepassehash123', 'utilisateur');