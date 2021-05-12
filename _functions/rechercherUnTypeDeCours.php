<?php

    //Chargement des classes
    include_once("../_controllers/chargementClasses.php");

    //Récupération de l'id de forum
    $typeCours = $_REQUEST['typeCours'];

    //Création de la connexion avec la base de donnée en créant l'objet
    $forumMySQL = new ForumMySQL();

    //Récupération des forums
    $rs = $forumMySQL->voirUnTypeDeCours($typeCours);


    //Remplissage dans un tableau, un tableau sous forme de clé valeur pour chaque forum
    $leTypeDeCours = $rs->fetch();
    $nomCours = $leTypeDeCours['typeC'];

    echo $nomCours;



?>