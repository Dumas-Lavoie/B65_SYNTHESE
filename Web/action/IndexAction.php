<?php
	require_once("action/CommonAction.php");

	class IndexAction extends CommonAction {

		public $isLoggedIn = false;
		public $visiblity = null;
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			
		
			if (isset($_SESSION['userEmail']))
			{
				$this->isLoggedIn = true;
				$this->visiblity = $_SESSION['visibility'];
			}

		}
	}
