<?php 
require_once("action/Camp.php");

class JobOffer {
    public $camp;
    public $clientele;
    public $creationDate;
    public $description;


    function __construct($camp, $clientele, $creationDate, $description) {
        $this->camp = $camp;
        $this->clientele = $clientele;
        $this->creationDate = $creationDate;
        $this->description = $description;
      }
      
}