<?php
session_start();

//Récupération des valeurs rentrés
$question = $_REQUEST['question'];
$toutesLesReponses = $_REQUEST['lesReponses'];
$vraieOuFaux = $_REQUEST['tabCheckBox'];
$numQuestion = $_REQUEST['numQuestion'];

//Vérification d'existence du tableau qcm dans la session
if(isset($_SESSION['grandTabQCM'])) {

    //Récupération du gran tableau
    $grandTabQCM = $_SESSION['grandTabQCM'];

    //Création du tableau contenant les réponses ajouté
    $tabReponse = explode(",", $toutesLesReponses);

    $tabCheckBox = explode(",", $vraieOuFaux);

    //Création du tableau relatif à la question
    $tabQuestion = array(
        "numQuestion" => $numQuestion,
        "question" => $question,
        "lesReponses" => $tabReponse,
        "tabCheckBox" => $tabCheckBox
    );

    //Ajout de la question au QCM
    $grandTabQCM['lesQuestion'][$numQuestion] = $tabQuestion;

    //Mise en session du tableau
    $_SESSION['grandTabQCM'] = $grandTabQCM;

    //Si la question suivante à déjà été préalablement remplie
    if(isset($grandTabQCM['lesQuestion'][$numQuestion+1])){
        $tabQuestion = $grandTabQCM['lesQuestion'][$numQuestion+1];

        //Affichage du tableau pour qu'on puisse le récupérer après
        echo json_encode(array("laQuestion"=>$tabQuestion));


    }
}

