<?php
include_once('chargementClasses.php');



$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$pseudo = "$nom$prenom" ;
$password = "$pseudo" ;


$UtilisateurMySQL  = new UtilisateurMySQL ();

$UtiliId = $UtilisateurMySQL->ajouterUnUtilisateur($pseudo ,$password , $nom, $prenom, $mail);

if($UtiliId !=0){
 header('location:../_controllers/afficherUnUtilisateur.php?pseudo='.$UtiliId);
 echo "<br/>l'utilisateur  a été ajouter  <br/>";
}
?>
