<?php

include_once('chargementClasses.php');

$pseudo = $_POST['pseudo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];

$UtilisateurMySQL = new UtilisateurMySQL();

$UtilisateurMySQL->ModifierUtilisateur($pseudo, $nom, $prenom, $mail);

header('location:../views/tableauUtilisateur.php');

?>




