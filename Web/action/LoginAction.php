<?php
require_once("action/CommonAction.php");
require_once("action/DAO/UserDAO.php");
require_once("action/LogoutAction.php");
require_once("action/User.php");



class LoginAction extends CommonAction
{
	public $wrongLogin = false;
	public $logout = false;

	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction()
	{

		if (isset($_GET['logout'])) {
			if ($_GET['logout'] == true) {
				$this->logout = true;
			}
		}

		if (isset($_SESSION["userEmail"])) {
			// Un logout préventif si on tente de se connecter en étant déjà connecté
			unset($_SESSION["userEmail"]);
			$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;

			header("location:login?logout=true");
			exit;
		}

		if (isset($_POST["email"]) and isset($_POST["password"])) {
			$user = UserDAO::authenticate($_POST["email"], $_POST["password"]);

			if (!empty($user)) {

				// Je garde en mémoire le courriel du user (sans son mot de passe)
				$_SESSION["userEmail"] = $user["userEmail"];
				$_SESSION["visibility"] = $user["visibility"];

				if ($_SESSION["visibility"] == 1) {
					header("location:search");
					exit;
				} else if ($_SESSION["visibility"] == 2) {
					header("location:staffSearch");
					exit;
				} else if ($_SESSION["visibility"] == 4) {
					header("location:admin");
					exit;
				}
			}

			if (!isset($_COOKIE["remember-me"]) && isset($_POST["remember-me"])) {
				setcookie("remember-me", $_POST["email"]);
			} else {
				$this->wrongLogin = true;
			}
		}
	}
}
