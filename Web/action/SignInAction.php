<?php
require_once("action/CommonAction.php");
require_once("action/DAO/UserDAO.php");
require_once("action/DAO/AnimatorDAO.php");
require_once("action/User.php");
require_once("action/Animator.php");
require_once("action/Camp.php");


class SignInAction extends CommonAction
{

	public $wrongSignIn = false;
	public $isLoggedIn = false;



	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction()
	{

		if (isset($_SESSION['userEmail'])) {
			$this->isLoggedIn = true;
		}

		// Si c'est une inscription d'animateur, regarde ces champs:

		if (isset($_POST["registerkind"])) {

			if ($_POST["registerkind"] == "animator") {
				if (
					isset($_POST["email"]) and isset($_POST["password1"]) 
				
					and isset($_POST["password2"]) and $_POST["password1"] == $_POST["password2"]
				
					and isset($_POST["address"]) and isset($_POST["city"]) and isset($_POST["country"]) and isset($_POST["zipCode"])
				
					and isset($_POST["firstName"]) and isset($_POST["lastName"]) and !(UserDAO::accountExists($_POST["email"]))) {


					$hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);

					$user = new User(null, User::ANIMATOR, date("Y-m-d H:i:s"), $_POST["email"], $hash);
					
																																							
					$linkUser = UserDAO::createAccount($user);
					$animator = new Animator(null, $linkUser->userID, $_POST["firstName"], $_POST["lastName"],'N','N', date("Y-m-d H:i:s"),null,null,$_POST["address"],$_POST["zipCode"], null);
								
					AnimatorDAO::createAnimator($animator);

					header("location:signInLandingPage");
					exit;
				}
				
			} elseif ($_POST["registerkind"] == "camp") {
				if (isset($_POST["email"]) and isset($_POST["password1"]) and isset($_POST["password2"]) and $_POST["password1"] == $_POST["password2"] and !(UserDAO::accountExists($_POST["email"]))){
					
					// Pour construire une partie permettant à des camps de s'inscrire, on testerais l'existence de paramètres de plus
					$user = new User(null, User::CAMP, date("Y-m-d H:i:s"), $_POST["email"], $hash);
					
					$linkUser = UserDAO::createAccount($user);


				}
			} else {

				if (isset($_POST['formEnvoye'])) {
					$this->wrongSignIn = true;
				}
			}
		}
	}
}
