<?php
require_once("action/DAO/Connection.php");


class AnimatorDAO {


    public static function createAnimator(Animator $anim) {
        $connection = Connection::getConnection();
        $statement = $connection->prepare("INSERT INTO Animateur (fk_id_User, prenom, nom, genre, antecedents, birth, profilePicture, description, physical_address, postal_address, contact_number)
        VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->bindParam(1, $anim->fkUser);
        $statement->bindParam(2, $anim->prenom);
        $statement->bindParam(3, $anim->nom);
        $statement->bindParam(4, $anim->gender);
        $statement->bindParam(5, $anim->antecedents);
        $statement->bindParam(6, $anim->birth);
        $statement->bindParam(7, $anim->picture);
        $statement->bindParam(8, $anim->desc);
        $statement->bindParam(9, $anim->adresse);
        $statement->bindParam(10, $anim->postalCode);
        $statement->bindParam(11, $anim->telNumber);
        $statement->execute();
    }




}