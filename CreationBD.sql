CREATE DATABASE IF NOT EXISTS CampDB;
USE CampDB;

CREATE  TABLE IF NOT EXISTS CampDB.Users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  typeUsager CHAR(1) NOT NULL,
  creationDate DATE NOT NULL ,
  adresse VARCHAR(150) NOT NULL ,
  nom VARCHAR(255) ,
  email VARCHAR(255) ,
  passwordHash CHAR(255)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS CampDB.Camps (
  id INT  AUTO_INCREMENT PRIMARY KEY,
  fk_id_users INT,
  nom VARCHAR(150) NOT NULL ,
  adresse VARCHAR(150) NOT NULL ,
  postal_address VARCHAR(255) ,
  contact_number VARCHAR(75) ,
  email VARCHAR(255) ,
  FOREIGN KEY (fk_id_users) REFERENCES Users(id)
 )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS CampDB.Animateur (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  prenom VARCHAR(150) NOT NULL ,
  nom VARCHAR(150) NOT NULL ,
  gender VARCHAR(1) ,
  antecedents CHAR(1) ,
  date_of_birth DATE ,
  physical_address VARCHAR(255) ,
  postal_address VARCHAR(255) ,
  contact_number VARCHAR(75) ,
  email VARCHAR(255)
  )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS CampDB.CampTags (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  fk_id_CampKind INT,
  FOREIGN KEY (fk_id_CampKind) REFERENCES CampKind(id)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS CampDB.CampKind (
  id INT  AUTO_INCREMENT  PRIMARY KEY,
  typeCamp CHAR(1)
  )
ENGINE = InnoDB;