<?php
class Chapitre{
    private $idChapitre;
    private $nom;
    private $contennue;
    private $idCours;

    public function __construct($idChapitre, $nom, $contennue, $idCours){
        $this->idChapitre = $idChapitre;
        $this->nom = $nom;
        $this->contennue = $contennue;
        $this->idCours = $idCours;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}