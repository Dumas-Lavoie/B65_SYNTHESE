<?php
require_once("action/CommonAction.php");
require_once("action/DAO/CampSearchDAO.php");
require_once("action/DAO/CurrentApplysDAO.php");
require_once("action/DAO/UserDAO.php");

class SearchAction extends CommonAction
{
    public $searchEnabled = false;
    public $searchResults = null;
    public $ajustHeight = false;
    public $userEmail = null;

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {


        if (isset($_GET['selectCampType']) and isset($_GET['selectClientele'])) {
            $this->searchEnabled = true;

            // Ici j'ai toutes les offres d'emplois correspondant au critère de recherche.
            $this->searchResults = CampSearchDAO::getJobOffersObject($_GET['selectCampType'], $_GET['selectClientele']);

            if (count($this->searchResults) > 1) {
                $this->ajustHeight = true;
            }

            // On conserve le email du user au cas où il postulerait
            $this->userEmail = $_SESSION['userEmail'];

            var_dump($this->searchResults);
            exit();
        }


        if (isset($_POST['idJobOfferPostulation'])) {
            $user = UserDAO::getUser($this->userEmail);

            $userID = $user->userID;
            $jobID = $_POST['idJobOfferPostulation'];

            $dbSent = CurrentApplysDAO::addApply($jobID, $userID);

            // Un courriel est envoyé à l'utilisateur
            if ($dbSent) 
            {
                $to = $this->userEmail;
                $subject = "Camp Job Finder: Vous avez postulé au camp " . $_POST['nomCampPostulation'];
                $txt = $_POST["message"];
                // $headers = "From: "";

                mail($to, $subject, $txt);
            }
            // var_dump();
            // exit();
        }
    }
}
