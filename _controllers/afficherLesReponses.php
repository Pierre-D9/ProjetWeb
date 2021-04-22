<?php

include_once("chargementClasses.php");

//Récupérer l'id du forum
$idForum = $_REQUEST['idForum'];

//Création de la connexion avec la base de donnée en créant l'objet
$forumMySQL = new ForumMySQL();

//Récupération des forums
$rs = $forumMySQL->voirLesReponses($idForum);

//Création du tableau qui contiendra tous
$lesReponses = array();

//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
while($row = $rs->fetch()) {
    $uneReponse = array('reponse' => $row[0], 'pseudoUtil' => $row[1],'dateR' => $row[2]);
    array_push($lesReponses, $uneReponse);
}

//Affichage du tableau pour qu'on puisse le récupérer après
echo json_encode(array("lesReponses"=>$lesReponses));