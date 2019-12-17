<?php
    require_once("action/DAO/Connection.php");
    require_once("action/DAO/CampTagsDAO.php");

	class CampSearchDAO {

		public static function getJobOffers($campKind, $clientele) {

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
                    if ($value['fk_id_Camp'] == $row['fk_id_Camp'])
                    {
                        $test = true;
                    }
                }
               
                if ($test)
                {
                    $jobOffers[] = $row;
                }
                
            }
            
            return $jobOffers;
        }
        


	}