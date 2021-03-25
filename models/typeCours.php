<?php

class TypeCours{
    private $idType;
    private $typeC;

    public function __construct($idType, $typeC){
        $this->idType = $idType;
        $this->typeC = $typeC;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}

