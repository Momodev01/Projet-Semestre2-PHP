USE gestionboutik;

-- Insertion des catégories mises à jour
INSERT INTO categories (nomcat) VALUES ('Nouveau'), ('Non solvable'), ('Solvable'), ('Fidèle');

-- Insertion des clients
INSERT INTO clients (nom, prenom, photo, telephone, adresse, email, idcat) VALUES
('Diop', 'Aïssatou', 'aissatoudiop.jpg', '770000001', 'Casotors', 'aissatoudiop@gmail.com', 1),
('Ndiaye', 'Mamadou', 'mamadoundiaye.jpg', '770000002', 'HLM5', 'mamadoundiaye@gmail.com', 2),
('Ba', 'Amadou', 'amadouba.jpg', '770000003', 'Derkle', 'amadouba@gmail.com', 4),
('Faye', 'Fatou', 'fatoufaye.jpg', '770000004', 'Dieppeul', 'fatoufaye@gmail.com', 3);

-- Insertion des boutiquiers
INSERT INTO boutiquiers (nom, prenom, photo, telephone, adresse, email, motdepass) VALUES
('Diallo', 'Souleymane', 'boutikier.jpg', '770000005', 'Castors', 'boutikier@gmail.com', 'passer');


-- Insertion des articles
INSERT INTO articles (libelle, prix, qteStock) VALUES
('Sucre', 600, 100),
('Riz', 300, 200),
('Lait', 100, 150),
('Huile', 200, 100),
('Pain', 150, 50);

-- Insertion des dettes
INSERT INTO dettes (datedette, montantdette, etat, idcl) VALUES
('2024-08-01', 3000, 'Non soldée', 1),
('2024-08-05', 1500, 'Soldée', 2);

-- Insertion des articles liés à des dettes
INSERT INTO ariclesDette (qteArtcile, idart, iddette) VALUES
(5, 1, 1),
(5, 2, 2);

-- Insertion des paiements
INSERT INTO paiements (datepmt, montantpmt, iddette) VALUES
('2024-08-07', 1000, 2),
('2024-08-09', 500, 2);

-- Insertion des dépôts
INSERT INTO depots (montant, idcl) VALUES
(10000.00, 3);
UPDATE `depots` SET `montant` = '10000' WHERE `depots`.`iddpt` = 1;