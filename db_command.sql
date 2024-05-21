USE wikiCampers;

CREATE TABLE vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(255) NOT NULL,
    modele VARCHAR(255) NOT NULL
);

CREATE TABLE disponibilites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)
);

-- Insertion de véhicules
INSERT INTO
    vehicules (marque, modele)
VALUES ('Toyota', 'Corolla'),
    ('Honda', 'Civic'),
    ('Ford', 'Focus');

-- Insertion de disponibilités
INSERT INTO
    disponibilites (
        vehicule_id,
        date_debut,
        date_fin
    )
VALUES (1, '2024-06-01', '2024-06-10'),
    (2, '2024-06-05', '2024-06-15'),
    (3, '2024-07-01', '2024-07-10');

ALTER TABLE vehicules ADD COLUMN prix_journalier DECIMAL(10, 2);

UPDATE vehicules SET prix_journalier = 32.00 WHERE id = 1;

UPDATE vehicules SET prix_journalier = 29.00 WHERE id = 2;

UPDATE vehicules SET prix_journalier = 39.00 WHERE id = 3;