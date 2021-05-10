<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page ajouter un QCM</title>
    <link rel="stylesheet" href="../assets/css/ajoutQCM.css"/>
</head>
<body>

<?php
$lesTypesDeCours = array();
include_once('../_controllers/chargementClasses.php');
session_start();
$forumMySQL = new ForumMySQL();
$rs = $forumMySQL->rechercherLesTypesDeCours();
while($row = $rs->fetch()) {
    $unTypeDeCours = new TypeCours($row[0], $row[1]);
    $lesTypesDeCours[] = $unTypeDeCours;
}
if(isset($_SESSION["grandTabQCM"]) && $_SESSION["grandTabQCM"] != null){
    $nomQCM = $_SESSION["grandTabQCM"]["nomQCM"];
    $typeCours = $_SESSION["grandTabQCM"]["typeCours"];
}else{
    $nomQCM = "";
    $typeCours = 0;
}
?>
<div class="contenneurTitre">
    <h1>Ajouter un QCM</h1>
</div>

<div class="contenneur">
    <form action="../_controllers/ajouterTitreQCM.php" method="post">
        <div class="rentrerAdmin">
            <div class="partieNom">
                <label for="nomQCM">Nom du QCM : </label>
                <input type="text" id="nomQCM" name="nomQCM" class="nomQCM" value="<?= $nomQCM?>" required />
            </div>

            <div class="partieTypeCours">
                <label for="typeCours">Type de cours : </label>
                <span class="listeDeroulante listeDeroulante-barre">
                    <select name="typeCours" id="typeCours" class="typeCours" required>
                        <option value="">Choisissez un type de cours</option>
                        <?php
                            foreach($lesTypesDeCours as $unTypeDeCours){
                                if($unTypeDeCours->idType == $typeCours){
                                    echo "<option value='".$unTypeDeCours->idType."' selected>".$unTypeDeCours->typeC."</option>";
                                }else{
                                    echo "<option value='".$unTypeDeCours->idType."'>".$unTypeDeCours->typeC."</option>";
                                }
                            }
                        ?>
                    </select>
                </span>
            </div>

        </div>

        <div class="lesBoutons">
            <input type="button" value="Annuler" class="btAnnuler">
            <input type="submit" value="Suivant" class="btSuivant">
        </div>
    </form>
</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/ajoutQCM.js"></script>
</body>
</html>