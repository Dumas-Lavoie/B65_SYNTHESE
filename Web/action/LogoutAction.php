<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	class LogoutAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
					
					session_unset();
            		session_destroy();
            		session_start();
					$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;

					header("location:login?logout=true");
					exit;
            }
            


		}
	