<?php 

class User {
    public $userTypes;
    public $creationDate;
    public $email;
    public $passwordHash;

    function __construct($userTypes, $creationDate, $email, $passwordHash) {
        $this->userTypes = $userTypes;
        $this->creationDate = $creationDate;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
      }
      
}