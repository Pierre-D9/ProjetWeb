<?php
//On ouvre la session
session_start();

$nomQCM = $_REQUEST['nomQCM'];
$typeCours = $_REQUEST['typeCours'];

echo $nomQCM." ".$typeCours;
$_SESSION["nomQCM"] = $nomQCM;
$_SESSION["typeCours"] = $typeCours;
//setcookie("nomQCM", $nomQCM);
//setcookie("typeCours", $typeCours);

header("location: ../views/ajoutQuestionQCM.php");

?>