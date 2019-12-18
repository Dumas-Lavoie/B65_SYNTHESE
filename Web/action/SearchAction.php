<?php
require_once("action/CommonAction.php");
require_once("action/DAO/CampSearchDAO.php");
require_once("action/DAO/CurrentApplysDAO.php");
require_once("action/DAO/UserDAO.php");
require_once("action/DAO/AnimatorDAO.php");

class SearchAction extends CommonAction
{
    public $searchEnabled = false;
    public $searchResults = null;
    public $ajustHeight = false;
    public $userEmail = null;

    public $applyConfirmed = false;
    public $alreadyApplied = false;
    public $selectedCampName = null;

    public $bio = null;

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {




        if ($_SESSION["userEmail"] == null or $_SESSION["visibility"] == null) {
            header("location:logout");
            exit;
        }

        if (isset($_POST['miniBio'])) {
            AnimatorDAO::updateBio($_POST['miniBio'], $_SESSION['userEmail']);
        }


        $this->bio = AnimatorDAO::getBio($_SESSION['userEmail']);


        if (isset($_GET['selectCampType']) and isset($_GET['selectClientele'])) {
            $this->searchEnabled = true;

            // Ici j'ai toutes les offres d'emplois correspondant au critère de recherche.
            $this->searchResults = CampSearchDAO::getJobOffersObject($_GET['selectCampType'], $_GET['selectClientele']);

            if (count($this->searchResults) > 1) {
                $this->ajustHeight = true;
            }

            // On conserve le email du user au cas où il postulerait
            $this->userEmail = $_SESSION['userEmail'];
        }

        if (isset($_FILES["fileProfilePicture"])) {
            $uploadFile = $this->fileUpload($_FILES["fileProfilePicture"]);

            UserDAO::updatePicturePath($uploadFile, $_SESSION['userEmail']);
        }


        // Voici une fonctionalité que j'implémente tout en sachant 
        // qu'elle serait vulnérable au cross site scripting 
        // dans un contexte de production. C'est 
        // seulement une preuve de ma capacité à la mettre en oeuvre,
        // avoir plus de temps j'utiliserait un rich text editor en markdown
        // et utiliserait probablement du AJAX.
        if (isset($_FILES["fileProfilePicture"])) {
        }



        if (isset($_POST['idJobOfferPostulation'])) {

            $user = UserDAO::getUser($_SESSION['userEmail']);

            $this->selectedCampName = $_POST['nomCampPostulation'];

            $userID = $user->userID;
            $jobID = $_POST['idJobOfferPostulation'];

            $dbSent = CurrentApplysDAO::addApply($jobID, $userID);


            // Un courriel est envoyé à l'utilisateur qui postule.
            if ($dbSent) {
                // Pour afficher un message de succès lors d'une postulation
                $this->applyConfirmed = true;

                // On envoie un courriel pour confirmer la postulation
                // (exemple fonction mail SMTP tiré d'internet)
                $to = $_SESSION['userEmail'];
                $subject = "Camp Job Finder: Vous avez postulé au camp " . $_POST['nomCampPostulation'];
                $txt = $_POST["message"];

                mail($to, $subject, $txt);
            } else {
                $this->alreadyApplied = true;
                $this->applyConfirmed = false;
            }
        }
    }


    // Code tiré d'un projet d'équipe de DKoncept en programmation web avancée. Cours de Frédéric
    // Partiellement inspiré de : https://www.w3schools.com/php/php_file_upload.asp
    private function fileUpload($uploadedFile)
    {
        //File property
        $uploadedFileName = $uploadedFile["name"];
        $uploadedFileTmp = $uploadedFile["tmp_name"]; //Needed pour move_upload_file
        $uploadedFileError = $uploadedFile["error"]; // Needed pour voir si il y a une erreur dans une propriete de l'image lors de l'upload
        $uploadedFileExtension = explode(".", $uploadedFileName); // separer le nom du fichier et l'extension en taleau[2] = {"nom", "extension}
        $uploadedFileExtensionToLower = strtolower(end($uploadedFileExtension)); //prend le dernier element de tableau (donc ici tableau[1] (qui est l'extension))

        $allowedExtension = array("jpg", "png", "gif", "jpeg"); //extension permise

        if (in_array($uploadedFileExtensionToLower, $allowedExtension)) { //Si bonne extension ....
            if ($uploadedFileError == 0) {
                //Generer un nom unique aleatoire seulement pour le storer, je mettrais le ID apres.
                $uploadedFileNewName = uniqid("", true) . "." . $uploadedFileExtensionToLower;
                $uploadedFilePath = "images/db/" . $uploadedFileNewName;
                move_uploaded_file($uploadedFileTmp, $uploadedFilePath); //A cette etape, l'image est store dans /images/db -> maintenant faut renomme l'image selon le ID du nouveau user
            }
        }
        return $uploadedFilePath;
    }
}
