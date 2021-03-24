<?php
class Forum
{
    private $idForum;
    private $nom;
    private $questionPose;
    private $nbrVue;
    private $createur;

    public function __construct($idForum, $nom, $questionPose, $nbrVue, $createur){
        $this->idForum = $idForum;
        $this->nom = $nom;
        $this->questionPose = $questionPose;
        $this->nbrVue = $nbrVue;
        $this->createur = $createur;
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