<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");
	require_once("action/User.php");


	class SignInAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			// if (isset($_POST["email"]))
			// {
			// 	echo "OK";
			// 	exit();
			// }


			if (isset($_POST["email"]) and isset($_POST["password1"]) and isset($_POST["password2"]) and $_POST["password1"] == $_POST["password2"]) {
				
				$hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);

				$user = new User('a',date("Y-m-d H:i:s"),$_POST["email"], $hash);

				UserDAO::createAccount($user);

				// if (!empty($user)) {
				// 	$_SESSION["username"] = $user["USERNAME"];
				// 	$_SESSION["visibility"] = $user["VISIBILITY"];

				header("location:signInLandingPage");
				exit;
				// }
				// else {
				// 	$this->wrongLogin = true;
				// }
			}
		}
	}
