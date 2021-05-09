<?php

include_once('chargementClasses.php');


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];

$UtilisateurMySQL = new UtilisateurMySQL ();

$UtiliId = $UtilisateurMySQL->ModifierUtilisateur($nom, $prenom, $mail);

if ($UtiliId != 0) {
    header('location:../_controllers/afficherUnUtilisateur.php>' . $UtiliId);
    echo "<br/>l'utilisateur  a été modifier  <br/>";
}
?>




