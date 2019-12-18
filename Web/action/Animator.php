<?php 

class Animator {
    public $id;
    public $prenom;
    public $nom;
    public $gender;
    public $antecedents;
    public $birth;
    public $profilePicture;
    public $desc;
    public $adress;
    public $postalCode;

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