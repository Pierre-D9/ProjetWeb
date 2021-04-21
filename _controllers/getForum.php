<?php

include_once("chargementClasses.php");

//Création de la connexion avec la base de donnée en créant l'objet
$forumMySQL = new ForumMySQL();

//Récupération des forums
$rs = $forumMySQL->voirLesForums();

//Création du tableau qui contiendra tous
$lesForumJson = array();

//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
while($row = $rs->fetch()) {
    $uneLigne = array('id' => $row[0], 'nom' => $row[1],'typeCours' => $row[2], 'auteur' => $row[3], 'dateF' => $row[4]);
    array_push($lesForumJson, $uneLigne);
}

//Affichage du tableau pour qu'on puisse le récupérer après
echo json_encode(array("lesForumJson"=>$lesForumJson));