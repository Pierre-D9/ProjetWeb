<?php
//Chargement des classes
include_once("chargementClasses.php");

$pseudo = $_GET['pseudo'];

//Création de la connexion avec la base de donnée en créant l'objet
$UtilisateurMySQL = new UtilisateurMySQL();

//Récupération des forums
$rs = $UtilisateurMySQL->voirLesUtilisateurs();


//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
$lesutil = $rs->fetch();
$pseudo = $lesutil[0];
$password = $lesutil[1];
$nom = $lesutil[2];
$prenom = $lesutil[3];
$mail = $lesutil[4];
$typeUtil = $lesutil[5];

//Forum envoyé en session

$utilEnvoye = array($pseudo,$password, $nom,$prenom , $mail , $typeUtil );

//On ouvre la session
session_start();

//On ajoute le forum dans la session
$_SESSION['pseudo'] = $utilEnvoye;


print_r($utilEnvoye);

header('location:../views/tableauUtilisateur.php');
?>