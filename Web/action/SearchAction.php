<?php
	require_once("action/CommonAction.php");


	class SearchAction extends CommonAction {
		public $wrongLogin = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

		}
	}
