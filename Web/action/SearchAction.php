<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/CampTagsDAO.php");
    require_once("action/DAO/ClienteleDAO.php");

	class SearchAction extends CommonAction {
        public $wrongLogin = false;
        public $searchEnabled = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {


            if ( isset($_GET['selectCampType']) and isset($_GET['selectClientele'])) 
            {
                $this->searchEnabled = true;
            }
            // if(!isset($_POST['lst_clientele']) or !isset($_POST['lst_tagsCamp']))
            // {
            //     $_POST['lst_clientele'] = ClienteleDAO::getClientele();
            //     $_POST['lst_tagsCamp'] = CampTagsDAO::getCampTags();
            // }

		}
	}
