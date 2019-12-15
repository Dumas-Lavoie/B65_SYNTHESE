-- CREATE DATABASE IF NOT EXISTS CampDB;
USE felixdl;

CREATE  TABLE IF NOT EXISTS User (
  id INT AUTO_INCREMENT PRIMARY KEY,
  visibility TINYINT(1) NOT NULL,
  creationDate DATE NOT NULL ,
  email VARCHAR(255) ,
  passwordHash CHAR(255)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS Camp (
  id INT  AUTO_INCREMENT PRIMARY KEY,
  fk_id_User INT,
  nom VARCHAR(150) NOT NULL ,
  grade TINYINT(1) ,
  adresse VARCHAR(150) NOT NULL ,
  postal_code VARCHAR(255) ,
  contact_number VARCHAR(75) ,
  description VARCHAR(512) NOT NULL,
  FOREIGN KEY (fk_id_User) REFERENCES User(id)
 )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS CampPictures (
  id INT  AUTO_INCREMENT PRIMARY KEY,
  fk_id_camp INT,
  photo VARCHAR(255),
  FOREIGN KEY (fk_id_camp) REFERENCES Camp(id)
 )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS Animateur (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  prenom VARCHAR(150) NOT NULL ,
  nom VARCHAR(150) NOT NULL ,
  gender VARCHAR(1) ,
  antecedents CHAR(1) ,
  date_of_birth DATE ,
  profilePicture VARCHAR(255),
  description VARCHAR(512),
  physical_address VARCHAR(255) ,
  postal_address VARCHAR(255) ,
  contact_number VARCHAR(75)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS Clientele (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  clientele VARCHAR(255)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS JobOffer (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  fk_id_Camp INT,
  fk_id_Clientele INT,
  description VARCHAR(512) NOT NULL,
  FOREIGN KEY (fk_id_Camp) REFERENCES Camp(id),
  FOREIGN KEY (fk_id_Clientele) REFERENCES Clientele(id)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS CampTags (
  id INT  AUTO_INCREMENT PRIMARY KEY ,
  typeCamp VARCHAR(255)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS linkinTable (
  id INT  AUTO_INCREMENT  PRIMARY KEY,
  fk_id_Camp INT,
  fk_id_CampTags INT,
  FOREIGN KEY (fk_id_Camp) REFERENCES Camp(id),
  FOREIGN KEY (fk_id_CampTags) REFERENCES CampTags(id)
  )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS CurrentApplys (
  id INT  AUTO_INCREMENT  PRIMARY KEY,
  fk_id_Animateur INT,
  fk_id_camp INT,
  apply_date DATE NOT NULL ,
  
  FOREIGN KEY (fk_id_Camp) REFERENCES Camp(id),
  FOREIGN KEY (fk_id_Animateur) REFERENCES Animateur(id)
  )
ENGINE = InnoDB;
