<?php 

class User {
    const ANIMATOR = 1;
    const CAMP = 2;
    const ADMIN = 4;

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