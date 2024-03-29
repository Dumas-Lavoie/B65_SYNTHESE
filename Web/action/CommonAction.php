<?php
	session_start();
	require_once("action/constants.php");

	abstract class CommonAction {
		protected static $VISIBILITY_PUBLIC = 0;
		protected static $VISIBILITY_MEMBER = 1;
		protected static $VISIBILITY_MODERATOR = 2;
		protected static $VISIBILITY_ADMIN = 4;

		private $pageVisibility;

		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {

			if (!empty($_GET["logout"])) {
				session_unset();
				session_destroy();
				session_start();
			}

			if (empty($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] != $this->pageVisibility and $this->pageVisibility != CommonAction::$VISIBILITY_PUBLIC) {
				unset($_SESSION["userEmail"]);
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
				header("location:index");
				exit;
			}

			// Template method
			$this->executeAction();
		}

		protected abstract function executeAction();

		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}

		public function getUsername() {
			return empty($_SESSION["username"]) ? "Invité" : $_SESSION["username"];
		}
	}