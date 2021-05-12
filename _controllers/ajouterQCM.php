<?php

session_start();

//Récupération des valeurs rentrés
$question = $_REQUEST['question'];
$toutesLesReponses = $_REQUEST['lesReponses'];
$vraieOuFaux = $_REQUEST['tabCheckBox'];
$numQuestion = $_REQUEST['numQuestion'];
echo $question;

//Vérification d'existence du tableau qcm dans la session
if(isset($_SESSION['grandTabQCM'])&& $_SESSION['grandTabQCM']!= null) {

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

    //Ajout de la question au qcm
    $grandTabQCM['lesQuestion'][$numQuestion] = $tabQuestion;


    //Récupération des variables
    $numQCM = $grandTabQCM['numQCM'];
    $nomQCM = $grandTabQCM['nomQCM'];
    $typeCours = $grandTabQCM['typeCours'];

    $pseudo = $_SESSION['pseudo'];



    //Ouverture du fichier xml en écriture
    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load('../assets/xml/lesQCM.xml');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    $lesQCM = $xml->getElementsByTagName("lesQcm")->item(0);
    $unQCM = $xml->createElement("qcm");
    $unQCM->setAttribute('idQCM', $numQCM);
    $nomDuQCM = $xml->createElement('nomQcm', $nomQCM);
    $typeDeCours = $xml->createElement('typeDeCours', $typeCours);
    $pseudoXML = $xml->createElement('pseudo', $pseudo);
    $lesQuestions = $xml->createElement("lesQuestions");

    foreach($grandTabQCM['lesQuestion'] as $uneQuestion){
        $uneQuestionXML = $xml->createElement('question');
        $uneQuestionXML->setAttribute('num',$uneQuestion['numQuestion']);
        $libelleQuestionXML = $xml->createElement('question',$uneQuestion['question']);
        $uneQuestionXML->appendChild($libelleQuestionXML);

        //Nombre de réponses
        $nombreReponses = count($uneQuestion['lesReponses']);
        for($i = 0; $i<$nombreReponses; $i++) {
            $uneReponseXML = $xml->createElement('reponse', $uneQuestion['lesReponses'][$i]);
            $uneReponseXML->setAttribute('idReponse', ($i+1));
            if($uneQuestion['tabCheckBox'][$i] == 1){
                $uneReponseXML->setAttribute('value','vraie');
            }else{
                $uneReponseXML->setAttribute('value','faux');
            }
            $uneQuestionXML->appendChild($uneReponseXML);
        }
        $lesQuestions->appendChild($uneQuestionXML);
    }

    $unQCM->appendChild($nomDuQCM);
    $unQCM->appendChild($typeDeCours);
    $unQCM->appendChild($pseudoXML);
    $unQCM->appendChild($lesQuestions);
    $lesQCM->appendChild($unQCM);

    $xml->save('../assets/xml/lesQCM.xml');
    $_SESSION["grandTabQCM"] = null;
}

header('location:../views/tableauQCM.php');




