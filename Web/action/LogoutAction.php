<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	class LogoutAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
					unset($_SESSION["username"]);
					$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;

					header("location:index");
					exit;
			}
		}
	