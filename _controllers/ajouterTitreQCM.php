<?php
//On ouvre la session
session_start();

//Récupération des infos données
$nomQCM = $_REQUEST['nomQCM'];
$typeCours = $_REQUEST['typeCours'];

if(!isset($_SESSION['grandTabQCM']) || !$_SESSION['grandTabQCM']["nom"] == $nomQCM){


    //Récupération du fichier XML
    $lesQCM = simplexml_load_file('../assets/xml/lesQCM.xml');

    $find=0;

    //Recherche du plus grand id
    if(isset($lesQCM->qcm)){
        foreach($lesQCM->qcm as $unQCM){
            if($unQCM->nomQcm == $nomQCM){
                $find = 1;
            }
        }
        $numQCM = count($lesQCM->qcm) + 1;
    }else{
        $numQCM = 1;
    }


    //Création du tableau QCM
    $grandTabQCM = array(
        "numQCM" => $numQCM,
        "nomQCM" => $nomQCM,
        "typeCours" => $typeCours,
        "lesQuestion" => array()
    );

    //Mise en session du tableau des QCM
    $_SESSION['grandTabQCM'] = $grandTabQCM;
}



header("location: ../views/ajoutQuestionQCM.php");

?>