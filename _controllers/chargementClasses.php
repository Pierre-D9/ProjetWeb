<?php

    /* Chargement des classes nécessaires */
    spl_autoload_register('chargerClasseMySQL');
    function chargerClasseMySQL($classe) {
        $nomFichierMySQL = "../_classes/".$classe.".php";

        //Si c'est dans le répertoire _classes ou non
        if(file_exists($nomFichierMySQL) == 1){
            require "../_classes/".$classe.".php";
        }else{
            require "../models/".$classe.".php";
        }
    }



?>
