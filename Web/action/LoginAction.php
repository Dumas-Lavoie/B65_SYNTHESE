<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");
	require_once("action/User.php");



	class LoginAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			if (isset($_POST["email"]) and isset($_POST["password"])) {
				$user = UserDAO::authenticate($_POST["email"], $_POST["password"]);

				if (!empty($user)) {
					
					// Je garde en mémoire le courriel du user (sans son mot de passe)
					$_SESSION["userEmail"] = $user["userEmail"];
					$_SESSION["visibility"] = $user["visibility"];

					header("location:search");
					exit;
				}

				if(!isset($_COOKIE["remember-me"]) && isset($_POST["remember-me"])) {
					setcookie("remember-me", $_POST["username"]);
				}


				else {
					$this->wrongLogin = true;
				}
			}
		}
	}
