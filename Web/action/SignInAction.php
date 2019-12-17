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

			if (isset($_POST["email"]) and isset($_POST["password1"]) and isset($_POST["password2"]) and $_POST["password1"] == $_POST["password2"]) {
				
				$hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);

				if ($_POST["registerkind"] == "animator")
				{
					$user = new User(null, User::ANIMATOR, date("Y-m-d H:i:s"),$_POST["email"], $hash);
				}
				else if ($_POST["registerkind"] == "camp")
				{
					$user = new User(null, User::CAMP, date("Y-m-d H:i:s"),$_POST["email"], $hash);
				}
				
				UserDAO::createAccount($user);

				header("location:signInLandingPage");
				exit;

			}
			else {
				
			}
		}
	}
