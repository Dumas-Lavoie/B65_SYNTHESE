<?php 
require_once("action/Camp.php");

class JobOffer {

    public $id;
    public $camp;
    public $clientele;
    public $creationDate;
    public $description;


    function __construct($id, $camp, $clientele, $creationDate, $description) {
        $this->id = $id;
        $this->camp = $camp;
        $this->clientele = $clientele;
        $this->creationDate = $creationDate;
        $this->description = $description;
      }
      
}