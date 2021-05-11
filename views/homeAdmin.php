<head>
    <link type="text/css" rel="stylesheet" href="../assets/css/homeAdmin.css" />
    <title>Page Home Admin</title>
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
        session_start();
        if(isset($_SESSION['pseudo']) && $_SESSION['typeUtil'] == 1){
            include("../_scripts/enteteAdmin.php");

?>
    <br/>
    <div class="lesBoutons">
        <input class="bouton" id="boutonGererCours" type="button" value="GERER LES COURS" />
        <input class="bouton" id="boutonGererQCM" type="button" value="GERER LES QCM" />
        <input class="bouton" id="boutonGererUtilisateur" type="button" value="GERER LES UTILISATEURS" />
    </div>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/homeAdmin.js"></script>
</body>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<footer>
    <hr style="border-top: 1px solid grey;">
    <div class="blockFooter">
        <p id="copyright"> Copyright © 2021 Wearle</p>
        <ul class="navigationFooter">
            <li><a href="#" class="lienFooter">A propos</a></li>
            <li><a href="#" class="lienFooter">Termes d'utilisation</a></li>
            <li><a href="#" class="lienFooter">Politique Privee</a></li>
        </ul>
    </div>
</footer>

<?php
}else{
    header("location:../views/connexion.php");
}
?>