<?php
include_once('chargementClasses.php');

$pseudo= $_REQUEST['pseudo'];

$UtilisateurMySQL  = new UtilisateurMySQL ();

$UtilisateurMySQL->supprimerUnUtilisateur($pseudo);
?>
