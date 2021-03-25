<?php
class Reponse{
    private $idReponse;
    private $dateR;
    private $reponse;
    private $pseudoUtil;
    private $idForum;

    public function __construct($idReponse, $dateR, $reponse, $pseudoUtil, $idForum){
        $this->idReponse = $idReponse;
        $this->dateR = $dateR;
        $this->reponse = $reponse;
        $this->pseudoUtil = $pseudoUtil;
        $this->idForum = $idForum;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}