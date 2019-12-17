<?php
require_once("action/DAO/Connection.php");
require_once("action/DAO/CampTagsDAO.php");
require_once("action/Camp.php");
require_once("action/DAO/ClienteleDAO.php");
require_once("action/Clientele.php");
require_once("action/JobOffer.php");



class CampSearchDAO
{

    public static function getJobOffers($campKind, $clientele)
    {

        // Ici j'ai l'id de tous les camps qui on ce tag en particulier.
        $campTagList = CampTagsDAO::getCampListFromTag($campKind);
        $jobOffers = null;


        $connection = Connection::getConnection();

        // Me donnera toutes les offres d'emplois avec la bonne clientele
        $statement = $connection->prepare("SELECT * FROM JobOffer WHERE fk_id_Clientele = (SELECT id FROM Clientele WHERE clientele = ?)");
        $statement->bindParam(1, $clientele);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $test = false;
            foreach ($campTagList as $value) {
                if ($value['fk_id_Camp'] == $row['fk_id_Camp']) {
                    $test = true;
                }
            }

            if ($test) {
                $jobOffers[] = $row;
            }
        }


        // Au final, j'ai toutes les offres d'emplois qui correspondent aux critères donnés
        return $jobOffers;
    }


    public static function getJobOffersObject($campKind, $clientele)
    {
        $jobOffers = CampSearchDAO::getJobOffers($campKind, $clientele);

        $connection = Connection::getConnection();

        $results = array();

        if ($jobOffers != null) {


            foreach ($jobOffers as $value) {

                $clienteleArray = ClienteleDAO::getClientele($value['fk_id_Clientele']);

                $client = new Clientele($clienteleArray[0]['id'], $clienteleArray[0]['clientele']);

                $idJobOffer = $value['id'];

                $idCamp = $value['fk_id_Camp'];
                $camp = null;

                $statement = $connection->prepare("SELECT * FROM Camp WHERE id = ?");
                $statement->bindParam(1, $idCamp);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement->execute();

                if ($row = $statement->fetch()) {
                    $camp = new Camp($row['id'], $row['fk_id_User'], $row['nom'], $row['grade'], $row['adresse'], $row['postal_address'], $row['contact_number'], $row['description']);
                    unset($value['fk_id_Camp']);
                }
                $creationDate = $value['creationDate'];
                $descripiton = $value['description'];



                $jobObject = new JobOffer($idJobOffer, $camp, $client, $creationDate, $descripiton);

                array_push($results, $jobObject);
            }
        }
        return $results;
    }
}
