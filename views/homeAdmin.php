<?php
$title = "Page Home Admin";
$linkCSS = "homeAdmin";
include("../_scripts/enteteAdmin.php");

?>

    <img src="../assets/Image/FondAdmin.png" id="image">
    <br/>
    <br/>
    <br/>
    <div class="lesBoutons">
        <input class="bouton" id="boutonGererCours" type="button" value="GERER LES COURS" />
        <input class="bouton" id="boutonGererQCM" type="button" value="GERER LES QCM" />
        <input class="bouton" id="boutonGererUtilisateur" type="button" value="GERER LES UTILISATEURS" />
    </div>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/homeAdmin.js"></script>
</div>



<?php include("../_scripts/footerAdmin.php"); ?>