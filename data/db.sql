CREATE DATABASE gestionboutik;
USE gestionboutik;


CREATE TABLE categories (
    idcat INT PRIMARY KEY AUTO_INCREMENT,
    nomcat VARCHAR(50) NOT NULL
);

CREATE TABLE clients (
    idcl INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    photo VARCHAR(250) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    idcat INT,
    FOREIGN KEY (idcat) REFERENCES categories(idcat)
);

CREATE TABLE boutiquiers (
    idbtk INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    photo VARCHAR(250) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    motdepass VARCHAR(100) NOT NULL
);

CREATE TABLE `articles` (
    idart INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(100) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    qteStock INT
);

CREATE TABLE `dettes` (
    iddette INT PRIMARY KEY AUTO_INCREMENT,
    datedette DATE,
    montantdette DECIMAL(10,2) NOT NULL,
    etat VARCHAR(25) NOT NULL,
    idcl INT,
    FOREIGN KEY (idcl) REFERENCES clients(idcl)
);
ALTER TABLE `dettes` ADD `numero` VARCHAR(15) NOT NULL AFTER `iddette`;

CREATE TABLE ariclesDette (
    qteArtcile INT NOT NULL,
    idart INT,
    iddette INT,
    FOREIGN KEY (idart) REFERENCES articles(idart),
    FOREIGN KEY (iddette) REFERENCES dettes(iddette)
);

CREATE TABLE `paiements` (
    idpmt INT PRIMARY KEY AUTO_INCREMENT,
    datepmt DATE NOT NULL,
    montantpmt DECIMAL(10,2) NOT NULL
);
ALTER TABLE `paiements`
ADD `reference` VARCHAR(15) NOT NULL AFTER `montantpmt`,
ADD `iddette` INT,
ADD INDEX (`iddette`);


CREATE TABLE depots (
    iddpt INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10,2) NOT NULL,
    idcl INT,
    FOREIGN KEY (idcl) REFERENCES clients(idcl)
);
