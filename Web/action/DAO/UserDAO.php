<?php
	require_once("action/DAO/Connection.php");
	require_once("action/User.php");

	class UserDAO {

		public static function authenticate($username, $password) {
			$user = null;
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT * from User where email = ?");
			$statement->bindParam(1, $username);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();

			if ($row = $statement->fetch()) {
				if (password_verify($password, $row["passwordHash"])) {
					$user = [];
					$user["userEmail"] = $row["email"];
					$user["visibility"] = $row["visibility"];
				}
			}
			return $user;
		}

		public static function updatePassword($username, $newPassword) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("UPDATE User SET password = ? where username = ?");
			$statement->bindParam(1, $newPassword);
			$statement->bindParam(2, $username);
			$statement->execute();
		}


		public static function createAccount(User $user) {
			$connection = Connection::getConnection();
			$statement = $connection->prepare("INSERT INTO User (visibility, CreationDate, email, passwordHash)
			VALUES( ?, ?, ?, ?)");
			$statement->bindParam(1, $user->userTypes);
			$statement->bindParam(2, $user->creationDate);
			$statement->bindParam(3, $user->email);
			$statement->bindParam(4, $user->passwordHash);
			$statement->execute();

			// Retourne un utilisateur (pour aider si on désire créer un compte animateur par exemple)
			return UserDAO::getUser($user->email);
		}


		public static function getUser($email) {

			$user = null;
			
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * from User where email = ?");
			$statement->bindParam(1, $username);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();
			$statement->bindParam(1, $email);
			$statement->execute();


			if ($row = $statement->fetch()) {
				$user = new User($row['id'], $row['visibility'], $row['creationDate'],$row['email'], null);
			}

			return $user;
		}



		public static function getUserById($id) {

			$user = null;
			
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * from User where id = ?");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->bindParam(1, $id);
			$statement->execute();


			if ($row = $statement->fetch()) {
				$user = new User($row['id'], $row['visibility'], $row['creationDate'],$row['email'], null);
			}

			return $user;
		}


		public static function accountExists ($email) {
			$test = false;
			
			$connection = Connection::getConnection();
			$statement = $connection->prepare("SELECT * from User where email = ?");
			$statement->bindParam(1, $email);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();


			if ($row = $statement->fetch()) {
				$test = true;
			}

			return $test;
		}
	}