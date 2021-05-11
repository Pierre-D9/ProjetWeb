<?php
include_once('chargementClasses.php');



$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$pseudo = "$nom$prenom" ;
$password = "$pseudo" ;


$UtilisateurMySQL  = new UtilisateurMySQL ();

$UtiliId = $UtilisateurMySQL->ajouterUnUtilisateur($pseudo ,$password , $nom, $prenom, $mail);

if($UtiliId == "true"){
 header('location:../views/tableauUtilisateur.php');
}else{
    echo "Problème lors de l'insertion de l'utilisateur";
}
?>
