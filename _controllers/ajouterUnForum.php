<?php

include_once('chargementClasses.php');

// Infos de création du forum
$nom = $_POST['titreSujet'];
$idTypeCours = $_POST['typeCours'];
$question = $_POST['question'];
$pseudo = "Cheick-SekoB";
$dateF = date("Y-m-d");

// Connexion à la base de données en créant l'objet forumMySQL
$forumMySQL = new ForumMySQL();

//Ajout du forum
$isInsert = $forumMySQL->ajouterUnForum($nom, $question, $dateF, $pseudo, $idTypeCours);

if($isInsert){
    header('location:../views/tableauForum.php');
}else{
    echo "<br/>le tableau n'a pas pu être inséré =( <br/>";
}

?>