<?php 

class Animator {
    public $id;
    public $fkUser;
    public $prenom;
    public $nom;
    public $gender;
    public $antecedents;
    public $birth;
    public $picture;
    public $desc;
    public $adresse;
    public $postalCode;
    public $telNumber;

    function __construct($id, $fkUser, $prenom, $nom, $genre, $antecedents, $birth, $picture, $desc, $adresse, $postalCode, $telNumber) {
        $this->id = $id;
        $this->fkUser = $fkUser;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->gender = $genre;
        $this->antecedents = $antecedents;
        $this->birth = $birth;
        $this->picture = $picture;
        $this->desc = $desc;
        $this->adresse = $adresse;
        $this->postalCode = $postalCode;
        $this->telNumber  = $telNumber;
      }
      
}