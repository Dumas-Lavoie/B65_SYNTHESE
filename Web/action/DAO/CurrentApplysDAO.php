<?php
require_once("action/DAO/Connection.php");
require_once("action/DAO/CampSearchDAO.php");
require_once("action/DAO/UserDAO.php");

class CurrentApplysDAO
{

    public static function addApply($idJobOffer, $idUser)
    {

        $added = true; 
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
            $date = date("Y-m-d H:i:s");
            $statement = $connection->prepare("INSERT INTO CurrentApplys (fk_id_User, fk_id_JobOffer, apply_date)
            VALUES(?, ?, ?)");
            $statement->bindParam(1,  $idUser);
            $statement->bindParam(2, $idJobOffer);
            $statement->bindParam(3, $date);
            $statement->execute();
        }
        else{
            $added = false;
        }

        // Renvoie la ou les clienteles
        return $added;
    }

    public static function getAnimatorApplys($email)
    {

        $connection = Connection::getConnection();

        $statement = $connection->prepare("SELECT * from CurrentApplys WHERE fk_id_User = (SELECT id FROM User WHERE email = ?)");
        $statement->bindParam(1, $email);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();


        while ($row = $statement->fetch()) {
            $campId = CampSearchDAO::getCampIdFromIdJobOffer($row['fk_id_JobOffer']);
            $row['campName'] = CampSearchDAO::getCampName($campId);
            $applys[] = $row;

        }

        // Renvoie la liste des applications d'un animateur
        return $applys;
    }



    public static function getAllApplys()
    {

        $connection = Connection::getConnection();

        $statement = $connection->prepare("SELECT * from CurrentApplys");
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();


        while ($row = $statement->fetch()) {
            $campId = CampSearchDAO::getCampIdFromIdJobOffer($row['fk_id_JobOffer']);
            $row['campName'] = CampSearchDAO::getCampName($campId);
            $row['userEmail'] = UserDAO::getUserById($row['fk_id_User']);
            $applys[] = $row;

        }

        // Renvoie la liste des applications d'un animateur
        return $applys;
    }
}
