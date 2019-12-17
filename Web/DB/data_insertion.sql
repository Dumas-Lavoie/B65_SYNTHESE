-- Code fonctionnel pour Camp job finder:

-- Camp
INSERT INTO Camp (fk_id_User, nom, grade, adresse, postal_address, contact_number, description) 
VALUES ( 1, "Camp Larochelle", 5, "1920 avenue du Parc", "H1HH12", "514-323-1323", "DESC DU CAMP LAROCHELLE");

    -- Camp tags
INSERT INTO CampTags (typeCamp) VALUES ("Camp musical");
INSERT INTO CampTags (typeCamp) VALUES ("Base de plein air");
INSERT INTO CampTags (typeCamp) VALUES ("Camp scientifique");

    -- Clienteles types
INSERT INTO Clientele (clientele) VALUES ("Enfants 6 à 8 ans");
INSERT INTO Clientele (clientele) VALUES ("Jeunes adultes");
INSERT INTO Clientele (clientele) VALUES ("Ados 12 à 15 ans");


    -- Linkin tags with camp
INSERT INTO linkinTable (fk_id_Camp, fk_id_CampTags) VALUES ((SELECT id FROM Camp WHERE nom = "Camp Larochelle"),
(SELECT id FROM CampTags WHERE typeCamp = "Camp musical"));

INSERT INTO linkinTable (fk_id_Camp, fk_id_CampTags) VALUES ((SELECT id FROM Camp WHERE nom = "Camp Larochelle"),
(SELECT id FROM CampTags WHERE typeCamp = "Base de plein air"));



-- Creating a job offer
INSERT INTO JobOffer (fk_id_Camp, fk_id_Clientele, creationDate, description) VALUES ((SELECT id FROM Camp WHERE nom = "Camp Larochelle"),
(SELECT id FROM Clientele WHERE clientele = "Jeunes adultes"), (SELECT Now()), "Super offre d'emploi à 18$/h chauffé éclairé");

INSERT INTO JobOffer (fk_id_Camp, fk_id_Clientele, creationDate, description) VALUES ((SELECT id FROM Camp WHERE nom = "Camp Larochelle"),
(SELECT id FROM Clientele WHERE clientele = "Jeunes adultes"), (SELECT Now()), "Venez tester vos skills en animation PHP.");

INSERT INTO JobOffer (fk_id_Camp, fk_id_Clientele, creationDate, description) VALUES ((SELECT id FROM Camp WHERE nom = "Camp Larochelle"),
(SELECT id FROM Clientele WHERE clientele = "Enfants 6 à 8 ans"), (SELECT Now()), "Offre de merde 10$/h au camp larochelle.");
