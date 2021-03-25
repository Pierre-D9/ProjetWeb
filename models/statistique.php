<?php
class Statistique{
    private $idStatistique;
    private $pseudoUtil;
    private $typeCours;
    private $pourcentage;

    public function __construct($idStatistique, $pseudoUtil, $typeCours, $pourcentage){
        $this->idStatistique = $idStatistique;
        $this->pseudoUtil = $pseudoUtil;
        $this->typeCours = $typeCours;
        $this->pourcentage = $pourcentage;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}