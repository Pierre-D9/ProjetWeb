<?php

//Chargement des classes
include_once("chargementClasses.php");

//Récupération de l'id de forum
$idForum = $_GET['idForum'];

//Création de la connexion avec la base de donnée en créant l'objet
$forumMySQL = new ForumMySQL();

//Récupération des forums
$rs = $forumMySQL->voirUnForum($idForum);

$isUpdate = $forumMySQL->augmenterLeNombreDeVue($idForum);


//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
$leForum = $rs->fetch();
$nom = $leForum[0];
$question = $leForum[1];
$dateF = $leForum[2];
$createur = $leForum[3];
$idTypeCours = $leForum[4];

//Forum envoyé en session
$forumEnvoye = array($idForum, $nom, $question, $dateF, $createur, $idTypeCours);

//On ouvre la session
session_start();

//On ajoute le forum dans la session
$_SESSION['leForum'] = $forumEnvoye;


print_r($forumEnvoye);

header('location:../views/chatForum.php');



?>