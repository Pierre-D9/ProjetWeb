<?php

include_once("chargementClasses.php");

//Création de la connexion avec la base de donnée en créant l'objet
$UtilisateurMySQL = new utilisateurMySQL();

//Récupération des forums
$rs = $UtilisateurMySQL->voirLesUtilisateurs();

//Création du tableau qui contiendra tous
$lesUtilisateursJson = array();

//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
while($row = $rs->fetch()) {
    $uneLigne = array('pseudo' => $row[0], 'password' => $row[1],'nom' => $row[2], 'prenom' => $row[3], 'mail' => $row[4]);
    array_push($lesUtilisateursJson, $uneLigne);
}

//Affichage du tableau pour qu'on puisse le récupérer après
echo json_encode(array("lesUtilisateursJson"=>$lesUtilisateursJson));