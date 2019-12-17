<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/CampSearchDAO.php");

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

                $_SESSION['searchResults'] = "TEST";
                CampSearchDAO::getJobOffers($_GET['selectCampType'], $_GET['selectClientele']);

            }


             

           

		}
	}
