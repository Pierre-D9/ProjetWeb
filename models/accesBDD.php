<?php

/*****************************************************************************
 * Regroupement de toutes les fonctions d'accès à la base de données
 ****************************************************************************/
    
    /* 
     * Connexion persistante au serveur
     * @retrun \PDO Connexion
     */

    function connexion(){
        // Définition des variazbles de connexion
        $user = "admin";
        $pass = "minda";
        $dsn = 'mysql:host=localhost;dbname=projetweb';
        //Connexion persistante
        try {
            $dbh = new PDO($dsn, $user, $pass,
            array(PDO::ATTR_PERSISTENT=>true,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
         return $dbh;
    }
    
    function afficherErreurSQL($message, $req, $dbh) {
        echo $message . "<br />";
        echo "Requete : " . $req . "<br />";
        print_r($dbh->errorInfo());
        die();
    }
    
    function rechercherLesTypesDeCours($dbh){
        $stmt = $dbh->prepare("SELECT * FROM typecours;");
        $stmt->execute();
        if ($stmt === false){
            afficherErreurSQL("Problème lors de la recherche du type de cours", $stmt, $dbh);
        }
        return $stmt;
    }
    
    /*function rechercheTypeUti($dbh,$idU){
        $stmt = $dbh->prepare("SELECT * FROM Utilisateur WHERE id = :id ;");
        $stmt->execute(array('id'=>$idU));
        if ($stmt === false){
            afficherErreurSQL("Probleme lors de la recherche de l'utilisateur", $stmt, $dbh);
        }
        return $stmt;
    }*/

?>

