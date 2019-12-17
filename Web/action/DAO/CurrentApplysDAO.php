<?php
require_once("action/DAO/Connection.php");

class CurrentApplysDAO
{

    public static function addApply($idJobOffer, $idUser)
    {

        $userAdded = true; 
        $alreadyApplied = false;

        $connection = Connection::getConnection();


        $statement = $connection->prepare("SELECT * from CurrentApplys WHERE fk_id_User = ?");
        $statement->bindParam(1, $idUser);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();


        while ($row = $statement->fetch()) {
            if ($row['fk_id_JobOffer'] == $idJobOffer)
            {
                $alreadyApplied = true;
            }
        }


        if ($alreadyApplied != true)
        {
            $statement = $connection->prepare("INSERT INTO CurrentApplys (fk_id_User, fk_id_JobOffer, apply_date)
            VALUES( ?, ?, ?, ?)");
            $statement->bindParam(1,  $idUser);
            $statement->bindParam(2, $idJobOffer);
            $statement->bindParam(3, date("Y-m-d H:i:s"));
            $statement->execute();
        }
        else{
            $userAdded = false;
        }

        // Renvoie la ou les clienteles
        return $userAdded;
    }

    public static function getAnimatorApplys($idAnimator)
    {

        $connection = Connection::getConnection();

        $statement = $connection->prepare("SELECT * from CurrentApplys WHERE fk_id_Animateur = ?");
        $statement->bindParam(1, $idAnimator);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();


        while ($row = $statement->fetch()) {
            $applys[] = $row;
        }

        // Renvoie la liste des applications d'un animateur
        return $applys;
    }
}
