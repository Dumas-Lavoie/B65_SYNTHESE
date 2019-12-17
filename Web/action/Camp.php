<?php 

class Camp {
    public $id;
    public $fkUser;
    public $nom;
    public $grade;
    public $adresse;
    public $postalCode;
    public $telNumber;
    public $description;

    function __construct($id, $fkUser, $nom, $grade, $adresse, $postalCode, $telNumber, $description) {
        $this->id = $id;
        $this->fkUser = $fkUser;
        $this->nom = $nom;
        $this->grade = $grade;
        $this->adresse = $adresse;
        $this->postalCode = $postalCode;
        $this->telNumber = $telNumber;
        $this->description = $description;
      }
      
}