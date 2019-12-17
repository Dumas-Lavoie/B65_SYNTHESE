<?php
	require_once("action/DAO/Connection.php");

	class CampTagsDAO {

		public static function getCampTags() {

            $campTags = null;

            $connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * from CampTags");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            
            while ($row = $statement->fetch()) {
                $campTags[] = $row;
            }
            
            return $campTags;
        }



    // Va me donner un tableau de l'id de tous les camps qui ont un tag donné.
    public static function getCampListFromTag($tag) {
        $campList = array();

        $connection = Connection::getConnection();
        // CHANGEMENT DE NOM DE TABLE: VA PLANTER ICI QUAND LA BD SERA REFORMÉE. À NOTER.
        $statement = $connection->prepare(" SELECT fk_id_Camp, fk_id_CampTags FROM linkinTable WHERE fk_id_CampTags = (SELECT id from CampTags WHERE typeCamp = ?)");
        $statement->bindParam(1, $tag);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $campList[] = $row;
        }
    
        return $campList;
    }
        
	}