<?php
	require_once("action/DAO/Connection.php");
	require_once("action/User.php");

	class UserDAO {

		public static function authenticate($username, $password) {
			$user = null;
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT * from Users where email = ?");
			$statement->bindParam(1, $username);
			$statement->setFetchMode(PDO::FETCH_ASSOC); // row["USERNAME"]
			$statement->execute();

			if ($row = $statement->fetch()) {
				if (password_verify($password, $row["passwordHash"])) {
					$user = [];
					$user["userId"] = $row["id"];
					$user["VISIBILITY"] = $row["typeUsager"];
				}
			}
			return $user;
		}

		public static function updatePassword($username, $newPassword) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("UPDATE users SET password = ? where username = ?");
			$statement->bindParam(1, $newPassword);
			$statement->bindParam(2, $username);
			$statement->execute();
		}




		public static function createAccount(User $user) {

			$connection = Connection::getConnection();

			$statement = $connection->prepare("INSERT INTO Users (typeUsager, CreationDate, email, passwordHash)
			VALUES( ?, ?, ?, ?)");
			$statement->bindParam(1, $user->userTypes);
			$statement->bindParam(2, $user->creationDate);
			$statement->bindParam(3, $user->email);
			$statement->bindParam(4, $user->passwordHash);
			$statement->execute();
		}
	}