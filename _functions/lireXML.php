<?php
$lesQCM = simplexml_load_file('../assets/xml/lesQCM.xml');
//$xmlEnString = simplexml_load_string($lesQCM);
echo json_encode(array("lesQCM"=>$lesQCM));

/*
$tousLesQCM = array();
foreach ($lesQCM->qcm as $qcm) {
    $numQCM = 1;
    foreach ($qcm->attributes() as $a=>$b){
        if($a == "idQcm"){
            $numQCM = $b;
        }
    }
    $nomQCM = $qcm->nomQcm;
    $typeDeCours = $qcm->typeDeCours;
    $pseudo = $qcm->pseudo;
    $tabLesQuestions = array();
    foreach ($qcm->lesQuestions as $uneQuestion) {
        $libelleQuestion = $uneQuestion->libele;
        //$numQuestion = $uneQuestion->attributes("num");
        $tabLesReponses = array();
        foreach ($uneQuestion->lesReponses as $uneReponse) {
            $uneReponse = $uneQuestion->reponse;
            $checkBox = "false";
            foreach ($uneQuestion->attributes() as $a=>$b){
                if($a == "value"){
                    $checkbox = $b;
                }
            }
            //$idReponse = $uneQuestion->attributes("idReponse");
            $tabReponse = array(
                "reponse" => $uneReponse,
                "checkBox" => $checkbox
            );
            array_push($tabLesReponses, $tabReponse);
        }
        $tabQuestion = array(
            "libelle" => $libelleQuestion,
            "lesReponses"=> $tabLesReponses
        );
        array_push($tabLesQuestions, $tabQuestion);
    }
    $tabQCM = array(
        "numQCM" => $numQCM,
        "nomQCM" => $nomQCM,
        "typeDeCours" => $typeDeCours,
        "pseudo" => $pseudo,
        "lesQuestion" => $tabLesQuestions
    );
    array_push($tousLesQCM, $tabQCM);
}
print_r($tousLesQCM);
*/

?>