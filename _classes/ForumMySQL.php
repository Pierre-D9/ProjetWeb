<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ForumMySQL {
    private $laConnexion;
    
    function __construct() {
        $this->laConnexion =  new Connexion();
    }


    function rechercherLesTypesDeCours(){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT * FROM typecours;");
        $stmt->execute();
        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche du type de cours", $stmt);
        }
        return $stmt;
    }

    function ajouterUnForum($nom, $question, $dateF, $pseudo, $idTypeCours){
        $isInsert = false;
        $dernierId = 0;
        $stmt = $this->laConnexion->getDbh()->prepare("INSERT INTO `forum` (`nom`, `questionPose`, `dateF`, `createur`, `idTypeCours`, `nbrVue`)".
                                                            " VALUES (:nom, :question, :dateF, :pseudo, :idTypeCours, 0);");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':dateF', $dateF);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':idTypeCours', $idTypeCours);


        if($stmt->execute()){
            $isInsert = true;
            $dernierId = $this->laConnexion->getDbh()->lastInsertId();
        }
        return $dernierId;
    }

    function voirLesForums(){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT idForum, nom, typeC, createur, dateF".
            " FROM forum INNER JOIN typecours".
            " ON forum.idTypeCours = typecours.idType".
            " ORDER BY nbrVue DESC, dateF, nom ASC");
        $stmt->execute();
        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche du type de cours", $stmt);
        }
        return $stmt;
    }

    function ajouterUneReponse($dateR, $reponse, $pseudoUtil, $idForum){
        $isInsert = false;
        $stmt = $this->laConnexion->getDbh()->prepare("INSERT INTO `reponse` (`dateR`, `reponse`, `pseudoUtil`, `idForum`)".
                                                            " VALUES (now(), :reponse, :pseudoUtil, :idForum);");
        $stmt->bindParam(':reponse', $reponse);
        $stmt->bindParam(':pseudoUtil', $pseudoUtil);
        $stmt->bindParam(':idForum', $idForum);

        if($stmt->execute()){
            $isInsert = true;
        }
        return $isInsert;
    }

    function voirUnForum($idForum){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT nom, questionPose, dateF, createur, idTypeCours".
                                                            " FROM forum".
                                                            " WHERE idForum = :idForum;");
        $stmt->bindParam(':idForum', $idForum);
        $stmt->execute();
        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche du forum", $stmt);
        }
        return $stmt;
    }

    function voirLesReponses($idForum){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT reponse, pseudoUtil, dateR".
                                                            " FROM reponse".
                                                            " WHERE idForum = :idForum;".
                                                            " ORDER BY dateR ASC");
        $stmt->bindParam(':idForum', $idForum);
        $stmt->execute();
        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche des réponses", $stmt);
        }
        return $stmt;
    }

    function augmenterLeNombreDeVue($idForum){
        $isUpdate = false;
        $stmt = $this->laConnexion->getDbh()->prepare("UPDATE forum".
                                                            " SET nbrVue = nbrVue + 1".
                                                            " WHERE idForum = :idForum;");
        $stmt->bindParam(':idForum', $idForum);
        if($stmt->execute()){
            $isUpdate = true;
        }
        return $isUpdate;
    }

    function voirUnTypeDeCours($idType){
        $stmt = $this->laConnexion->getDbh()->prepare("SELECT typeC".
            " FROM typecours".
            " WHERE idType = :idType;");
        $stmt->bindParam(':idType', $idType);
        $stmt->execute();
        if ($stmt === false){
            $this->laConnexion->afficherErreurSQL("Problème lors de la recherche du forum", $stmt);
        }
        return $stmt;
    }

}
