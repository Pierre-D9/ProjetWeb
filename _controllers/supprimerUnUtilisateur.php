<?php
include_once('chargementClasses.php');

$pseudo= $_GET['pseudo'];

$UtilisateurMySQL  = new UtilisateurMySQL ();

$UtiliId = $UtilisateurMySQL->supprimerUnUtilisateur($pseudo);

if($UtiliId !=0){
    header('location:../_views/affichSup.php?pseudo='.$UtiliId);
    echo "<br/>l'utilisateur  a été supprimé  <br/>";
}
?>
