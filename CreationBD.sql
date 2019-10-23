CREATE  TABLE IF NOT EXISTS `CampDB`.`Users` (
  `id` INT  AUTOINCREMENT ,
  `typeUsager` CHAR(1),
  `creationDate` DATE NOT NULL ,
  `adresse` VARCHAR(150) NOT NULL ,
  `nom` VARCHAR(255) ,
  `email` VARCHAR(255) ,
  `passwordHash` CHAR(256) ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `CampDB`.`Camp` (
  `id` INT  AUTOINCREMENT ,
  `fk_id_users` INT,
  `nom` VARCHAR(150) NOT NULL ,
  `adresse` VARCHAR(150) NOT NULL ,
  `postal_address` VARCHAR(255) ,
  `contact_number` VARCHAR(75) ,
  `email` VARCHAR(255) ,
  FOREIGN KEY (`fk_id_users`) REFERENCES Users(`id`)
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `CampDB`.`Animateur` (
  `id` INT  AUTOINCREMENT ,
  `prenom` VARCHAR(150) NOT NULL ,
  `nom` VARCHAR(150) NOT NULL ,
  `gender` VARCHAR(1) ,
  `antecedents` CHAR(1) ,
  `date_of_birth` DATE ,
  `physical_address` VARCHAR(255) ,
  `postal_address` VARCHAR(255) ,
  `contact_number` VARCHAR(75) ,
  `email` VARCHAR(255) ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `CampDB`.`CampTags` (
  `id` INT  AUTOINCREMENT ,
  `fk_id_CampKind` INT,
  FOREIGN KEY (`fk_id_CampKind`) REFERENCES CampKind(`id`)
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `CampDB`.`CampKind` (
  `id` INT  AUTOINCREMENT ,
  `typeCamp` CHAR(1),
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;