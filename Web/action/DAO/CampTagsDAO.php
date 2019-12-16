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
        
	}