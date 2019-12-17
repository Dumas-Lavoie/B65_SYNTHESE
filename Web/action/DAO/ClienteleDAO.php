<?php
	require_once("action/DAO/Connection.php");

	class ClienteleDAO {

		public static function getClientele($optionClientele = null) {

            $clientele = null;

            $connection = Connection::getConnection();

            if ($optionClientele == null)
            {
                $statement = $connection->prepare("SELECT * from Clientele");
            }
            else 
            {
                $statement = $connection->prepare("SELECT * from Clientele WHERE id = ?");  
                $statement->bindParam(1, $optionClientele);
            }
			
			$statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            
            
            while ($row = $statement->fetch()) {
                $clientele[] = $row;
            }

            // Renvoie la ou les clienteles
            return $clientele;
        }
        
	}