<?php
class Cours{
    private $idCours;
    private $nomCours;
    private $dateC;
    private $typeCours;
    private $diapo;
    private $video;
    private $nbrVue;
    private $auteur;

    public function __construct($idCours, $nomCours, $dateC, $typeCours, $diapo, $video, $nbrVue, $auteur){
        $this->idCours = $idCours;
        $this->nomCours = $nomCours;
        $this->dateC = $dateC;
        $this->typeCours = $typeCours;
        $this->diapo = $diapo;
        $this->video = $video;
        $this->nbrVue = $nbrVue;
        $this->auteur = $auteur;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}