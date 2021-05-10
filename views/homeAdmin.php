<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page forum</title>
    <link rel="stylesheet" href="../assets/css/tableauQCM.css" />
    <link rel="icon" type="image/png" sizes="16*16" href="../assets/Image/WonlyColorV2.ico">
</head>
<body>
<?php
$lesTypesDeCours = array();

include_once('../_controllers/chargementClasses.php');

$forumMySQL = new ForumMySQL();
$rs = $forumMySQL->rechercherLesTypesDeCours();
while($row = $rs->fetch()) {
    $unTypeDeCours = new TypeCours($row[0], $row[1]);
    $lesTypesDeCours[] = $unTypeDeCours;
}
?>
<div class="contenneurTitre">
    <h1>Page Home</h1>
</div>

<div class="contenneur">
    <form>
        <div class="choixTypeCours">
            <span class="listeDeroulante listeDeroulante-barre">
                <select>
                    <option value="">Tous les types de cours</option>
                    <?php
                    foreach($lesTypesDeCours as $unTypeDeCours){
                        echo "<option value='".$unTypeDeCours->typeC."'>".$unTypeDeCours->typeC."</option>";
                    }
                    ?>
                </select>
            </span>
        </div>
        <div class="rechercher">
            <input type="search" placeholder="Nom du cours" class="barreDeRecherche" maxlength="40"/>
        </div>
    </form>
</div>
<div class="lesCours">
    <div class="unCours">

    </div>
</div>


<!-- Les scripts js -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/tableauQCM.js"></script>

</body>
</html>