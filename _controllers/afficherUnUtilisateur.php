<?php
//Chargement des classes
include_once("chargementClasses.php");

$pseudo = $_GET['pseudo'];

//Création de la connexion avec la base de donnée en créant l'objet
$UtilisateurMySQL = new UtilisateurMySQL();

//Récupération des forums
$rs = $UtilisateurMySQL->afficherUnUtilisateur($pseudo);


//Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
$lesutil = $rs->fetch();
$pseudo = $lesutil["pseudo"];
$nom = $lesutil["nom"];
$prenom = $lesutil["prenom"];
$mail = $lesutil["mail"];

//Forum envoyé en session

$utilEnvoye = array($pseudo,$nom,$prenom,$mail);

//On ouvre la session
session_start();

//On ajoute le forum dans la session
$_SESSION['utilAEnvoyer'] = $utilEnvoye;


print_r($utilEnvoye);

header('location:../views/modifierUtilisateur.php');
?>