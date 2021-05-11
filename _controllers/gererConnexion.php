<?php

$pseudo = $_REQUEST['pseudoUtil'];
$motDePasse = $_REQUEST['passwordUtil'];

include_once("chargementClasses.php");

//Création de la connexion avec la base de donnée en créant l'objet
$forumMySQL = new UtilisateurMySQL();

//Récupération des forums
$rs = $forumMySQL->voirLesUtilisateurs();

session_start();
session_unset();


// Recherche de l'utilisateur concerné à partir du mot de passe et du pseudo saisis
$rs = $forumMySQL->verifierUtilisateur($pseudo, $motDePasse);
$nbUser = $rs->rowCount(); //Nb lignes
if ($nbUser < 1) {
    /*$_SESSION["msg"] = "Erreur pseudo ou mot de passe";
    header('Location:../views/connexion.php');*/
    print_r($rs);
} else {
    $lg = $rs->fetch();
    $_SESSION['nomPrenom'] = $lg['prenom']." ".$lg['nom'];
    $_SESSION['pseudo'] = $pseudo;
    $typeUtil = $lg['typeUtil'];
    $_SESSION['typeUtil'] = $typeUtil;
    if($typeUtil == 1){
        header('Location:../views/homeAdmin.php');
    }else{
        header('Location:../views/homeApprenant.php');
    }
}