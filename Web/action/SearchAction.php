<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/CampSearchDAO.php");
    require_once("action/DAO/UserDAO.php");

	class SearchAction extends CommonAction {
        public $searchEnabled = false;
        public $searchResults = null;
        public $ajustHeight = false;
        public $userEmail = null;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {


            if ( isset($_GET['selectCampType']) and isset($_GET['selectClientele'])) 
            {
                $this->searchEnabled = true;

                // Ici j'ai toutes les offres d'emplois correspondant au critère de recherche.
                $this->searchResults = CampSearchDAO::getJobOffersObject($_GET['selectCampType'], $_GET['selectClientele']);

                if (count($this->searchResults) > 1)
                {
                    $this->ajustHeight = true;
                }

                // On conserve le email du user au cas où il postulerait
                $this->userEmail = $_SESSION['userEmail'];
            }

		}
	}
