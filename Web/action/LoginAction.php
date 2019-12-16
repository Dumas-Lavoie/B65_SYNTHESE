<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	

	class LoginAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			if (isset($_POST["email"]) and isset($_POST["password"])) {
				$user = UserDAO::authenticate($_POST["email"], $_POST["password"]);

				if (!empty($user)) {
					$_SESSION["userEmail"] = $user["userEmail"];
					$_SESSION["visibility"] = $user["visibility"];

					header("location:search");
					exit;
				}
				else {
					$this->wrongLogin = true;
				}
			}
		}
	}
