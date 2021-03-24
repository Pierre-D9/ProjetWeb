<?php
class Utilisateur{
    private $pseudo;
    private $password;
    private $nom;
    private $prenom;
    private $mail;
    private $typeUtil;

    public function __construct($pseudo, $password, $nom, $prenom, $mail, $typeUtil){
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->typeUtil = $typeUtil;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }


}
