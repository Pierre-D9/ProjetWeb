<?php
    session_start();
    if(!isset($_SESSION['pseudo']) || $_SESSION['typeUtil'] != 1){
        header("location:../_controllers/deconnexion.php");
    }
    if(!isset($title) || !isset($linkCSS)){
        $title = "Titre";
        $linkCSS = "test";
    }
    $linkCSS = "../assets/css/".$linkCSS.".css";
    $nomPrenom = $_SESSION['nomPrenom'];
?>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="<?= $linkCSS ?>" />
    <link type="text/css" rel="stylesheet" href="../assets/css/enteteAdmin.css" />
    <link rel="icon" type="image/png" sizes="16*16" href="../assets/Image/WonlyColorV2.ico">
    <title><?= $title; ?></title>
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">

        <div class="Titre">
            <img src="../assets/Image/WearleonlyColor.png" class="logo">
        </div>
        <nav class="navigationHeader">
            <p class="gererCours">Gérer les cours</p>
            <p class="gererQCM">Gérer les QCM</p>
            <p class="gererUtil">Gérer les utilisateurs</p>
        </nav>
        <div class="nomEtDeco">
            <p class="nomAdmin"><?php echo $nomPrenom; ?></p>
            <span class="btDeconnexion"><i class="fas fa-power-off" style="transform: scale(2);"></i></span>
        </div>
    </div>
    <div class="leBody">
