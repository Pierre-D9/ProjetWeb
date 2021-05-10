<?php

session_start();

$numQuestion = $_REQUEST['numQuestion'];

if(isset($_SESSION['grandTabQCM']['lesQuestion'][$numQuestion])){
    $grandTabQCM = $_SESSION['grandTabQCM'];
    //Recherche de la question prescedente
    $tabQuestion = $grandTabQCM['lesQuestion'][$numQuestion];

    //Affichage du tableau pour qu'on puisse le récupérer après
    echo json_encode(array("laQuestion"=>$tabQuestion));
}

?>