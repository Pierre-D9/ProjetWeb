<?php


include_once("chargementClasses.php");

//Récupérer l'id du forum
$idForum = $_REQUEST['idForum'];
$reponse = $_REQUEST['message'];
$auteur = $_REQUEST['auteur'];
$dateR = date("Y-m-d h-i-s");

//Création de la connexion avec la base de donnée en créant l'objet
$forumMySQL = new ForumMySQL();

//Récupération des forums
$rs = $forumMySQL->ajouterUneReponse($dateR, $reponse, $auteur, $idForum);

if($rs == true){
    echo "BRAVOOOOOOOOOO";
}else{
    echo "c'est moche ça =(";
}
