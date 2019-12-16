<?php
	require_once("action/DAO/Connection.php");

	class ClienteleDAO {

		public static function getClientele() {

            $clientele = null;

            $connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * from Clientele");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            
            while ($row = $statement->fetch()) {
                $clientele[] = $row;
            }
            
            return $clientele;
        }
        
	}